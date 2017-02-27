<?php
use App\Area;

class Helpers{

//    public static function getMaxValue($column_name){
//        print_r("#starting getMaxValue() function<br />");
//
//        $maxDB_values = DB::select('SELECT MAX(housing_affordability_ratio) AS max_value FROM areas');
//
////        $maxDB_values = DB::select('SELECT MAX(?) AS max_value FROM areas', [$column_name]); //Not name binding
//
//        //        $maxDB_values = DB::select('SELECT MAX(:column_name) AS max_value FROM areas', ['column_name' => $column_name]); //Name binding doesn't seem to work.
//
////        $maxDB_values = DB::select('SELECT MAX(:column_name) AS max_value FROM areas', ['column_name' => $column_name]);
//
////        $maxDB_values = DB::select('SELECT * FROM areas where name=(:column_name)', ['column_name' => 'Birmingham']);
//
//        print("#fetched max value from database<br />");
//
//        /*According to the documentation: The select method will always return an array of results. Each result within the array will be a PHP StdClass object, allowing you to access the values of the results:*/
//
//        print_r ($maxDB_values);
//        print_r("<br />#var dump follows:<br />");
//        var_dump($maxDB_values);
//        print_r("<br />#var dump of specific value follows:<br />");
//        print_r ($maxDB_values[0]);
//        print_r("<br />#Housing Affordability Ratio:<br />");
//        print_r ($maxDB_values[0]->max_value);
//        //$max_value = $maxDB_values[0][0]->$column_name;
//
//        return $maxDB_values;
//    }

//    SELECT * FROM areas WHERE name='Birmingham' returns the following
/*    Array
        ( [0] => stdClass Object
         ( [id] => 1
          [name] => Birmingham
          [greenspace] => 0.48
          [housing_affordability_ratio] => 4.3
          [superfast_broadband] => 0.85
          [crime] => 29.3
          [five_good_gcses] => 0.88
          [restaurants] => 6.9
          [created_at] => 2016-12-13 11:35:37
          [updated_at] => 2016-12-13 11:35:37 ) )
    array(1) {
        [0]=> object(stdClass)#152 (10)
        { ["id"]=> int(1)
            ["name"]=> string(10) "Birmingham"
            ["greenspace"]=> float(0.48) ["housing_affordability_ratio"]=> float(4.3) ["superfast_broadband"]=> float(0.85)
            ["crime"]=> float(29.3)
            ["five_good_gcses"]=> float(0.88)
            ["restaurants"]=> float(6.9)
            ["created_at"]=> string(19) "2016-12-13 11:35:37" ["updated_at"]=> string(19) "2016-12-13 11:35:37"
        }
    }

//    SELECT MAX(:column_name) FROM areas' returns the following:
        Array
            ( [0] => stdClass Object
            ( [MAX(?)] => housing_affordability_ratio ) )
        array(1) {
            [0]=> object(stdClass)#152 (1)
            { ["MAX(?)"]=> string(27) "housing_affordability_ratio" } }

*/

    public static function calculateOverallScore($area){
        /*Weightings*/
        
        $crime_weighting = 0.255639;
        $broadband_weighting = 0.24812;
        $greenspace_weighting = 0.218045;
        $gcse_weighting = 0.180451;
        $restaurants_weighting = 0.097744;

        if(isset($_POST["crimeLevel"])){
            $crime_weighting = ($_POST["crimeLevel"]/20);
        };

        if(isset($_POST["broadband"])){
            $broadband_weighting = ($_POST["broadband"]/20);
        };

        if(isset($_POST["greenSpace"])){
            $greenspace_weighting = ($_POST["greenSpace"]/20);
        };
        
        if(isset($_POST["goodGCSEs"])){
            $gcse_weighting = ($_POST["goodGCSEs"]/20);
        };
        
        if(isset($_POST["pubsandRestaurants"])){
            $restaurants_weighting = ($_POST["pubsandRestaurants"]/20);
        };

        /*Functions to fetch the maximum instance of each variable*/
        #Crime
        $maxDB_crime_values = DB::select('SELECT MAX(crime) AS max_value FROM areas');
        $crime_max_value = $maxDB_crime_values[0]->max_value;
        #Broadband
        $maxDB_broadband_values = DB::select('SELECT MAX(superfast_broadband) AS max_value FROM areas');
        $broadband_max_value = $maxDB_broadband_values[0]->max_value;
        #Greenspace
        $maxDB_greenspace_values = DB::select('SELECT MAX(greenspace) AS max_value FROM areas');
        $greenspace_max_value = $maxDB_greenspace_values[0]->max_value;
        #Good GCSEs
        $maxDB_gcses_values = DB::select('SELECT MAX(five_good_gcses) AS max_value FROM areas');
        $gcses_max_value = $maxDB_gcses_values[0]->max_value;
        #Number of Pubs & Restaurants
        $maxDB_restaurants_values = DB::select('SELECT MAX(restaurants) AS max_value FROM areas');
        $restaurants_max_value = $maxDB_restaurants_values[0]->max_value;

        $areas = Area::all();

        /*Normalise the values:*/
        $crime_normalised = 1-($area->crime/$crime_max_value);

        $broadband_normalised = $area->superfast_broadband/$broadband_max_value;

        $greenspace_normalised = $area->greenspace/$greenspace_max_value;

        $gcses_normalised = $area->five_good_gcses/$gcses_max_value;

        $restaurants_normalised = $area->restaurants/$restaurants_max_value;

        /*Calculate Score for each variable by multiplying the normalised score against the weighting */
        $crimeScore = $crime_normalised*$crime_weighting;

        $broadbandScore = $broadband_normalised*$broadband_weighting;

        $greenSpaceScore = $greenspace_normalised*$greenspace_weighting;

        $goodGCSEsScore = $gcses_normalised*$gcse_weighting;

        $restaurantsScore = $restaurants_normalised*$restaurants_weighting;


        $overallScore = ($crimeScore + $broadbandScore + $greenSpaceScore + $goodGCSEsScore + $restaurantsScore)*10;
        $overallScore = number_format((float)$overallScore, 1, '.', ''); //this function rounds the number to 1 decimal place.

        return $overallScore;
    }

