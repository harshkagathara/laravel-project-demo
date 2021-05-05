<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use Carbon\Carbon;
class OrderController extends Controller
{
    public function Show_Follow_Ups(Request $request){
     
       
        
        if ($request->ajax()) {
            $data =DB::table('follow_ups')
            ->join('users','users.id','=','follow_ups.request_by')
            ->join('restaurants','restaurants.id','=','follow_ups.restaurant_id')
            ->select('users.*','follow_ups.*','restaurants.name as Rname')->get();
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

        return view('admin/Orders/index');
    }
    }



