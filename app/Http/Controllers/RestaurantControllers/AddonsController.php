<?php

namespace App\Http\Controllers\RestaurantControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use DataTables;
use Carbon\Carbon;

class AddonsController extends Controller
{
    public function AddonList(Request $request){
        $id = Session::get('resId');
        if ($request->ajax()) {
            $data = DB::table('addons')->
            join('addons_categories','addons_categories.id','=','addons.addons_category_id')-> 
            where('restaurant_id',$id)  
            ->select('addons.*','addons_categories.name as aname')->latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn ='<a href="addon/edit/'. $row->id .'">
                        <button type="button" class="btn" style="background-color: #8141a1;">
                        <i class="fas fa-pencil-alt" style="color: white;"></i>
                        </button>
                        </a>
                        <a  href="addon/delete/'. $row->id .'" onclick="return confirm(\'Are You Sure Want to Delete?\')">
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

        return view('restaurant-owner/addons/index');

    }

    public function createAddonList()
    {   
        $addons_categories = DB::table('addons_categories')->get();
        return view('restaurant-owner/addons/create',compact('addons_categories'));
    }

    public function CreateAddon(Request $request){
        $id = Session::get('resId');
        $now = Carbon::now();
        DB::table('addons')->insert([
            'name'=>$request->name,
            'restaurant_id'=>$id,
            'addons_category_id'=>$request->addons_category_id,
            'price'=>$request->price,
            'active'=>$request->active,    
            'created_at'=>$now,
            'updated_at'=>$now
        ]);
        return redirect('/restaurant-owner/addons')->with('Restaurant_create','Inserted Successfully');
    }

    public function EditAddons($id)
    {
        $addons = DB::table('addons')->where('id',$id)->first();
        $addons_categories = DB::table('addons_categories')->get();
        return view('restaurant-owner/addons/edit',compact('addons','addons_categories'));
    }
    public function UpdateAddons(Request $request)
    {
        $now = Carbon::now();
        $addons = DB::table('addons')->where('id',$request->id)->update([
            'name'=>$request->name,
            'addons_category_id'=>$request->addons_category_id,
            'price'=>$request->price,
            'active'=>$request->active, 
            'updated_at'=>$now
        ]);
        return redirect('/restaurant-owner/addons')->with('Msg_Addon_Edit','Edited Successfully');
    }
    public function DeleteAddons($id)
    { 
        $addons = DB::table('addons')->where('id',$id)->delete();
        return redirect('/restaurant-owner/addons')->with('Msg_Addon_Edit','Dishes Delete Successfully');
    }  
}
