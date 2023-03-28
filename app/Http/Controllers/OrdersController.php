<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    //make payment
    public function makePayment(){
        return view('make-payment');
    }
}
