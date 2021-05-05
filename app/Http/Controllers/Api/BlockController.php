<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\block;
use DB;

class BlockController extends Controller
{
    public function Block(Request $request){
        $block = new block;

        $block -> reciever_id = $request->reciever_id ;
        $block -> sender_id  = $request->sender_id ;
        $block -> status = '1';
        $block->save();
        
        return $block;
      
    }
    public function UnBlock(Request $request){
        $block = new block;

        $block -> reciever_id = $request->reciever_id ;
        $block -> sender_id  = $request->sender_id ;
        $block -> status = '0';
        $block->save();
        
        return $block;
      
    }
}
