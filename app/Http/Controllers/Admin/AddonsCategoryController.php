<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use Carbon\Carbon;
class AddonsCategoryController extends Controller
{

    public function AddonCategoryList(Request $request){
       
        if ($request->ajax()) {
            $data =DB::table('addons_categories')->latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn ='<a href="addon_category/edit/'. $row->id .'">
                        <button type="button" class="btn" style="background-color: #8141a1;">
                        <i class="fas fa-pencil-alt" style="color: white;"></i>
                        </button>
                        </a>
                        <a href="addon_category/delete/'. $row->id .'" onclick="return confirm(\'Are You Sure Want to Delete?\')">
                        <button type="button" class="btn" style="background-color: #8141a1;" >
                        <i class="fas fa-trash" style="color: white;"></i>
                        </button>
                      </a>
                      ';
                     
                        return $btn;
                    })
                    ->rawColumns(['action'])->make(true);
        }

        return view('Admin/Addon_Category/index');
    }
    public function create(){
        
        return view('admin/addon_category/create');
    }

    public function CreateAddonCategory(Request $request){
        $now = Carbon::now();
        DB::table('addons_categories')->insert([
            'name'=>$request->name,
            'type'=>$request->type, 
            'created_at'=>$now,
            'updated_at'=>$now
        ]);
    
        return redirect('/admin/addon_category')->with('Restaurant_create','Inserted Successfully');
    }
   
    public function EditAddonsCategory($id)
    {
        $addons_categories = DB::table('addons_categories')->where('id',$id)->first();
        
        return view('admin/addon_category/edit',compact('addons_categories'));
    }
    public function UpdateCategory(Request $request)
    {
        $now = Carbon::now();
        $addons_categories = DB::table('addons_categories')->where('id',$request->id)->update([ 
            'name'=>$request->name,
            'type'=>$request->type, 
            'created_at'=>$now,
            
        ]);
        return redirect('/admin/addon_Categories')->with('Msg_Addon_cate_Edit','Edited Successfully');
    }
    public function DeleteCategory($id)
    { 
        $addons_categories = DB::table('addons_categories')->where('id',$id)->delete();
        return redirect('/admin/addon_Categories')->with('Msg_Addon_cate_Edit','Delete Successfully');
    }
}
