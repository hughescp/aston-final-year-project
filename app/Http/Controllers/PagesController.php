<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use JavaScript;

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

    public function test(){
        JavaScript::put([
            'people' => ['Taylor', 'Matt', 'Jeffrey'],
            'name' => 'Chris',
            'age' => 24
        ]);

        return view('test');
    }
}
