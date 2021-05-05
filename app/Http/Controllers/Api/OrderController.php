<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\live_request;
use App\Models\follow_up;
use DB;
use App\Models\customers;
use App\Models\wepppi_order_req;
class OrderController extends Controller
{
    public function Add_Live_Request(Request $request){

        $live_request = new live_request;
        $live_request->restaurant_id = $request->restaurant_id;
        $live_request->request_by = $request->request_by;
        $live_request->wepppies = $request->wepppies;
        $live_request->purpose = $request->purpose;
        $live_request->date = $request->date;
        $live_request->time = $request->time;
        $live_request-> status = '1';
        $live_request->save();

        return $live_request; 
    }

    public function Add_Follow_up(Request $request,$id){

        if (follow_up::where('id', $id)->exists()) {
            // $request = follow_up::find($id);
            // if(count($request)>0){
            //     $req_id = $r
            // } 
            $follow_up =follow_up::find($id);   
            $req_id = $follow_up->request_by;
            
            $follow_up -> restaurant_id =  $request->restaurant_id ;
            $follow_up -> wepppies =  $request->wepppies ;
            $follow_up -> purpose = $request->purpose;
            $follow_up -> date = $request->date;
            $follow_up -> time = $request->time;
            $follow_up-> amount = $request->amount;
            $follow_up -> status = '1';
            $follow_up -> wepppi_id = collect($request->wepppi_id)->implode(',');
            $follow_up -> comment = $request->comment;
            $follow_up -> food = $request->food;
            $follow_up -> drink = $request->drink;
            $follow_up -> meal = $request->meal;
            $follow_up -> special_instruction = $request->special_instruction;
            $follow_up->save();

          $wepppi_order_req = new wepppi_order_req;
          $wepppi_order_req->follow_up_id = $id;
          $wepppi_order_req->wepppi_id =$req_id;
          $wepppi_order_req->status ='1';
          $wepppi_order_req->food = $request->food;
          $wepppi_order_req->drink = $request->drink;
          $wepppi_order_req->meal = $request->meal;
          $wepppi_order_req->special_instruction = $request->special_instruction;
          $wepppi_order_req->save();

       return [$follow_up,$wepppi_order_req];
        }
        else {
            return response()->json([
              "message" => "Id not found"
            ], 404);
          }
    }
    public function Show_Follow_up(Request $request){
        $order_id = $request->order_id;
    
        $By_name = DB::table('follow_ups')->
        join('restaurants','restaurants.id','=','follow_ups.restaurant_id')->
        join('restaurant_addresses','restaurant_addresses.restaurant_id','=','restaurants.id')
        ->where('order_id',$order_id)->select('restaurant_addresses.*','restaurants.*','follow_ups.*')->get();

            return $By_name;
    }
    public function Wepppi_Order(Request $request)
    {
        $wepppi_order_req = new wepppi_order_req;

        $wepppi_order_req->follow_up_id = $request->follow_up_id;
        $wepppi_order_req->wepppi_id = $request->wepppi_id;
        $wepppi_order_req->status = $request->status;
        $wepppi_order_req->food = $request->follow_up_id;
        $wepppi_order_req->drink = $request->drink;
        $wepppi_order_req->meal = $request->meal;
        $wepppi_order_req->special_instruction = $request->special_instruction;
        $wepppi_order_req->save();

        return $wepppi_order_req;

    }

    public function Show_Follow_Request(Request $request){
        $follow_up_id = $request->follow_up_id;
        $wepppi_order= DB::table('wepppi_order_reqs')->where('follow_up_id',$follow_up_id)->get();
        $By_name = DB::table('follow_ups')->
        join('restaurants','restaurants.id','=','follow_ups.restaurant_id')->
        join('restaurant_addresses','restaurant_addresses.restaurant_id','=','restaurants.id')
        ->where('follow_ups.id',$follow_up_id)->select('restaurant_addresses.*','restaurants.*','follow_ups.*')->get();
       
        if(count($By_name)>0)
        {
            foreach($By_name as $wepppi)
            {
                $wepppi_id =  $wepppi->wepppi_id;
                $req_by =  $wepppi->request_by;
            }
            $value= explode(",",$wepppi_id);
            $value1=array();

            $req_by = DB::table('customers')->where('user_id',$req_by)->get();

            foreach($value as $res)
            {
            
                $By_name1 = DB::table('customers')->where('user_id',$res)->get();
             
                array_push($value1, $By_name1);

            }
            return [$value1, $By_name,$wepppi_order,$req_by];
           
        }
        else{
            $msg = "not Found";
            return $msg;
        }
        
    }

    public function Show_All_Follow_up(Request $request){
        $wepppi_id = $request->wepppi_id;
    
     
       
        $By_name1 = DB::table('follow_ups')->
        join('restaurants','restaurants.id','=','follow_ups.restaurant_id')->
        join('restaurant_addresses','restaurant_addresses.restaurant_id','=','restaurants.id')
        ->select('restaurant_addresses.*','restaurants.*','follow_ups.*')->get();
        
        $value1=array();
        $value2=array();
        $value3=array();
        $value4=array();
        $count=0;
        $result=array();



        foreach($By_name1 as $wepppi)
        {
            $req_by =  $wepppi->request_by;
            $wepppi_id1 =  $wepppi->wepppi_id;
            $order_id =  $wepppi->order_id;
        
            $value= explode(",",$wepppi_id1);
            
            if($req_by==$wepppi_id)
            {
                $By_name = DB::table('follow_ups')
                ->join('restaurants','restaurants.id','=','follow_ups.restaurant_id')
                ->join('restaurant_addresses','restaurant_addresses.restaurant_id','=','restaurants.id')
                ->where('order_id',$order_id)
                ->select('restaurant_addresses.*','restaurants.*','follow_ups.*')->get();
                $value1 = $By_name->toArray();
                
                // array_push($value1,$By_name1);
                // $value1=$By_name1;
                
                $req_by = DB::table('customers')->where('user_id',$req_by)->get();
                $value3 = $req_by->toArray();

                foreach($value as $res)
                {
                    $cust = DB::table('customers')->where('user_id',$res)->get();
                    array_push($value2,$cust);        
                }
                $count++;
                $res = array_merge($value1, $value3, $value2); 
                array_push($value4,$res); 
                $value2=array();
                $value3=array();
            }
            else
            {
                foreach($value as $res)
                {
                    if($res==$wepppi_id)
                    {
                        $By_name = DB::table('follow_ups')
                        ->join('restaurants','restaurants.id','=','follow_ups.restaurant_id')
                        ->join('restaurant_addresses','restaurant_addresses.restaurant_id','=','restaurants.id')
                        ->where('order_id',$order_id)
                        ->select('restaurant_addresses.*','restaurants.*','follow_ups.*')->get();
                        $value1 = $By_name->toArray();
                        
                        //array_push($value1,$By_name1);
                        // $value1=$By_name1;

                        $req_by = DB::table('customers')->where('user_id',$req_by)->get();
                        $value3 = $req_by->toArray();
                        foreach($value as $res)
                        {
                            $cust = DB::table('customers')->where('user_id',$res)->get();
                            array_push($value2,$cust);        
                        }
                        $count++;
                        $res = array_merge($value1, $value3, $value2); 
                        array_push($value4,$res); 
                        $value2=array();
                        $value3=array();
                    }
                }

            }
        }
        if($count>0)
        {
            return [$value4];
        }
        else
        {
            return "No Follow Ups";
        }
        //return $By_name;
    }
}
