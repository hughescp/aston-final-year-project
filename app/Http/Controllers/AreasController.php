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
    
    public function store()
    {
//        dd(request()->all());
        //Create a new post using the request data
//        $post = new \App\Area;
//        
//        $post->lowerlimit = request('lowerlimit');
//        $post->upperlimit = request('upperlimit');
//        $post->crimeLevel = request('crimeLevel');
//        $post->greenSpace = request('greenSpace');
//        $post->goodGCSEs = request('goodGCSEs');
//        $post->pubsandRestaurants = request('pubsandRestaurants');
//        $post->broadband = request('broadband');
//        
//        //Save it to the database
//        $post->save();
//        
//        //Redirect to the homepage
//        return redirect('/areas');
        
        //The above code won't work because I am not trying to create a new Area object and add it to the table. This current code will result in an area saying that the variable names are unknown columns, which is because they do not exist in the MySQL database.
        
        //Create a session to store the preferences data.
        session_start();
        $_SESSION ["lowerlimit"] = request('lowerlimit');
        $_SESSION ["upperlimit"] = request('upperlimit');
        $_SESSION ["crimeLevel"] = request('crimeLevel');
        $_SESSION ["greenSpace"] = request('greenSpace');
        $_SESSION ["goodGCSEs"] = request('goodGCSEs');
        $_SESSION ["pubsandRestaurants"] = request('pubsandRestaurants');
        $_SESSION ["broadband"] = request('broadband');
        
        print_r($_SESSION);
    }

}
