<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubAccountController extends Controller
{
    public function getSubAccounts()
    {
        $client = new \GuzzleHttp\Client(['headers' => [
            'Accept'     => 'application/json',
        ]]);
        $request = $client->get(
            "https://ravesandboxapi.flutterwave.com/v2/gpx/subaccounts?seckey=" . config('app.flutterwave_secret_key')
        );

        return response()->json(json_decode($request->getBody()->getContents()));
    }
}