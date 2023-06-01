<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Http;

class RequestManager
{

    public static function getRequest($queryString)
    {

        $accessToken = RequestManager::getBearerToken();
        return Http::withToken($accessToken)->get(env("API_BASE_URL") . $queryString)->json();

    }

    private static function getBearerToken()
    {

        $response = Http::post(env("API_TOKEN_URL"), [
            'grant_type' => 'client_credentials',
            'client_id' => env("CLIENT_ID"),
            'client_secret' => env("CLIENT_SECRET"),
        ]);

        return $response->json("access_token");

    }

}
