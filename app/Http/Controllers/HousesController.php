<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HousesController extends Controller
{
    // show create house page
    public function showCreateHousePage(){
        return view('create-house');
    }
    
    //show all houses
    public function show(){
        return view('houses');
    }

    //Show house full page
    public function fullPage(){
        return view('full-page');
    }
}