    public static function calculateIncomeRank($area){
        /*Functions to fetch the maximum instance of each variable*/
        $rank_value = DB::select("
            SELECT FIND_IN_SET( income, (
            SELECT GROUP_CONCAT( income
            ORDER BY income DESC )
            FROM areas )
            ) AS rank
            FROM areas
            WHERE name =  '$area->name'
        ");

        $rank = $rank_value[0]->rank;

        $rows_count = DB::select("SELECT COUNT(*) AS rows FROM areas;");

        $num_of_rows = $rows_count[0]->rows;

        $inversed_rank = $num_of_rows - $rank;

        return $inversed_rank;
    }

    public static function calculateEmploymentRank($area){
     /*Functions to fetch the maximum instance of each variable*/
        $rank_value = DB::select("
            SELECT FIND_IN_SET( employment, (
            SELECT GROUP_CONCAT( employment
            ORDER BY employment DESC )
            FROM areas )
            ) AS rank
            FROM areas
            WHERE name =  '$area->name'
        ");

        $rank = $rank_value[0]->rank;

        $rows_count = DB::select("SELECT COUNT(*) AS rows FROM areas;");

        $num_of_rows = $rows_count[0]->rows;

        $inversed_rank = $num_of_rows - $rank;

        return $inversed_rank;
   }

    public static function calculateHealthRank($area){
        /*Functions to fetch the maximum instance of each variable*/
        $rank_value = DB::select("
            SELECT FIND_IN_SET( health, (
            SELECT GROUP_CONCAT( health
            ORDER BY health DESC )
            FROM areas )
            ) AS rank
            FROM areas
            WHERE name =  '$area->name'
        ");

        $rank = $rank_value[0]->rank;

        $rows_count = DB::select("SELECT COUNT(*) AS rows FROM areas;");

        $num_of_rows = $rows_count[0]->rows;

        $inversed_rank = $num_of_rows - $rank;

        return $inversed_rank;
    }

    public static function calculateEducationRank($area){
        /*Functions to fetch the maximum instance of each variable*/
        $rank_value = DB::select("
            SELECT FIND_IN_SET( five_good_gcses, (
            SELECT GROUP_CONCAT( five_good_gcses
            ORDER BY five_good_gcses DESC )
            FROM areas )
            ) AS rank
            FROM areas
            WHERE name =  '$area->name'
        ");

        $rank = $rank_value[0]->rank;

        $rows_count = DB::select("SELECT COUNT(*) AS rows FROM areas;");

        $num_of_rows = $rows_count[0]->rows;

        $inversed_rank = $num_of_rows - $rank;

        return $inversed_rank;
    }

    public static function calculateHousingServicesRank($area){
        /*Functions to fetch the maximum instance of each variable*/
        $rank_value = DB::select("
            SELECT FIND_IN_SET( housing_and_services, (
            SELECT GROUP_CONCAT( housing_and_services
            ORDER BY housing_and_services DESC )
            FROM areas )
            ) AS rank
            FROM areas
            WHERE name =  '$area->name'
        ");

        $rank = $rank_value[0]->rank;

        $rows_count = DB::select("SELECT COUNT(*) AS rows FROM areas;");

        $num_of_rows = $rows_count[0]->rows;

        $inversed_rank = $num_of_rows - $rank;

        return $inversed_rank;
    }

    public static function calculateCrimeRank($area){
        /*Functions to fetch the maximum instance of each variable*/
        $rank_value = DB::select("
            SELECT FIND_IN_SET( crime, (
            SELECT GROUP_CONCAT( crime
            ORDER BY crime DESC )
            FROM areas )
            ) AS rank
            FROM areas
            WHERE name =  '$area->name'
        ");

        $rank = $rank_value[0]->rank;
        //rank doesn't need to be inversed like in the others because here a lower rank is better.

        return $rank;
    }

    public static function calculateLivingEnvironmentRank($area){
        /*Functions to fetch the maximum instance of each variable*/
        $rank_value = DB::select("
            SELECT FIND_IN_SET( living_environment, (
            SELECT GROUP_CONCAT( living_environment
            ORDER BY living_environment DESC )
            FROM areas )
            ) AS rank
            FROM areas
            WHERE name =  '$area->name'
        ");

        $rank = $rank_value[0]->rank;

        $rows_count = DB::select("SELECT COUNT(*) AS rows FROM areas;");

        $num_of_rows = $rows_count[0]->rows;

        $inversed_rank = $num_of_rows - $rank;

        return $inversed_rank;
    }

}
