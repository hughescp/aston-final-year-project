<?php
use App\Area;

class Helpers{

//    define("HAR_WEIGHTING", 0.252809);
//    define("CRIME_WEIGHTING", 0.191011);
//    define("BROADBAND_WEIGHTING", 0.185393);
//    define("GREENSPACE_WEIGHTING", 0.162921);
//    define("GCSE_WEIGHTING", 0.134831);
//    define("RESTAURANTS_WEIGHTING", 0.073034);


    public static function randomNumber()
    {

        return mt_rand(1,10);

    }


    public static function getMaxValue($column_name){
        $max_value = DB::select('SELECT MAX(:column_name) FROM areas', ['column_name' => $column_name]);

        return $max_value;
    }


    public static function calculateOverallScore($area){

        $har_weightings = 0.252809;
        $crime_weighting = 0.191011;
        $broadband_weighting = 0.185393;
        $greenspace_weighting = 0.162921;
        $gcse_weighting = 0.134831;
        $restaurants_weighting = 0.073034;

        $areas = Area::all();

        $harScore = $har_weightings*10;

        $crimeScore = $crime_weighting*10;

        $broadbandScore = $broadband_weighting*10;

        $greenSpaceScore = $greenspace_weighting*10;

        $goodGCSEsScore = $gcse_weighting*10;

        $restaurantsScore = $restaurants_weighting*10;

//
//        $harScore = HAR_WEIGHTING*(self::getMaxValue('housing_affordability_ratio'));
//
//        $crimeScore = CRIME_WEIGHTING*(self::getMaxValue('crime'));
//
//        $broadbandScore = BROADBAND_WEIGHTING*(self::getMaxValue('superfast_broadband'));
//
//        $greenSpaceScore = GREENSPACE_WEIGHTING*(self::getMaxValue('greenspace'));
//
//        $goodGCSEsScore = GCSE_WEIGHTING*(self::getMaxValue('five_good_gcses'));
//
//        $restaurantsScore = RESTAURANTS_WEIGHTING*(self::getMaxValue('restaurants'));


        $overallScore = ($harScore + $crimeScore + $broadbandScore + $greenSpaceScore + $goodGCSEsScore + $restaurantsScore)*10;

        return $overallScore;
    }
}

