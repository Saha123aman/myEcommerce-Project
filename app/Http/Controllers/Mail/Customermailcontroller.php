<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\Customer\Customermail;
use App\Mail\Customer\ConfirmationMail;
use Illuminate\Support\Facades\Mail;

class Customermailcontroller extends Controller
{
    public function send(Request $request)
    {

        // $validated = $request->validate([
        //     'name' => 'required|string',
        //     'email' => 'required|email',
        //     'message' => 'required|string',
        // ]);
        $customermail=$request->input('email');
        $customermessage=$request->input('message');
        \Log::info('Customer Email: ' . $customermail);
        \Log::info('Customer Message: ' . $customermessage);

        try {
            Mail::to('sahaamantran981@gmail.com')->send(new Customermail($customermail,$customermessage));

            // Mail::to($validated['email'])->send(new ConfirmationMail($validated['name']));
            return back()->with('successmail', 'Your message has been sent!');
        } catch (\Exception $e) {
            \Log::error('Mail sending failed: ' . $e->getMessage());
            return back()->with('failmail', 'Your message has not been sent!');
        }
    }
}
