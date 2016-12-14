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
}
