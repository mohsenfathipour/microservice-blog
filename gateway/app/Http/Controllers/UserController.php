<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $url = config('microservice.user') . 'user';

        $response = Http::withToken($request->bearerToken())
            ->withHeaders(['Accept' => 'application/json'])
            ->get($url)->json();

        return response()->json($response);
    }

    public function store(Request $request)
    {
        $url = config('microservice.user') . 'user';

        $response = Http::withToken($request->bearerToken())
            ->withHeaders(['Accept' => 'application/json'])
            ->post($url, $request->all())
            ->json();

        return response()->json($response);
    }


}
