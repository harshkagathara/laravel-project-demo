<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use DB;
use App\Models\likes;
use App\Models\dislikes;

class ReviewController extends Controller
{
    
    public function Review(Request $request)
    {
        $Review = new Review;

        $Review -> reciever_id = $request->reciever_id ;
        $Review -> sender_id  = $request->sender_id ;
        $Review -> rating =  $request->rating ;
        $Review -> comment =  $request->comment ;
        $Review->save();
        
        return $Review;
    }
    public function Review_list(Request $request)
    {  
            $sender_id = $request->sender_id ;
            $profile = Review::where('sender_id',$sender_id)->get();
            if(count($profile)>0){
                return $profile;
            }
            else {
                $msg = "No profile Find";
                return  $msg;
            }
        
    }
    public function Edit_Review(Request $request,$id)
    {  
             if (Review::where('id', $id)->exists()) {
                    $Review = Review::find($id);
                
                    $Review -> rating =  $request->rating ;
                    $Review -> comment =  $request->comment ;
                    $Review->save();

                    return $Review;
        }
        else {
            return response()->json([
              "message" => "Id not found"
            ], 404);
          }

        
    }
    public function Delete_Review ($id) {
         $profile = Review::where('sender_id',$id)->get();
        if(count($profile)>0){
            DB::delete('delete from reviews where sender_id = ?',[$id]);
            return "Deleted Successfully";
        }
        else{
            return "Data Not Found";
        }
    }

    public function Like_Review (Request $request) {

        $profile = likes::where('review_id',$request->review_id)->pluck('likes');
        $profile1 = dislikes::where('review_id',$request->review_id)->pluck('dislikes');
        if(count($profile)>0){
            if($profile[0]=="0"){
                $count  = likes::where('review_id',$request->review_id)->get();
                DB::update('update likes set likes=1 where review_id=?',[$request->review_id]);
                   return "Update Successfully 1 ";
            }
            else{
                $count  = likes::where('review_id',$request->review_id)->get();
                DB::update('update likes set likes=0 where review_id=?',[$request->review_id]);
                   return "Update Successfully 0";
            }
            
        }
        elseif(count($profile1)>0){
            DB::delete('delete from dislike where review_id = ?',[$request->review_id]);
            
        $likes = new likes;
        $likes -> likes = '1';
        $likes -> sender_id = $request->sender_id ;
        $likes -> review_id = $request->review_id ;
        $likes->save();
        
        return $likes;

        }
        else{

        $likes = new likes;
        $likes -> likes = '1';
        $likes -> sender_id = $request->sender_id ;
        $likes -> review_id = $request->review_id ;
        $likes->save();
        
        return $likes;
        }
      
   }
   public function DisLike_Review (Request $request) {
        
    $profile1 = likes::where('review_id',$request->review_id)->pluck('likes');
    $profile = dislikes::where('review_id',$request->review_id)->pluck('dislikes');
    if(count($profile)>0){
        if($profile[0]=="0"){
            $count  = dislikes::where('review_id',$request->review_id)->get();
            DB::update('update dislikes set dislikes=1 where review_id=?',[$request->review_id]);
               return "Update Successfully 1 ";
        }
        else{
            $count  = dislikes::where('review_id',$request->review_id)->get();
            DB::update('update dislikes set dislikes=0 where review_id=?',[$request->review_id]);
               return "Update Successfully 0";
        }
        
    }
    elseif(count($profile1)>0){
        DB::delete('delete from likes where review_id = ?',[$request->review_id]);
        
    $likes = new dislikes;
    $likes -> dislikes = '1';
    $likes -> sender_id = $request->sender_id ;
    $likes -> review_id = $request->review_id ;
    $likes->save();
    
    return $likes;

    }
    else{

    $likes = new dislikes;
    $likes -> dislikes = '1';
    $likes -> sender_id = $request->sender_id ;
    $likes -> review_id = $request->review_id ;
    $likes->save();
    
    return $likes;
    }
   
}
}
