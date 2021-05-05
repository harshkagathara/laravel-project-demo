<?php

namespace App\Http\Controllers\RestaurantControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
class OrderController extends Controller
{
    public function Show_live_Request(){
        $id = Session::get('resId'); 
      
        $live_request = DB::table('live_requests')
        ->join('users','users.id','=','live_requests.request_by')
        ->where('restaurant_id',$id) 
        ->where('status','1')
       ->select('users.*','live_requests.*')->get();
     
        return view('restaurant-owner/Orders/live_Request',compact('live_request'));
    }
    public function Show_Follow_Ups(){
        $id = Session::get('resId'); 
        $follow_ups = DB::table('follow_ups')
        ->join('users','users.id','=','follow_ups.request_by')
        ->where('restaurant_id',$id)
        ->select('users.*','follow_ups.*')->get();

        return view('restaurant-owner/orders/index',compact('follow_ups'));
    }

    
    public function Live_Request_Store(Request $request){
        $status = $request->status;
        $id = $request->id;

       if($status == '1')
       {
           $follow_up = new follow_up;
           $follow_up->order_id =  $request->id;
           $follow_up->wepppies =  $request->wep;
           $follow_up->purpose =  $request->pur;
           $follow_up->time =  $request->time;
           $follow_up->date =  $request->date;
           $follow_up->status = $request->status;
           $follow_up->request_by  =  $request->req;
           $follow_up->restaurant_id  =  $request->res_id;
           $follow_up->save(); 
       }
       else
       {
           $follow_up = new follow_up;
           $follow_up->order_id =  $request->id;
           $follow_up->wepppies =  $request->wep;
           $follow_up->purpose =  $request->pur;
           $follow_up->time =  $request->time;
           $follow_up->date =  $request->date;
           $follow_up->status = $request->status;
           $follow_up->request_by  =  $request->req;
           $follow_up->restaurant_id  =  $request->res_id;
           $follow_up->save();
       }
           
       DB::update('update live_requests set status=0 where id=?',[$id]);
       //DB::delete('delete From live_requests where id=?',[$id]);

           echo json_encode(array("statusCode" => "Add_success"));

      
   }
}
