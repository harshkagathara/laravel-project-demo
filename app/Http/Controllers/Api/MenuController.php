<?php

namespace App\Http\Controllers\Api;
use App\Models\restaurants;
use App\Models\dishes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Review;

class MenuController extends Controller
{
   public function Restaurant_Menu_Food(Request $request)
   {
        $res_id = $request->restaurant_id;
        $dishes = dishes::where('restaurant_id',$res_id)->where('type','food')->get();
            if(count($dishes)>0){
                return $dishes ;
            }
            else{
                $msg = "NO FOOD";
                return $msg;
            }
    }

   public function Restaurant_Menu_Drink(Request $request)
   {
        $res_id = $request->restaurant_id;
        $dishes = dishes::where('restaurant_id',$res_id)->where('type','drink')->get();
            if(count($dishes)>0){
                return $dishes ;
            }
            else{
                $msg = "NO Drink";
                return $msg;
            }
    }

   public function Restaurant_Menu_Meal(Request $request)
   {
        $res_id = $request->restaurant_id;
        $dishes = dishes::where('restaurant_id',$res_id)->where('type','meal')->get();
            if(count($dishes)>0){
                return $dishes ;
            }
            else{
                $msg = "NO Meal";
                return $msg;
            }
    }

   public function View_Dish(Request $request)
   {
       $dish_id = $request->dish_id;
       $dishes = dishes::where('id',$dish_id)->get();
       
       if(count($dishes)>0){
        $addons_category = DB::table('dishes')->
        join('addons_categories','addons_categories.id','=','dishes.addons_category_id')->
         join('dish_categories','dish_categories.id','=','dishes.dish_category_id')
        ->where('dishes.id',$dish_id)->select('dishes.*','addons_categories.*','dish_categories.*')->get();
           
        return $addons_category ;
       }
       else{
           $msg = "NO Dish";
           return $msg;
       }
   }

   public function Restautrant_Review(Request $request)
   {
            $res_id = $request->restaurant_id;
            $Review = Review::where('sender_id',$res_id)->get();
            if(count($Review)>0){
                return $Review;
            }
            else {
                $msg = "No Review Find";
                return  $msg;
            }
   }
}
