<?php

namespace App\Services;

use Twilio\Rest\Client;

class OTPService
{
    protected $twilio;

    public function __construct()
    {
        $sid = env('TWILIO_SID');
        $authToken = env('TWILIO_AUTH_TOKEN');
        $this->twilio = new Client($sid, $authToken);
    }

    public function sendOTP($phoneNumber, $otp)
    {
        $message = "Your OTP code is: $otp";

        $this->twilio->messages->create(
            $phoneNumber,
            [
                'from' => env('TWILIO_PHONE_NUMBER'),
                'body' => $message
            ]
        );
    }
}
