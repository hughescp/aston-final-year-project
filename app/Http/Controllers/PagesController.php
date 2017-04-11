<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Area;

use App\Http\Requests;

use JavaScript;

use DB;

use Session;

class PagesController extends Controller
{
    public function home()
    {
        JavaScript::put([
            'people' => ['Taylor', 'Matt', 'Jeffrey'],
            'name' => 'Chris',
            'age' => 24
        ]);
        return view('welcome');
    }

    public function about(){
        return view('pages/about');
    }

    public function test()
    {
        $areas = Area::all();

        JavaScript::put([
            'people' => ['Taylor', 'Matt', 'Jeffrey'],
            'areas' => $areas,
            'age' => 24
        ]);

        return view('test');
    }

    public function store(Request $request){

        $optout;

        if($request->optOutBox == null){
            $optout = false;
        }else{
            $optout = true;
        };

//        $crime_weighting = ($_POST["crimeLevel"]/20);
//        $broadband_weighting = ($_POST["broadband"]/20);
//        $greenspace_weighting = ($_POST["greenSpace"]/20);
//        $gcse_weighting = ($_POST["goodGCSEs"]/20);
//        $restaurants_weighting = ($_POST["pubsandRestaurants"]/20);
//        $lowerlimit = ($_POST["lowerlimit"]);
//        $upperlimit = ($_POST["upperlimit"]);

        DB::table('emails')->insert(
            ['email_address' => $request->email,
            'optout' => $optout
//             ,
//            'crime_weighting' => $crime_weight,
//            'broadband_weighting' => $broadband_weighting,
//            'greenspace_weighting' => $greenspace_weighting,
//            'gcse_weighting' => $gcse_weighting,
//            'restaurants_weighting' => $restaurants_weighting,
//            'lowerlimit' => $lowerlimit,
//            'upperlimit' => $upperlimit
            ]
        );

        Session::flash('status','Thank you for requesting a report. We will send it to you shortly.'); //a temporary message

        return back();
    }
}
