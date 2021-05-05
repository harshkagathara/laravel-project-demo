<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
    'middleware' => 'api',
], function ($router) {
    Route::post('/signup', [Api\VerificationController::class, 'SignUp']);
    Route::post('/login', [Api\VerificationController::class, 'LogIn']);
    Route::post('/find_restaurant_name', [Api\FindRestaurantController::class, 'FindRestaurant_name']);
    Route::post('/find_restaurant_location', [Api\FindRestaurantController::class, 'FindRestaurant_location']);
    Route::post('/find_restaurant_cuisine', [Api\FindRestaurantController::class, 'FindRestaurant_cuisine']);
    Route::post('/find_dish', [Api\FindRestaurantController::class, 'Find_dish']);
    Route::post('/find_wepppi_name', [Api\FindWepppiController::class, 'Find_Wepppi_name']);
    Route::post('/find_wepppi_location', [Api\FindWepppiController::class, 'Find_wepppi_location']);
    Route::get('/show_cuisine', [Api\FindWepppiController::class, 'show_cuisine']);
    Route::post('/find_wepppi_cuisine',[Api\FindWepppiController::class, 'Find_wepppi_cuisine']);
    Route::get('/find_top_five', [Api\RatingController::class, 'top_5_restaurant']);
    Route::post('/proflie', [Api\ProfileController::class, 'Profile']);
    Route::put('/proflie/{id}', [Api\ProfileController::class, 'EditProfile']);
    Route::post('/notification', [Api\NotificationController::class, 'Comment']);
    Route::post('/block', [Api\BlockController::class, 'Block']);
    Route::put('/unblock', [Api\BlockController::class, 'UnBlock']);
    Route::post('/review', [Api\ReviewController::class, 'Review']);
    Route::post('/review_list', [Api\ReviewController::class, 'Review_list']);
    Route::put('/edit_review/{id}', [Api\ReviewController::class, 'Edit_Review']);
    Route::delete('/delete_review/{id}', [Api\ReviewController::class, 'Delete_Review']);
    Route::post('/like_review', [Api\ReviewController::class, 'Like_Review']);
    Route::post('/dislike_review', [Api\ReviewController::class, 'DisLike_Review']);
    Route::post('/add_fav_wepppi', [Api\ProfileController::class, 'Add_Fav_Wepppi']);
    Route::post('/add_fav_res', [Api\ProfileController::class, 'Add_Fav_Restaurant']);
    Route::post('/check_voucher', [Api\PromationController::class, 'Check_Voucher']);
    Route::post('/add_live_request', [Api\OrderController::class, 'Add_Live_Request']);
    Route::put('/add_follow_up/{id}', [Api\OrderController::class, 'Add_Follow_up']);
    Route::post('/show_follow_up', [Api\OrderController::class, 'Show_Follow_up']);
    Route::post('/my_favourite_res', [Api\FindRestaurantController::class, 'My_Favourite_Res']);
    Route::post('/my_favourite_wepppi', [Api\FindWepppiController::class, 'My_Favourite_Wepppi']);
    Route::post('/wepppi_order', [Api\OrderController::class, 'Wepppi_Order']);
    Route::post('/show_follow_request', [Api\OrderController::class, 'Show_Follow_Request']);
    Route::post('/show_all_follow_up', [Api\OrderController::class, 'Show_All_Follow_up']);
    Route::post('/restaurant_menu_food', [Api\MenuController::class, 'Restaurant_Menu_Food']);
    Route::post('/restaurant_menu_drink', [Api\MenuController::class, 'Restaurant_Menu_Drink']);
    Route::post('/restaurant_menu_meal', [Api\MenuController::class, 'Restaurant_Menu_Meal']);
    Route::post('/view_dish', [Api\MenuController::class, 'View_Dish']);
    Route::post('/restautrant_review', [Api\MenuController::class, 'Restautrant_Review']);


    Route::put('/update_password/{id}', [Api\SettingController::class, 'Update_Password']);
    Route::put('/update_email/{id}', [Api\SettingController::class, 'Update_Email']);
    Route::put('/update_number/{id}', [Api\SettingController::class, 'Update_Number']);
    Route::put('/update_username/{id}', [Api\SettingController::class, 'Update_Username']);
    Route::post('/patner_with_us', [Api\SettingController::class, 'Patner_With_Us']);
});