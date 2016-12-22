<?php
class Helpers{
    public static function calculateOverallScore()
    {

        return mt_rand(1,10);
//        $areas = Area::all();
//
//        define("HAR_WEIGHTING", 0.252809);
//        define("CRIME_WEIGHTING", 0.191011);
//        define("BROADBAND_WEIGHTING", 0.185393);
//        define("GREENSPACE_WEIGHTING", 0.162921);
//        define("GCSE_WEIGHTING", 0.134831);
//        define("RESTAURANTS_WEIGHTING", 0.073034);
//
//        /* PSEUDOCODE TO FIND MAX VALUE
//        function find_max_value($column_name){
//            var $max_value = 0;
//            foreach $areas as $area
//                if ($area->$column name > $max_value){
//                    $max_value = $area->column_name;
//                };
//            end foreach
//            return $max_value;
//        }
//        */
//        var $harScore = HAR_WEIGHTING*(1-($area->housing_affordability_ratio/MAX(areas.HAR)));
//
//        var $crimeScore = CRIME_WEIGHTING*(1-($area->crime/MAX(areas.crime)));
//
//        var $broadbandScore = BROADBAND_WEIGHTING*($area->superfast_broadband/MAX(areas.crime));
//
//        var $greenSpaceScore = GREENSPACE_WEIGHTING*($area->greenSpace/MAX(areas.greenSpace));
//
//        var $goodGCSEsScore = GCSE_WEIGHTING*($area->five_good_gcses/MAX(areas.goodGCSEs));
//
//        var $restaurantsScore = RESTAURANTS_WEIGHTING*($area->restaurants/MAX(areas.restaurant));
//
//        /*
//        SQL statement to get max value from a column in table.
//        SELECT MAX(`insert column name here`) FROM `areas`;
//        */
//
//        var $overallScore = ($harScore + $crimeScore + $broadbandScore + $greenSpaceScore + $goodGCSEsScore + $restaurantsScore)*10;
//
//        return $overallScore;
    }
}
