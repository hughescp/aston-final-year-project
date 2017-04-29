<?php
use App\Area;

class Helpers{

    public static function calculateOverallScore($area){
        /*Weightings*/
        
        $crime_weighting = 0.255639;
        $broadband_weighting = 0.24812;
        $greenspace_weighting = 0.218045;
        $gcse_weighting = 0.180451;
        $restaurants_weighting = 0.097744;

        if(Session::has('crimeLevel')){
            $crime_weighting = (Session::get('crimeLevel')/20);
        };

        if(Session::has('broadband')){
            $crime_weighting = (Session::get('broadband')/20);
        };

        if(Session::has('greenSpace')){
            $crime_weighting = (Session::get('greenSpace')/20);
        };
        
        if(Session::has('goodGCSEs')){
            $crime_weighting = (Session::get('goodGCSEs')/20);
        };
        
        if(Session::has('pubsandRestaurants')){
            $crime_weighting = (Session::get('pubsandRestaurants')/20);
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
