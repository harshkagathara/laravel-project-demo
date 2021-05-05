<?php

namespace App\Http\Controllers\RestaurantControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function DishListDash()
    {
        $id = Session::get('resId'); 
        $dishes_food = DB::table('dishes')->where('type','food')->where('restaurant_id',$id)->get();
        $dishes_drink = DB::table('dishes')->where('type','drink')->where('restaurant_id',$id)->get();
        $dishes_meal = DB::table('dishes')->where('type','meal')->where('restaurant_id',$id)->get();
        return view('restaurant-owner.index',compact('dishes_food','dishes_drink','dishes_meal'));
    }
}
