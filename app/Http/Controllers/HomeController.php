<?php

namespace App\Http\Controllers;

use App\Models\Houses;
use App\Models\Orders;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // // check if student rent have expire
        // $rent_house = Houses::select('*')->get();
        // foreach ($rent_house as $r_house) {

        //     if ($r_house->duration == 'year') {
        //         $rent_order = Orders::select('*')->get();
        //         foreach ($rent_order as $order) {
        //             echo ($order->created_at);
        //             $now = Carbon::now();
        //             $diffInDays = $order->created_at->diffInDays($now);
        //             if ($diffInDays > 365) {
        //                 Orders::destroy($order->id);
        //             } else {
        //                 // The difference is 31 days or less
        //             }
        //         }
        //     } elseif ($r_house->duration == 'month') {
        //         $rent_order = Orders::select('*')->get();
        //         foreach ($rent_order as $order) {
        //             echo ($order->created_at);
        //             $now = Carbon::now();
        //             $diffInDays = $order->created_at->diffInDays($now);
        //             if ($diffInDays > 31) {
        //                 Orders::destroy($order->id);
        //             } else {
        //                 // The difference is 31 days or less
        //             }
        //         }
        //     } elseif ($r_house->duration == 'week') {
        //         $rent_order = Orders::select('*')->get();
        //         foreach ($rent_order as $order) {
        //             echo ($order->created_at);
        //             $now = Carbon::now();
        //             $diffInDays = $order->created_at->diffInDays($now);
        //             if ($diffInDays > 7) {
        //                 Orders::destroy($order->id);
        //             } else {
        //                 // The difference is 31 days or less
        //             }
        //         }
        //     }
        // }




        $houses = Houses::select('*')->get();
        $order = DB::table('orders')->where('id', '>', 0);
        // dd($order);
        return view('welcome', [
            'houses' => $houses,
            'order' => $order
        ]);
    }
}
