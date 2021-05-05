<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\restaurants;
use App\Models\favourite_restaurant;
class FindRestaurantController extends Controller
{
    
    public function FindRestaurant_name(Request $request){
        $restaurant_name=$request->restaurant_name;

        $By_name = DB::table('restaurant_addresses')->join('restaurants','restaurants.id','=','restaurant_addresses.restaurant_id')
        ->where('name',$restaurant_name)->select('restaurants.*','restaurant_addresses.*')->get();
   
        // $result = DB::table('restaurants')->where('name',$restaurant_name)->get();
        if(count($By_name)>0){
             return $By_name;
        }
        else{
            $msg = "No Restaurants Found";
        return  $msg;
    }
}

    public function FindRestaurant_location(Request $request){
        $restaurant_area=$request->restaurant_area;

        $By_location = DB::table('restaurant_addresses')->join('restaurants','restaurants.id','=','restaurant_addresses.restaurant_id')
        ->where('address', 'like', "%{$restaurant_area}%")->select('restaurants.*','restaurant_addresses.*')->get();
     
      if(count($By_location)>0){
        return $By_location;
    }
else{
    $msg = "No Restaurants Found";
        return  $msg;
}
    }

    
    public function FindRestaurant_cuisine(Request $request){
        $cuisine_name=$request->cuisine_name;
        $res_cui_id =   DB::table('foodtypes')->where('name',$cuisine_name)->pluck('id');
            if(count($res_cui_id)>0){
                $get_res_name =   DB::table('restaurants')->where('foodtype_id',$res_cui_id)->get();
                return $get_res_name;
            }
            else{
                $msg = "No Restaurants Found";
                return  $msg;
            }
        }
        
        public function Find_dish(Request $request){
            $id=$request->id;
            $res_cui_id = DB::table('dishes')->where('restaurant_id',$id)->get();
                if(count($res_cui_id)>0){
                  
                    return $res_cui_id;
                }
                else{
                    $msg = "No Restaurants Find";
                    return  $msg;
                }
            }

            public function My_Favourite_Res(Request $request){
                $id=$request->id;
                $my_favourite= favourite_restaurant::where('user_id',$id)->get();
                if(count($my_favourite)>0){
                    foreach($my_favourite as $res)
                    {
                        $my=$res->favourite_restaurants_id;
                    }
                        $value= explode(",",$my);
                        $value1=array();
               
                    foreach($value as $res)
                    {
                        echo $res;
                        $By_name = DB::table('restaurant_addresses')
                        ->join('restaurants','restaurants.id','=','restaurant_addresses.restaurant_id')
                        ->where('restaurant_id',$res)->select('restaurants.*','restaurant_addresses.*')->get();
                     
                        array_push($value1, $By_name);

                    }
                    return $value1;
                }else{
                    $msg = "No Favourite Restaurant";
                    return  $msg;
                }
                   
         

    }

}
