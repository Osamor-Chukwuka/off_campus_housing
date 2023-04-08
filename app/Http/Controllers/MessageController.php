<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function displayMessagePage($landlord_id)
    {
        // we don't need to check if $landlord_id == lanlord in Accoun_type column, we've done that already in House controller
        $landlord_details = Auth::user()->where('id', $landlord_id)->where('Account-type', 'LandLord')->get();

        $user = User::find(1);
        $user_id =$user->messages()->get();

        // get all messages sent to current user
        $messages = $user->messages()->where('user_id', Auth::user()->id)->where('landlord_id', $landlord_id)->get('message');

        // get all landlord that have sent messages, or have chatted with recently
        $all_landlord_id = $user->messages()->where('user_id', Auth::user()->id)->get('landlord_id');

        // create array to store all landlords
        $all_landlord = [];

        foreach($all_landlord_id as $all){
            // echo $all;
            // check user tables for $all_landlord details
            $all_landlords_details = Auth::user()->where('id', $all->landlord_id)->where('Account-type', 'LandLord')->get();
            // echo();
            (array_push($all_landlord, $all_landlords_details[0]));
        }

        
        return view('Message_page', [
            'messages' => $messages,
            'all_landlord' => $all_landlord,
            'landlord_details' => $landlord_details
        ]);
    }
}
