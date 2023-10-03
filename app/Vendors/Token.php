<?php

namespace App\Vendors;

use Laravel\Passport\Http\Controllers\AccessTokenController;
use App\Http\Controllers\Controller;
use Psr\Http\Message\ServerRequestInterface;
use Illuminate\Support\Facades\Auth;

class Token extends AccessTokenController {

    public function createToken(ServerRequestInterface $request)
    {
        // $response = parent::issueToken($request);
        // $body = json_decode($response->content());

        // return response()->json([
        //     'token' => $body,
        // ]);

        return $request;
    }
}