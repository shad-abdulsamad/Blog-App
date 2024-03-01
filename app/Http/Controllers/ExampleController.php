<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function homePage()
    {
        $myName = 'shad';
        return view('home', ['myName' => $myName]);
    }

    public function aboutPage()
    {
        return view('single-post');
    }
}
