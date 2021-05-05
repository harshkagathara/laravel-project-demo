<?php

namespace App\Http\Controllers\RestaurantControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class LocationController extends Controller
{
    
    public function CreateLocation(Request $request)
    {
        $now = Carbon::now();
        DB::table('restaurant_addresses')->insert([ 
            'address'=>$request->address,
            'pincode'=>$request->pincode,
            'city'=>$request->city,
            'lat'=>$request->lat,
            'long'=>$request->long,
          
        ]);
        return redirect('/admin/restaurants')->with('Restaurant_create','Inserted Successfully');
    }
    public function EditLocation($id)
    {
        $restaurants = DB::table('restaurants')->where('id',$id)->first();
        $foodtypes = DB::table('foodtypes')->get();
        return view('admin/edit_restaurant',compact('restaurants','foodtypes'));
    }
    public function UpdateLocation(Request $request)
    {
        $restaurants = restaurants::find($request->id);
        $now = Carbon::now();
        if($request->image != null)
        {
           
            File :: delete (public_path ('/upload/'.$restaurants->image));
            $imgname = $request->image->getClientOriginalName();
            $request->image->storeAs('',$imgname,'public');
        }
        else
        {
            $imgname=$restaurants->image;
        }
        $restaurants = DB::table('restaurants')->where('id',$request->id)->update([
            'image'=>$imgname,
            'name'=>$request->name,
            'description'=>$request->description,
            'foodtype_id'=>$request->foodtype_id,
            // 'user_id'=>$request->user_id,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'rating'=>$request->rating,
            'delivery_time'=>$request->delivery_time,
            'delivery_radius'=>$request->delivery_radius,
            'for_two'=>$request->for_two,
            'opentime'=>$request->opentime,
            'closetime'=>$request->closetime,
            // 'commission_rate'=>$request->commission_rate,
            // 'license_code'=>$request->license_code,
            // 'restaurant_charges'=>$request->restaurant_charges,
            'is_veg'=>$request->is_veg,
            // 'featured'=>$request->featured,
            'active'=>$request->active,
            
        ]);
        $restaurant_addresses = DB::table('restaurant_addresses')->where('restaurant_id',$request->id)->update([
            'address'=>$request->address,
            'pincode'=>$request->pincode,
            'city'=>$request->city,
            'lat'=>$request->lat,
            'long'=>$request->long,
        ]);
        
        return redirect('/restaurant-owner/restaurants')->with('Restaurant_edit','Edited Successfully');
    }
    public function DeleteLocation($id)
    {   
        $restaurants = restaurants::find($id);
       
        File :: delete (public_path ('/upload/'.$restaurants->image));
        $restaurants = DB::table('restaurants')->where('id',$id)->delete();
        $restaurant_addresses = DB::table('restaurant_addresses')->where('restaurant_id',$id)->delete();
        return redirect('/admin/restaurants')->with('restaurant_delete','Post Delete Successfully');
    }
  
}
