<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;
use Illuminate\Http\Request;

class Twillo extends Controller
{
    public static function message($number, $message)
    {
        // Your Account SID and Auth Token from twilio.com/console
        $client = new Client(env("TWILLO_SID"), env("TWILLO_TOKEN "));

        // Use the client to do fun stuff like send text messages!
        $client->messages->create(
            // the number you'd like to send the message to
            $number,
            [
                // A Twilio phone number you purchased at twilio.com/console
                'from' => env("TWILLO_NUMBER"),
                // the body of the text message you'd like to send
                'body' => $message
            ]
        );
    }
}
