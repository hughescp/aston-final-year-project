<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

use App\Http\Requests;

class AreasController extends Controller
{
    public function index()
    {
    $areas = \DB::table('areas')->get();

    return view('areas.index', compact('areas'));
    }
}
