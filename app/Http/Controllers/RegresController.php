<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegresRequest;
use Illuminate\Support\Facades\Http;

class RegresController extends Controller
{
    public function login(RegresRequest $request){
        $response = Http::post('https://reqres.in/api/login', $request->validated());
        return $response;
    }

    public function register(RegresRequest $request){
        $response = Http::post('https://reqres.in/api/register', $request->validated());
        return $response;
    }
}
