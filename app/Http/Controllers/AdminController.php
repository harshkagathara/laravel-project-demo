<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Models\dish_categories;
use App\Models\restaurants;
use App\Models\dishes;
use Illuminate\Support\Facades\File;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.restaurant');

    }

    
   
   
    public function Show_live_Request(){
        $customers = DB::table('customers')->get();
       
        return view('admin/customers',compact('customers'));
    }

  
}
