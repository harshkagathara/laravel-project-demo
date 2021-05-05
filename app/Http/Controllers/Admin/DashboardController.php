<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function Show_Wepppi(Request $request){
       if ($request->ajax()) {
            $data =DB::table('customers')->latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn ='<a href="restaurant/edit/'. $row->id .'">
                        <button type="button" class="btn" style="background-color: #8141a1;">
                        View
                        </button>
                        </a>';
                     
                        return $btn;
                    })
                    ->addColumn('status', function ($artist) { 
                       
                        return ' <span class="badge badge-pill badge-primary">Verified</span>';
                    })
                    
                    ->rawColumns(['action','status'])->make(true);
        }

        return view('Admin/users/Weppies');
    }

    public function Show_Res_owner(Request $request){
      
        if ($request->ajax()) {
            $data =DB::table('users')->where('usertype','owner')->latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn ='<a href="restaurant/edit/'. $row->id .'">
                        <button type="button" class="btn" style="background-color: #8141a1;">
                        View
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

        return view('Admin/users/Owners');
    }

}
