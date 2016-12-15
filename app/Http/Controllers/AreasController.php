<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

use App\Http\Requests;

class AreasController extends Controller
{
    public function index()
    {
        $areas = Area::all();

        return view('areas.index', compact('areas'));
    }

    public function show($area)
    {
        return $area;
    }

    public function calculateOverallScore($area)
    {
        $areas = Area::all();

//        define("HARWeighting", 0.252809);
//        define("crimeWeighting", 0.191011);
//        define("broadbandWeighting", 0.185393);
//        define("greenspaceWeighting", 0.162921);
//        define("GCSEWeighting", 0.134831);
//        define("restaurantsWeighting", 0.073034);
//
//        var $overallScore;
//
//        var float areaHARCPr = area.har/MAX($areas);
//        var float areaCrimeLevelCPr = area.CrimeLevel/MAX($areas);
//        var float areaBroadbandCPr = area.broadband/MAX($areas);
//        var float areaGreenSpaceCPr = area.greenspace/MAX($areas);
//        var float areaGoodGCSEsCPr = area.GCSEs/MAX($areas);
//        var float areaRestaurantsCPr = area.restaurants/MAX($areas);
//
//        var float overallScore = (areaHARCPr*HARWeighting)+(areaCrimeLevelCPr*crimeWeighting)+(areaBroadbandCPr*broadbandWeighting)+(areaGreenSpaceCPr*greenspaceWeighting)+(areaGoodGCSEsCPr*GCSEWeighting)+(areaRestaurantsCPr*restaurantsWeighting);
//
//        return $overallScore;

    }
}
