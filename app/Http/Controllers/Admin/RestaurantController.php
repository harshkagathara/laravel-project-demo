<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\restaurants;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use DataTables;

class RestaurantController extends Controller
{
    

    public function createRestaurantList()
    {   
        $foodtypes = DB::table('foodtypes')->get();
        $users = DB::table('users')
        ->where('usertype','owner')
        ->get();
        return view('admin/Restaurants/Create',compact('foodtypes','users'));
    }

    public function CreateRestaurant(Request $request)
    {
        $imgname="";
        $now = Carbon::now();
        
            if($request->hasFile('image')){
                $imgname = $request->image->getClientOriginalName();
                $request->image->storeAs('',$imgname,'public');
            }
                DB::table('restaurants')->insert([
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
                    'created_at'=>$now,
                    'updated_at'=>$now
                ]);
                $restaurants = DB::table('restaurants')->latest('id')->first();
                $lastid=$restaurants->id;
        
                DB::table('restaurant_addresses')->insert([ 
                    'address'=>$request->address,
                    'name'=>$request->name,
                    'pincode'=>$request->pincode,
                    'city'=>$request->city,
                    'lat'=>$request->lat,
                    'long'=>$request->long,
                    'restaurant_id'=>$lastid,
                    'created_at'=>$now,
                    'updated_at'=>$now
                ]);
                
                return redirect('/admin/restaurants')->with('Restaurant_create','Inserted Successfully');
    }
   
    
    public function EditRestaurant($id)
    {
        $restaurants = DB::table('restaurants')->where('id',$id)->first();
        $foodtypes = DB::table('foodtypes')->get();
        $users = DB::table('users')->get();
        $restaurant_addresses = DB::table('restaurant_addresses')->where('restaurant_id',$id)->first();
    
        return view('admin/Restaurants/Edit',compact('restaurants','foodtypes','restaurant_addresses','users'));
    }

    public function UpdateRestaurant(Request $request)
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
        
        return redirect('/admin/restaurants')->with('Msg_Restaurant_Edit','Edited Successfully');
    }
    
    public function DeleteRestaurants($id)
    {   
        $restaurants = restaurants::find($id);
        File :: delete (public_path ('/upload/'.$restaurants->image));
        $restaurants = DB::table('restaurants')->where('id',$id)->delete();
        $restaurant_addresses = DB::table('restaurant_addresses')->where('restaurant_id',$id)->delete();

        return redirect('/admin/restaurants')->with('Msg_Restaurant_Edit','Deleted Successfully');
    }

    public function RestaurantList(Request $request)
    {
        
        if ($request->ajax()) {
            $data =DB::table('restaurants')
            ->join('users','users.id','=','restaurants.user_id')
            ->select('users.name as uname','restaurants.*')->latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn ='<a href="restaurant/edit/'. $row->id .'">
                        <button type="button" class="btn" style="background-color: #8141a1;">
                        <i class="fas fa-pencil-alt" style="color: white;"></i>
                        </button>
                        </a>
                        <a  href="restaurant/delete/'. $row->id .'" onclick="return confirm(\'Are You Sure Want to Delete?\')">
                        <button type="button" class="btn" style="background-color: #8141a1;" >
                        <i class="fas fa-trash" style="color: white;"></i>
                        </button>
                      </a>
                      ';
                     
                        return $btn;
                    })

                   ->addColumn('image', function ($artist) { 
                        $url= asset('upload/'.$artist->image);
                        return '<img src="'.$url.'" border="0" width="60" height="50" class="img-rounded" align="center" />';
                    })

                    ->addColumn('active', function ($artist) { 
                       
                        return ' <span class="badge badge-pill " style="background:#7dd3f6">Active</span>';
                    })
                    
                    ->rawColumns(['action','image','active'])->make(true);
        }

        return view('Admin/Restaurants/index');
    }
}
