<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;
//Changed to line below as was getting an error message for Request:all() saying the method should not be called statically. Apparently this way the call was not going through the Request facade.
//use Request;

use App\Http\Requests;
use JavaScript;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

class AreasController extends Controller
{
    public function index()
    {
        $areas = Area::all();

        JavaScript::put([
            'areas' => $areas,
        ]);

        return view('areas.index', compact('areas'));
    }

    public function fetch()
    {
        $areas = Area::all();
        return $areas;
    }

    public function show(Area $area)
    {
        $areas = Area::all();

        return view('areas.show', compact('area','areas'));
        return $area;
    }
    
    public function show_asking_prices(Area $area)
    {
        return view('areas.show_asking_prices', compact('area'));
        return $area;
    }

    public function show_crime(Area $area)
    {
        return view('areas.show_crime', compact('area'));
        return $area;
    }

    public function show_neighbourhood(Area $area)
    {
        return view('areas.show_neighbourhood', compact('area'));
        return $area;
    }

    public function show_people(Area $area)
    {
        return view('areas.show_people', compact('area'));
        return $area;
    }

    public function show_pubtransport(Area $area)
    {
        return view('areas.show_pubtransport', compact('area'));
        return $area;
    }

    public function show_schools(Area $area)
    {
        return view('areas.show_schools', compact('area'));
        return $area;
    }

    public function show_comparison(Request $request)
    {
        $areas= Area::whereIn('id',$request->area)->get();

        return view('areas.show_comparison', compact('areas'));
    }

    // Will return data in the form of area=1&area=2

    public function show_sol(Area $area)
    {
        return view('areas.show_sol', compact('area'));
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
//        session_start();
//        $_SESSION ["lowerlimit"] = request('lowerlimit');
//        $_SESSION ["upperlimit"] = request('upperlimit');
//        $_SESSION ["crimeLevel"] = request('crimeLevel');
//        $_SESSION ["greenSpace"] = request('greenSpace');
//        $_SESSION ["goodGCSEs"] = request('goodGCSEs');
//        $_SESSION ["pubsandRestaurants"] = request('pubsandRestaurants');
//        $_SESSION ["broadband"] = request('broadband');
//        
//        print_r($_SESSION);
    }

}
