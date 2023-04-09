<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function displayMessagePage($landlord_id, $user_id)
    {
        // we don't need to check if $landlord_id == lanlord in Accoun_type column, we've done that already in House controller
        $landlord_details = Auth::user()->where('id', $landlord_id)->where('Account-type', 'LandLord')->get();

        $user = User::find(1);
        $user_id = Auth::user()->id;


        $account_type = 'Account-type';
        if(Auth::user()->$account_type == 'Student'){
            // get all messages sent to current user
            $messages = Message::select()->where('user_id', Auth::user()->id)->where('landlord_id', $landlord_id)->get();
        }else{
            // get all messages sent to current user
            $messages = Message::select()->where('user_id', $user_id)->where('landlord_id', $landlord_id)->get();
        }
       

        // get all landlord that have sent messages, or have chatted with recently
        $all_landlord_id = Message::select()->where('user_id', Auth::user()->id)->get('landlord_id');

        // create array to store all landlords
        $all_landlord = [];

        foreach($all_landlord_id as $all){
            // echo $all;
            // check user tables for $all_landlord details
            $all_landlords_details = Auth::user()->where('id', $all->landlord_id)->where('Account-type', 'LandLord')->get();
            // echo();
            (array_push($all_landlord, $all_landlords_details[0]));
        }

        // echo($messages);
        
        return view('Message_page', [
            'messages' => $messages,
            'all_landlord' => $all_landlord,
            'landlord_details' => $landlord_details,
            'user_id' => $user_id,
            'landlord_idd' => $landlord_id
        ]);
    }

    public function sendMessage($user_id, Request $request, $landlord_idd){
        $form = $request->validate([
            'message' => 'required',
        ]);

        $form['user_id'] = $user_id;
        $form['landlord_id'] = $landlord_idd;

        Message::create($form);
        return redirect('/houses/message/'.$landlord_idd . '/'. $user_id);
    }
}
