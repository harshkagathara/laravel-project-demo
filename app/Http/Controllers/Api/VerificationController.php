<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customers;
use DB;
use Carbon\Carbon;
class VerificationController extends Controller
{
    public function SignUp(Request $request){
        $email = $request->email;
        $username = $request->username;
        $txtCheck_by_email=  DB::table('customers')->where('email',$email)->get();
        $txtCheck_by_username=  DB::table('customers')->where('username',$username)->get();

        if(count($txtCheck_by_email)>0){
            $msg = "Email Already Exists";
            return  $msg;
        }
        else if(count($txtCheck_by_username)>0){
            $msg = "Username Already Taken";
            return  $msg;
        }
        else{
            DB::table('users')->insert([
                'name'=>$request->first_name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'password'=>$request->password,
                'usertype'=>'customer',
               
            ]);
            $users = DB::table('users')->latest('id')->first();
            $lastid=$users->id;
            $customers = new customers;
    
            $customers -> first_name = $request->first_name;
            $customers -> last_name = $request->last_name;
            $customers -> email = $request->email;
            $customers -> education = $request->education;
            $customers -> profession = $request->profession;
            $customers -> dob = $request->dob;
            $customers -> gender=$request->gender;
            $customers -> phone = $request->phone;
            $customers -> username = $request->username;
            $customers -> password =$request->password;
            $customers -> user_id  =$lastid;   
            $customers -> joined_date = Carbon::now()->format('Y-m-d');
            $customers->save();
    
       
            return $customers;   
       
    }
       
    }
    
    public function LogIn(Request $request){
        
        $email=$request->email;
        $password=$request->password;   
        $txtCheck_User=  DB::table('customers')->where('email',$email)->where('password',$password)->get();
    
        if(count($txtCheck_User)>0){
            return $txtCheck_User;
        }
        else{
        $msg = "Please Check Your Credentials";
            return  $msg;
    }
  }
}
