<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HousesController extends Controller
{
    //show all houses
    public function show(){
        return view('houses');
    }

    //Show house full page
    public function fullPage(){
        return view('full-page');
    }
}
