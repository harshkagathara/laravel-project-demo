<?php

namespace App\Http\Controllers\RestaurantControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use App\Models\dishes;
use Carbon\Carbon;

use Illuminate\Support\Facades\File;

class DishesController extends Controller
{
    public function DishList()
    {
       
        $id = Session::get('resId'); 
        $dishes_food = DB::table('dishes')->where('type','food')->where('restaurant_id',$id)->get();
        $dishes_drink = DB::table('dishes')->where('type','drink')->where('restaurant_id',$id)->get();
        $dishes_meal = DB::table('dishes')->where('type','meal')->where('restaurant_id',$id)->get();
        return view('restaurant-owner/dishes/index',compact('dishes_food','dishes_drink','dishes_meal'));
    }

    public function createDishList()
    {   
        $id = Session::get('resId');
        $addons = DB::table('addons')->where('restaurant_id',$id)->get();
        $dish_categories = DB::table('dish_categories')->where('restaurant_id',$id)->get();
    
        return view('restaurant-owner/dishes/create',compact('dish_categories','addons'));
    }

    public function CreateDish(Request $request)
    {
        $id = Session::get('resId');
        $now = Carbon::now();
        $imgname="";
        if($request->hasFile('image')){   
        $imgname = $request->image->getClientOriginalName();
        $request->image->storeAs('',$imgname,'public');
        }
        DB::table('dishes')->insert([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$imgname,
            'price'=>$request->price,
            'discount_price'=>$request->discount_price,
            'calories'=>$request->calories,
            'protien'=>$request->protien,
            'type'=>$request->type,
            'sodium'=>$request->sodium,
            'cholesterol'=>$request->cholesterol,
            'is_veg'=>$request->is_veg,
            'glu_free'=>$request->glu_free, 
            'active'=>$request->active, 
            'restaurant_id'=>$id,
            'dish_category_id'=>$request->dish_category_id,
            'addons_category_id'=>$request->addons_category_id,
            'created_at'=>$now,
            'updated_at'=>$now
        ]);
        return redirect('/restaurant-owner/dishes')->with('Restaurant_create','Inserted Successfully');
    }

    public function EditDish($id)
    {
        $dishes = DB::table('dishes')->where('id',$id)->first();
        $restaurants = DB::table('restaurants')->get();
        $addonscategories = DB::table('addons_categories')->get();
        $dish_categories = DB::table('dish_categories')->get();
        return view('restaurant-owner/dishes/edit',compact('dishes','restaurants','addonscategories','dish_categories'));
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
        return redirect('/restaurant-owner/dishes')->with('Restaurant_edit','Edited Successfully');
    }
    public function DeleteDish($id)
    {
        $dishes = dishes::find($id);
      
        File :: delete (public_path ('/upload/'.$dishes->image));
        $dishes = DB::table('dishes')->where('id',$id)->delete();
        return redirect('/restaurant-owner/dishes')->with('dishes_delete','Dishes Delete Successfully');
    } 
}
