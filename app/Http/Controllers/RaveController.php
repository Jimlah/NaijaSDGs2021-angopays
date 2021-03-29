<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RaveController extends Controller
{
    public static function getAllBank()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => env("FLUTTERWAVE_BASE_API_URL") . "/banks/NG",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . env("FLUTTERWAVE_SECRET_KEY")
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response)->data;
    }

    public static function validateAccount($account_number, $bank_code)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => env("FLUTTERWAVE_BASE_API_URL") . "/accounts/resolve",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode(["account_number" => "$account_number", "account_bank" => "$bank_code"]),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                'Authorization: Bearer '.env("FLUTTERWAVE_SECRET_KEY")
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
}
