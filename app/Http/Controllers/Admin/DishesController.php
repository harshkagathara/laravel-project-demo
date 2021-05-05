<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\dishes;
use DataTables;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class DishesController extends Controller
{
    public function DishList(Request $request)
    {
  
     
        
        if ($request->ajax()) {
            $data =DB::table('dishes')->
            join('restaurants','restaurants.id','=','dishes.restaurant_id')->
            join('dish_categories','dish_categories.id','=','dishes.dish_category_id')
            ->select('dishes.*','restaurants.name as rname','dish_categories.name as dname')->latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn ='<a href="dish/edit/'. $row->id .'">
                        <button type="button" class="btn" style="background-color: #8141a1;">
                        <i class="fas fa-pencil-alt" style="color: white;"></i>
                        </button>
                        </a>
                        <a  href="dish/delete/'. $row->id .'" onclick="return confirm(\'Are You Sure Want to Delete?\')">
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

        return view('Admin/Dishes/index');
    }

    public function createDishList()
    {   
        $restaurants = DB::table('restaurants')->get();
        $addonscategories = DB::table('addons_categories')->get();
        $dish_categories = DB::table('dish_categories')->get();
        return view('admin/Dishes/Create',compact('restaurants','addonscategories','dish_categories'));
    }
  

    public function CreateDish(Request $request)
    {
        $imgname="";
        $now = Carbon::now();
        if($request->hasFile('image')){   
        $imgname = $request->image->getClientOriginalName();
       $request->image->storeAs('',$imgname,'public');
        }
        DB::table('dishes')->insert([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$imgname,
            'price'=>$request->price,
            'type'=>$request->type,
            'discount_price'=>$request->discount_price,
            'calories'=>$request->calories,
            'protien'=>$request->protien,
            'sodium'=>$request->sodium,
            'cholesterol'=>$request->cholesterol,
            'is_veg'=>$request->is_veg,
            'glu_free'=>$request->glu_free, 
            'active'=>$request->active, 
            'restaurant_id'=>$request->restaurant_id,
            'dish_category_id'=>$request->dish_category_id,
            'addons_category_id'=>$request->addons_category_id,
            'created_at'=>$now,
            'updated_at'=>$now
        ]);
        return redirect('admin/dishes')->with('Restaurant_create','Inserted Successfully');
    }
   
    public function EditDish($id)
    {
        $dishes = DB::table('dishes')->where('id',$id)->first();
        $restaurants = DB::table('restaurants')->get();
        $addonscategories = DB::table('addons_categories')->get();
        $dish_categories = DB::table('dish_categories')->get();
        return view('admin/dishes/edit',compact('dishes','restaurants','addonscategories','dish_categories'));
    }
    public function UpdateDish(Request $request)
    {
        $dishes = dishes::find($request->id);
        $now = Carbon::now();
        if($request->image != null)
        {
            File :: delete (public_path ('/upload/'.$dishes->image));
            $imgname = $request->image->getClientOriginalName();
           $request->image->storeAs('',$imgname,'public');
        }
        else
        {
            $imgname=$dishes->image;
        }
        $dishes = DB::table('dishes')->where('id',$request->id)->update([ 
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$imgname,
            'price'=>$request->price,
            'discount_price'=>$request->discount_price,
            'calories'=>$request->calories,
            'protien'=>$request->protien,
            'sodium'=>$request->sodium,
            'type'=>$request->type,
            'cholesterol'=>$request->cholesterol,
            'is_veg'=>$request->is_veg,
            'glu_free'=>$request->glu_free, 
            'active'=>$request->active, 
            'restaurant_id'=>$request->restaurant_id,
            'dish_category_id'=>$request->dish_category_id,
            'addons_category_id'=>$request->addons_category_id,
            'updated_at'=>$now
        ]);
        return redirect('/admin/dishes')->with('Msg_Dish_Edit','Edited Successfully');
    }
    public function DeleteDish($id)
    {
        $dishes = dishes::find($id);
        File :: delete (public_path ('/upload/'.$dishes->image));
        $dishes = DB::table('dishes')->where('id',$id)->delete();
        return redirect('/admin/dishes')->with('Msg_Dish_Edit','Dishes Delete Successfully');
    }  
}
