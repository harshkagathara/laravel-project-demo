<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\customers;
use App\Models\user;
use App\Models\patnerwithus;
use Illuminate\Support\Collection;
class SettingController extends Controller
{

    public function Update_Password(Request $request,$id)
    {
        
        if (user::where('id', $id)->exists()) {
            $user = user::where('id', $id)->get();
                foreach($user as $cust)
                    {
                        $Database_pass = $cust->password;
                        $old_password = $request->old_password;
                        if($Database_pass ==  $old_password)
                           {
                               if($request->new_password == $request->re_new_password){
                                    $CuSt = user::find($id);
                                    $CuSt->password = $request->new_password;
                                    $CuSt->save();
            DB::update('update customers set password=? where user_id=?',[$request->new_password,$id]);

                                    $msg = "password updated successfully ";
                                    return  $msg;
                               }
                               else{
                                    $msg = "password is not matched";
                                    return  $msg;
                               }
                            }
                           else{
                            $msg = "Old Password Is Not Match";
                            return  $msg;
                           }
                    }
        }
        else{
            $msg = " Id  No  Found";
            return  $msg;
        }
    }

    public function Update_Email(Request $request,$id)
    {
        if (user::where('id', $id)->exists()) {
            
            $All_users = user::get();
            $user = user::find($id);

                $new_email = $request->new_email;

                foreach($All_users as $cust)
                {
                   if($new_email == $cust->email)
                    {
                        $msg = "Email is Already in use";
                        return $msg;
                    }
                }

                $user->email = $request->new_email;
                $user->save();
                DB::update('update customers set email=? where user_id=?',[$request->new_email,$id]);
                $msg = "Email updated successfully ";
                return  $msg;
        }
        else{
            $msg = " Id  No  Found";
            return  $msg;
        }
    }

    public function Update_Number(Request $request,$id)
    {
        if (user::where('id', $id)->exists()) {
            $customers = user::find($id);
            $customers->phone = $request->phone_number;
            $customers->save();
            DB::update('update customers set phone=? where user_id=?',[$request->phone_number,$id]);
            $msg = "Number updated successfully ";
            return  $msg;
        }
        else{
            $msg = " Id  No  Found";
            return  $msg;
        }
    }

    public function Update_Username(Request $request,$id)
    {
        if (customers::where('id', $id)->exists()) {
            $customers = customers::get();
                foreach($customers as $cust)
                    {
                        $Database_username = $cust->username;
                        $new_username = $request->new_username;
                        if($Database_username == $new_username)
                        {
                            $msg = "Email is Already in use";
                            return $msg;
                        }
                        else{
                            $CuSt = customers::find($id);
                            $CuSt->username = $request->new_username;
                            $CuSt->save();
                            $msg = "Email updated successfully ";
                            return  $msg;
                        }
                    }
        }
        else{
            $msg = " Id  No  Found";
            return  $msg;
        }
    }

    public function Patner_With_Us(Request $request)
    {
        $patnerwithus = new patnerwithus;

        $patnerwithus->name = $request->name;
        $patnerwithus->address=$request->address;
        $patnerwithus->first_name=$request->first_name;
        $patnerwithus->sur_name = $request->sur_name;  
        $patnerwithus->phone = $request->phone;
        $patnerwithus->res_phone=$request->res_phone;
        $patnerwithus->email=$request->email;
        $patnerwithus->no_of_loc=$request->no_of_loc; 
        $patnerwithus->type_of_cuisine=$request->type_of_cuisine; 
        $patnerwithus->user_id = $request->user_id;
        $patnerwithus->message = $request->message; 
        $patnerwithus->save();

        return $patnerwithus;
    }
}
