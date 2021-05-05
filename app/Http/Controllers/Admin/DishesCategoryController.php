<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\File;
use DataTables;
use Carbon\Carbon;

use App\Models\dish_categories;

class DishesCategoryController extends Controller
{
    public function DishCategoryList(Request $request){
        
        if ($request->ajax()) {
            $data = DB::table('dish_categories')->latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn ='<a href="dish/category/edit/'. $row->id .'">
                        <button type="button" class="btn" style="background-color: #8141a1;">
                        <i class="fas fa-pencil-alt" style="color: white;"></i>
                        </button>
                        </a>
                        <a  href="dish/category/delete/'. $row->id .'" onclick="return confirm(\'Are You Sure Want to Delete?\')" >
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
        return view('Admin/Dishes_Category/index');
    }

    public function CreateDishCategoryList(){
        $restaurants = DB::table('restaurants')->get();
        return view('admin/Dishes_Category/create',compact('restaurants'));
    }

   
    public function CreateDishCategory(Request $request){
        $imgname="";
        $now = Carbon::now();
        if($request->hasFile('image')){   
        $imgname = $request->image->getClientOriginalName();
        $request->image->storeAs('',$imgname,'public');
        }
        DB::table('dish_categories')->insert([
            'name'=>$request->name,
            'restaurant_id'=>$request->restaurant_id,
            'active'=>$request->active,
            'image'=>$imgname,
            'created_at'=>$now,
            'updated_at'=>$now
        ]);
        return redirect('admin/dish_categories')->with('Restaurant_create','Inserted Successfully');
    }

    
    public function EditDishCategory($id)
    {
        $dish_categories = DB::table('dish_categories')->where('id',$id)->first();
        $restaurants = DB::table('restaurants')->get();
        return view('admin/Dishes_Category/edit',compact('dish_categories','restaurants'));
    }
    public function UpdateDishCategory(Request $request){
        // unlink(public_path('images').'/'.$dish_categories->image);
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
            'restaurant_id'=>$request->restaurant_id,
            'active'=>$request->active,
            'image'=>$imgname,
            'updated_at'=>$now
        ]);
        return redirect('/admin/dish_categories')->with('Msg_Dish_cate_Edit','Edited Successfully');
    }
    public function DeleteDishCategory($id)
    {        
        $dish_categories = dish_categories::find($id);
      
        File :: delete (public_path ('/upload/'.$dish_categories->image));
      
        $dish_categories = DB::table('dish_categories')->where('id',$id)->delete();
        return redirect('/admin/dish_categories')->with('Msg_Dish_cate_Edit','Dishes Deleted Successfully');
    }



}
