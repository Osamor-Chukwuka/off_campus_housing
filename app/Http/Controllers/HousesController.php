<?php

namespace App\Http\Controllers;

use App\Models\Houses;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
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
            'tenants' => 'required',
            'roomates' => 'required',
            'zip' => 'required',
            'image1' => 'required',
            'image2' => 'required',
            'image3' => 'required',
        ]);

        $form['landlord_id'] = Auth::user()->id;

        Houses::create($form);
        return redirect('/')->with('message', "House created successfully");
        // dd($form);
    }

    // Search houses characteristics
    public function search(Request $request, Route $route){
        $current_route = $route->uri;
        $min = $request['min'];
        $max = $request['max'];
        $user_type = $request['user_type'];
        $roomates = $request['roomates'];
        $neighbourhood = $request['neighbourhood'];
        $houses = Houses::select('*')->where('tenants', 'LIKE', '%'.$user_type.'%')->where('price', '>', $min)
        ->where('price', '<', $max)->where('tenants', 'LIKE', '%'.$user_type.'%')->where('roomates', $roomates)->
        where('city', 'LIKE', '%'.$neighbourhood.'%')->get();
        // dd($current_route);
        return view('houses', [
            'houses' => $houses,
            'current_route' => $current_route
        ]);

    }

    // redirect user from search, after they click clear
    public function searchRedirect(){
        return redirect('/houses');
    }

    //show all houses
    public function show(Route $route)
    {   
        $current_route = $route->uri;
        $houses = Houses::select('*')->get();
        if (Auth::user()->email == null){
            return redirect('/');
        }else{
            return view('houses', [
                'houses' => $houses,
                'current_route' => $current_route
            ]);  //fix this later
            // dd($houses);
        }
        
    }

    //Show house full page
    public function fullPage(Request $request)
    {   $segment =  $request->segment(3);
        $house = Houses::select('*')->where('id', $segment)->get();
        $house = $house[0];
        if (Auth::user()->email == null){
            return redirect('/');
        }else{
            return view('full-page', [
                'house' => $house
            ]); //fix  this later
        }
        
    }

    // Display all houses belonging to each Landlord
    public function myHouses(){
        $user = Auth::user()->id;
        $my_houses = Houses::select('*')->where('landlord_id', $user)->get();
        return view('landlord-houses', [
            'my_houses' => $my_houses
        ]);
    }

    // Landlord Deletes house
    public function deleteLandlordHouse(Request $request){
        Houses::destroy($request->house_id);
        return redirect(Route('my_houses'))->with('status', 'House removed successfully');
    }
}
