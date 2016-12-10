<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AreasController extends Controller
{
    public function index()
    {
     return view('areas.index');
    }
}
