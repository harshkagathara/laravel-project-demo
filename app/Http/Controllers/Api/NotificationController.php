<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use DB;
use Carbon\Carbon;
class NotificationController extends Controller
{
    public function Comment(Request $request){
        
        
        
        $Review = new Review;

        $Review -> reciever_id = $request->reciever_id ;
        $Review -> sender_id  = $request->sender_id ;
        $Review -> comment = $request->comment;
        $Review -> rating = $request->rating;
      
        $Review->save();

   
        return $Review;
      
    }
    

}
