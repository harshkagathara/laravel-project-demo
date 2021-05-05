<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\favourite_wepppi;

class FindWepppiController extends Controller
{
    public function Find_Wepppi_name(Request $request){
        $wepppi_name=$request->wepppi_name;
         $Total_data= DB::table('customers')->where('username',$wepppi_name)->get();
            if(count($Total_data)>0){
                return $Total_data;
            }
            else{
                $msg = "No Wepppi Found";
                    return  $msg;
            }
        }

    public function Find_wepppi_location(Request $request){
       //
    }

    
    public function show_cuisine(){

        $cuisine = DB::table('foodtypes') ->get();
        return $cuisine;
    }

    public function Find_wepppi_cuisine(Request $request){
        
        $foodtype_id=$request->foodtype_id;
    
        $Total_data= DB::table('customers')->where('fav_cuisine', 'like', "%{$foodtype_id}%")->get();
     
      
        if(count($Total_data)>0){
            return $Total_data;
        }
        else{
            $msg = "No Wepppi Found";
                return  $msg;
        }
    }

    public function My_Favourite_Wepppi(Request $request){
        $id=$request->id;
        $my_favourite= favourite_wepppi::where('user_id',$id)->get();
        // return $my_favourite;
        if(count($my_favourite)>0){
            foreach($my_favourite as $res)
            {
                $my=$res->favourite_wepppis_id;
            }
                $value= explode(",",$my);
                $value1=array();
    //    return $value;
            foreach($value as $res)
            {
                echo $res;
                $By_name = DB::table('customers')
                ->where('user_id',$res)->get();
             
                array_push($value1, $By_name);

            }
            return $value1;
        }else{
            $msg = "No Favourite Wepppi";
            return  $msg;
        }
    }


}
