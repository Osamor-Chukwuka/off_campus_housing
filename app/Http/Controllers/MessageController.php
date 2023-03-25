<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function displayMessagePage()
    {
        return view('Message_page');
    }
}
