<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client\NewsletterSubscriber;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Mail\Newsletter\NewsletterSubscriptionConfirmation;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function store(Request $request){

        $usermail=$request->input('email');
        // dd($usermail);
        $customer = Auth::guard('custom')->user();
        if(!$customer){
            return redirect()->back()->with('NotaCustomer', 'You must login'); 
        }
    
        $is_exist=NewsletterSubscriber::where('email',$request->email)->first();
        if($is_exist){

             return redirect()->back()->with('successSubcribe', 'You have already subscribed'); 
        }

    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    NewsletterSubscriber::create([
        'email' => $request->input('email'),
    ]);
     $successSubcribe="You have successfully signed up for the newsletter!";
    Mail::to($usermail)->send(new NewsletterSubscriptionConfirmation($successSubcribe));
    return redirect()->back()->with('successSubcribe', 'You have successfully signed up for the newsletter!');
}
}

