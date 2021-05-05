<?php

namespace App\Http\Controllers\RestaurantControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use App\Models\dish_categories;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use DataTables;


class DishesCategoryController extends Controller
{
    public function DishCategoryList(Request $request){
        $id = Session::get('resId');

        if ($request->ajax()) {
            $data =DB::table('dish_categories')->where('restaurant_id',$id)->latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn ='<a href="category/edit/'. $row->id .'">
                        <button type="button" class="btn" style="background-color: #8141a1;">
                        <i class="fas fa-pencil-alt" style="color: white;"></i>
                        </button>
                        </a>
                        <a  href="category/delete/'. $row->id .'" onclick="return confirm(\'Are You Sure Want to Delete?\')">
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

        return view('restaurant-owner/Dish_Category/index');


    }

    public function CreateDishCategory(Request $request){
        $imgname="";
        $now = Carbon::now();
        $id = Session::get('resId');
        if($request->hasFile('image')){   
        $imgname = $request->image->getClientOriginalName();
        $request->image->storeAs('',$imgname,'public');
        }
        DB::table('dish_categories')->insert([
            'name'=>$request->name,
            'active'=>$request->active,
            'restaurant_id'=>$id,
            'image'=>$imgname,
            'created_at'=>$now,
            'updated_at'=>$now
        ]);
        return redirect('/restaurant-owner/Dish_Category/index')->with('Restaurant_create','Inserted Successfully');
    }
  
    public function EditDishCategory($id)
    {
        $dish_categories = DB::table('dish_categories')->where('id',$id)->first();
        
        return view('restaurant-owner/Dish_Category/edit',compact('dish_categories'));
    }
    public function DishCategoryList1(){
        $restaurants = DB::table('restaurants')->get();
        return view('admin/Dish_Category/create',compact('restaurants'));
    }
    public function UpdateDishCategory(Request $request){
        $dish_categories = dish_categories::find($request->id);
        $now = Carbon::now();
        if($request->image != null)
        {
            
            File :: delete (public_path ('/upload/'.$dish_categories->image));
            $imgname = $request->image->getClientOriginalName();
            $request->image->storeAs('',$imgname,'public');
        }
        else
        {
            $imgname=$dish_categories->image;
        }
        $dish_categories = DB::table('dish_categories')->where('id',$request->id)->update([ 
            'name'=>$request->name,
            'active'=>$request->active,
            'image'=>$imgname,
          
            'updated_at'=>$now
        ]);
        return redirect('/restaurant-owner/dish/categories')->with('Msg_dish_cate_Edit','Edited Successfully');
    }
    public function DeleteDishCategory($id)
    {        
        $dish_categories = dish_categories::find($id);
       
        File :: delete (public_path ('/upload/'.$dish_categories->image));
        $dish_categories = DB::table('dish_categories')->where('id',$id)->delete();
        return redirect('/restaurant-owner/dish/categories')->with('Msg_dish_cate_Edit', 'Delete Successfully');
    }
}
