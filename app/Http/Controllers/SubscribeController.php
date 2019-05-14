<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;
use Session;
class SubscribeController extends Controller
{
    public function subscribe(Request $request)
    {
        $email = $request->email;
        Newsletter::subscribe($email);
         Session::flash('success','Successfully subscribed');
        return redirect()->back();
    }
}
