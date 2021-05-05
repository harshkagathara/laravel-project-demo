<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\promotion;
use App\Models\coupons;
use Carbon\Carbon;
class PromationController extends Controller
{
    public function Check_Voucher(Request $request){
        $restaurant_id  =$request->restaurant_id ;
        $coupon_code = $request->coupon_code;
        $result = coupons::select('*')->where('coupon_code',$coupon_code)->where('restaurant_id',$restaurant_id )->get();
        $data =  date('Y-m-d');
     
        if(count($result)>0){
            
            foreach ($result as $user) {
                if($user->expiry_date <= $data){
                    $msg =  "Coupon's Validity Was Expired";
                    return $msg;
                }
                else if($user->active == ''){
                    $msg =  "Coupon's Not Available";
                    return $msg;
                }
                else{
                    return $user;
                }
                  
               
                
            }
       }
       else{
            $msg = "Voucher Not Available";
            return  $msg;
        }    
    }
}
