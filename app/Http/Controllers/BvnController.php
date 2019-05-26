<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BvnController extends Controller
{
    public function check(Request $request)
    {
        $this->validate($request, [
            'bvn_number' => 'required|numeric|digits:11|',
            'bvn_surname' => 'required|min:3'
        ]);

        $response = json_decode($this->getRequest($request['bvn_number']));

        if ($response->status == "success") {
            $data = $response->data;
            if ($data->bvn == $request['bvn_number'] && strtolower($data->last_name) == strtolower($request['bvn_surname'])) {
                // It actually Matches
                return response()->json(['success' => true, 'bvn_matches' => true, 'message' => 'Verification Success', 'bvn_details' => $data]);
            }
        }
        return response()->json(['success' => false, 'bvn_matches' => false, 'message' => 'Ooops! BVN details do not match']);
    }

    protected function getRequest($bvn_number)
    {
        $client = new \GuzzleHttp\Client(['headers' => [
            'Accept'     => 'application/json',
        ]]);

        $request = $client->get(
            "https://ravesandboxapi.flutterwave.com/v2/kyc/bvn/'.$bvn_number.'?seckey=" . config('app.flutterwave_secret_key')
        );

        return $request->getBody()->getContents();
    }
}