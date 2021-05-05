<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use Carbon\Carbon;

class CouponsController extends Controller
{
    public function CouponList(Request $request)
    { 
        if ($request->ajax()) {
            $data =DB::table('coupons')->join('restaurants','restaurants.id','=','coupons.restaurant_id')
            ->select('restaurants.name as rname','coupons.*')->latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn ='<a href="coupons/edit/'. $row->id .'">
                        <button type="button" class="btn" style="background-color: #8141a1;">
                        <i class="fas fa-pencil-alt" style="color: white;"></i>
                        </button>
                        </a>
                        <a   href="coupons/delete/'. $row->id .'" onclick="return confirm(\'Are You Sure Want to Delete?\')">
                        <button type="button" class="btn" style="background-color: #8141a1;" >
                        <i class="fas fa-trash" style="color: white;"></i>
                        </button>
                      </a>
                      ';
                     
                        return $btn;
                    })


                    ->addColumn('active', function ($artist) { 
                       
                        return ' <span class="badge badge-pill " style="background:#7dd3f6">Active</span>';
                    })
                    
                    ->rawColumns(['action','active'])->make(true);
        }

        return view('Admin/Coupons/index');
    }

    public function createCouponList()
    {   
        $restaurants = DB::table('restaurants')->get();
       
        return view('admin/coupons/create',compact('restaurants'));
    }

    public function CreateCoupon(Request $request){
        $now = Carbon::now();
        DB::table('coupons')->insert([
            'name'=>$request->name,
            'description'=>$request->description,
            'coupon_code'=>$request->coupon_code,
            'discount_type'=>$request->discount_type,
            'discount'=>$request->discount,
            'expiry_date'=>$request->expiry_date,
            'max_usage'=>$request->max_usage,
            'active'=>$request->active,
            'restaurant_id'=>$request->restaurant_id,  
            'created_at'=>$now,
            'updated_at'=>$now
        ]);
        return redirect('/admin/coupons')->with('Restaurant_create','Inserted Successfully');
    }
    public function EditCoupons($id)
    {
        $coupons = DB::table('coupons')->where('id',$id)->first();
        $restaurants = DB::table('restaurants')->get();
        return view('admin/coupons/edit',compact('coupons','restaurants'));
    }
    public function UpdateCoupons(Request $request)
    {
        $now = Carbon::now();
        $coupons = DB::table('coupons')->where('id',$request->id)->update([
                'name'=>$request->name,
                'description'=>$request->description,
                'coupon_code'=>$request->coupon_code,
                'discount_type'=>$request->discount_type,
                'discount'=>$request->discount,
                'expiry_date'=>$request->expiry_date,
                'max_usage'=>$request->max_usage,
                'active'=>$request->active,
                'restaurant_id'=>$request->restaurant_id,
                
                'updated_at'=>$now
        ]);
       return redirect('/admin/coupons')->with('Edit_coupons','Edited Successfully');
    }
    public function DeleteCoupons($id)
    {  
        $coupons = DB::table('coupons')->where('id',$id)->delete();
        return redirect('/admin/coupons')->with('Edit_coupons','Delete Successfully');
    }
    
}
