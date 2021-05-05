<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\restaurants;

class RatingController extends Controller
{
    public function top_5_restaurant(){
       
       // $result = restaurants::orderBy('rating', 'desc')->limit(5)->get();

        $result  = DB::table('restaurant_addresses')->join('restaurants','restaurants.id','=','restaurant_addresses.restaurant_id')
        ->orderBy('rating', 'desc')->select('restaurants.*','restaurant_addresses.*')->limit(5)->get();

        if(count($result )>0){
             return $result ;
        }
        else{
            $msg = "No Restaurants Find";
        return  $msg;
    }
}
}
