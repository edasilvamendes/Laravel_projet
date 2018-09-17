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
         $this->validate($request, [
            'email' => 'required',
            'description' => 'required',
        ]);

        $email = $request->input('email');
        $description = $request->input('description');

        Mail::to($email)->send(new OrderShipped($email, $description));
        return redirect()->route('contact')->with('message', 'Le mail a bien été envoyé');
    }


}






