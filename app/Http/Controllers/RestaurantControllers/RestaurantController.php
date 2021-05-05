<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\dish_categories;
use App\Models\restaurants;
use App\Models\dishes;
use App\Models\follow_up;
use Session;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class RestaurantController extends Controller
{

    // public function EditRestaurant($id)
    // {
    //     $restaurants = DB::table('restaurants')->where('id',$id)->first();
    //     $foodtypes = DB::table('foodtypes')->get();
    //     return view('admin/edit_restaurant',compact('restaurants','foodtypes'));
    // }
    public function UpdateRestaurant(Request $request)
    {
        $restaurants = restaurants::find($request->id);

        if($request->image != null)
        {
            session()->forget('reslogo');
            File :: delete (public_path ('/upload/'.$restaurants->image));
            $imgname = $request->image->getClientOriginalName();
            session()->put('reslogo',$imgname);
           $request->image->storeAs('',$imgname,'public');
        
        }
        else
        {
            session()->forget('reslogo');
            $imgname=$restaurants->image;
            session()->put('reslogo',$imgname);
           
        }
        $restaurants = DB::table('restaurants')->where('id',$request->id)->update([
            'image'=>$imgname,
            'name'=>$request->name,
            'description'=>$request->description,
            'foodtype_id'=>$request->foodtype_id,
            'user_id'=>$request->user_id,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'rating'=>$request->rating,
            'delivery_time'=>$request->delivery_time,
            'delivery_radius'=>$request->delivery_radius,
            'for_two'=>$request->for_two,
            'mon'=>$request->mon,
            'mon_opentime' =>$request->mon_opentime,
            'tue_opentime' =>$request->tue_opentime,
            'wed_opentime' =>$request->wed_opentime,
            'thu_opentime' =>$request->thu_opentime,
            'fri_opentime' =>$request->fri_opentime,
            'sat_opentime' =>$request->sat_opentime,
            'sun_opentime' =>$request->sun_opentime,
            'mon_closetime' =>$request->mon_closetime,
            'tue_closetime' =>$request->tue_closetime,
            'thu_closetime' =>$request->thu_closetime,
            'wed_closetime' =>$request->wed_closetime,
            'fri_closetime' =>$request->fri_closetime,
            'sat_closetime' =>$request->sat_closetime,
            'sun_closetime' =>$request->sun_closetime,
            'tue'=>$request->tue,
            'wed'=>$request->wed,
            'thu'=>$request->thu,
            'fri'=>$request->fri,
            'sat'=>$request->sat,
            'sun'=>$request->sun,
            'is_veg'=>$request->is_veg,
            'active'=>$request->active,
            
            'updated_at'=>$now
        ]);
        $restaurant_addresses = DB::table('restaurant_addresses')->where('restaurant_id',$request->id)->update([
            'address'=>$request->address,
            'pincode'=>$request->pincode,
            'city'=>$request->city,
            'lat'=>$request->lat,
            'long'=>$request->long,
            'updated_at'=>$now
        ]);

        session()->forget('resname');
        session()->put('resname',$request->name);
      
        return redirect('/restaurant-owner/dashboard')->with('Restaurant_edit','Edited Successfully');
    }




// location 
    // public function RestaurantList()
    // {
    //     $restaurants = DB::table('restaurants')->get();
    //     return view('admin/restaurants',compact('restaurants'));
    // }
    // public function RestaurantList1()
    // {
    //     $restaurants1 = DB::table('restaurants')->where('id','2')->get();
    //     print_r($restaurants1);
    //     return view('restaurant-owner.profile',compact('restaurants1'));
    // }
    public function EditProfile()
    {
        $id = Session::get('owner_id');
        $restaurants = DB::table('restaurants')->where('user_id',$id)->first();
        $resid = $restaurants->id;
        $restaurant_addresses = DB::table('restaurant_addresses')->where('restaurant_id',$resid)->first();
        $foodtypes = DB::table('foodtypes')->get();
        $users = DB::table('users')->get();
        return view('restaurant-owner.profile',compact('restaurants','foodtypes','restaurant_addresses','users'));
    }
    
}
