<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{

    /**
     * Ship the given order.
     *
     * @param  Request  $request
     * @param  int  $orderId
     * @return Response
    */

    public function index() {
        return view('front.contact');
    }

    // Page Contact
    public function ship(Request $request)
    {
        Mail::to('administrateur@chezmoi.com')->send(new OrderShipped($request->except('_token')));
    }


}






