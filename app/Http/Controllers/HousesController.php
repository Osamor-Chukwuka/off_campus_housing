<?php

namespace App\Http\Controllers;

use App\Models\Houses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HousesController extends Controller
{
    // show create house page
    public function showCreateHousePage()
    {
        $Account_type = "Account-type";
        if (auth()->user() == []) {
            return redirect('/');
        } 
        elseif (auth()->user()->email == null) {
            return redirect('/');
        }
        else if(Auth::user()->$Account_type == 'LandLord'){
            return view('create-house');
        }else{
            return redirect('/');
        }
        
    }

    // create house
    public function createHouse(Request $request)
    {
        $form = $request->validate([
            'type' => 'required',
            'address' => 'required',
            'about' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'gender' => 'required',
            'security' => 'required',
            'features' => 'required',
            'furnishings' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'image1' => 'required',
            'image2' => 'required',
            'image3' => 'required',
        ]);

        Houses::create($form);
        return redirect('/')->with('message', "House created successfully");
        // dd($form);
    }

    //show all houses
    public function show()
    {   
        $houses = Houses::select('*')->get();
        if (Auth::user()->email == null){
            return redirect('/');
        }else{
            return view('houses', [
                'houses' => $houses
            ]);  //fix this later
            // dd($houses);
        }
        
    }

    //Show house full page
    public function fullPage()
    {
        if (Auth::user()->email == null){
            return redirect('/');
        }else{
            return view('full-page'); //fix  this later
        }
        
    }
}
