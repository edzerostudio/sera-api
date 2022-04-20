<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class FilterController extends Controller
{
    public function filter(){
        $response = Http::get('https://gist.githubusercontent.com/Loetfi/fe38a350deeebeb6a92526f6762bd719/raw/9899cf13cc58adac0a65de91642f87c63979960d/filter-data.json');

        $billdetails = Arr::get($response, 'data.response.billdetails');
        $billdetails = Arr::pluck($billdetails, 'body');
        $billdetails = Arr::collapse($billdetails);
        foreach ($billdetails as $key => $billdetail) {
            $arr = explode(' ', $billdetail);
            $billdetails[$key] = array_pop($arr);
        }
        
        return $billdetails;
    }
}
