<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\customers;
use App\Models\block;
use App\Models\favourite_restaurant;
use App\Models\favourite_wepppi;
class ProfileController extends Controller
{
    public function Profile(Request $request)
    {
        $id=$request->id;
        $profile =  DB::table('customers')->where('id',$id)->get();
        if(count($profile)>0){
        return $profile;
        }
        else
        {
            $msg = "No profile Find";
            return  $msg;
        }
    }

    public function EditProfile(Request $request,$id)
    {
      
      
            if (customers::where('id', $id)->exists()) {
              $customers = customers::find($id);
            
              $request->validate([
                    'first_name'=>'required',
                    'last_name'=>'required',
                    'email'=>'required'
                ]);

                $customers->first_name = $request->first_name;
                $customers->last_name = $request->last_name;
                $customers->education = $request->education;
                $customers->profession = $request->profession;
                $customers->dob = $request->dob;
                $customers->gender = $request->gender;
                $customers->phone = $request->phone;
                $customers->username = $request->username;
                $customers->email = $request->email;
                $customers->password = $request->password;
                $customers->image = $request->image;
                // $customers->fav_restaurant = collect($request->fav_restaurant)->implode(','); 
              // $kagu = collect($request->fav_restaurant)->implode(','); 
              // return $kagu;
                $customers->fav_cuisine  = collect($request->fav_cuisine)->implode(',');
                $customers->save();
              
                $User_id=$request->id;
                $profile = customers::where('id',$User_id)->pluck('user_id');
               
                DB::table('users')->where('id',$profile)->update([
                    'name'=>$request->first_name,
                    'phone'=>$request->phone,
                    'email'=>$request->email,
                    'password'=>$request->password,
                   
                   
                ]);
              return response()->json([
                "message" => "records updated successfully"
              ], 200);
              }
             else {
              return response()->json([
                "message" => "Profile not found"
              ], 404);
            }
          
    }

    public function Add_Fav_Wepppi(Request $request)
    {

        $favourite_wepppi = new favourite_wepppi;
        $favourite_wepppi->favourite_wepppis_id =  collect($request->favourite_wepppis_id)->implode(',');
    
        $favourite_wepppi->user_id = $request->user_id;
        $favourite_wepppi->save();
        
        return $favourite_wepppi; 

    }
    public function Add_Fav_Restaurant(Request $request)
    {
 
        $profile = favourite_restaurant::where('user_id',$request->user_id)->get();
 
        if(count($profile)>0){
        $favourite_restaurants_id	 =  collect($request->favourite_restaurants_id)->implode(','); 
        $user_id = $request->user_id;
        
               DB::update('update favourite_restaurants set favourite_restaurants_id=? where user_id=?',[$favourite_restaurants_id,$user_id]);
                   return "Update Successfully";
            }
            else{
              $favourite_restaurant = new favourite_restaurant;
          
              $favourite_restaurant->favourite_restaurants_id	 =  collect($request->favourite_restaurants_id)->implode(','); 
              $favourite_restaurant->user_id = $request->user_id;
              $favourite_restaurant->save();

              return $favourite_restaurant; 
            }
            
        }
          // 
//     }

 }
