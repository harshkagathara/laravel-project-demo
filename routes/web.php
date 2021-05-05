<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\RestaurantControllers;
use App\Http\Controllers\Login_con;


Route::get('/', function () {
    return view('auth.login');
});


// Route::get('/create_account',[Login_con::class,'index'])->name('create_account');


// Route::post('/create',[Login_con::class,'create']);


Route::get('/login',[Login_con::class,'login'])->name('auth.login');

Route::get('/forgot_password',[Login_con::class,'forgot_password'])->name('forgot.password');

Route::post('/create_forgot_pass',[Login_con::class,'create_forgot_pass']);

Route::get('/partnerwithus',[Login_con::class,'patnerwithus'])->name('auth.patnerwithus');

Route::post('/create_patnerwithus',[Login_con::class,'create_patnerwithus']);

Route::post('/check',[Login_con::class,'check_user']);


Route::get('/welcome',[Login_con::class,'protect']);


Route::get('/logout',[Login_con::class,'logout'], function (){
    return view('auth.login');
})->name('logout-res');


Route::group(['prefix' => 'admin'], function() {

        Route::get('/dashboard', function (){ return view('admin.index');})->name('admin.dashboard');

        Route::get('/restaurants',[Admin\RestaurantController::class,'RestaurantList'])->name('admin.restaurants');
        Route::get('/restaurant/create',[Admin\RestaurantController::class,'createRestaurantList'])->name('admin.restaurant.create');
        Route::post('/restaurant/create',[Admin\RestaurantController::class,'CreateRestaurant'])->name('save.restaurant');
        Route::get('/restaurant/edit/{id}',[Admin\RestaurantController::class,'EditRestaurant'])->name('edit.restaurant');
        Route::post('/restaurant/edit',[Admin\RestaurantController::class,'UpdateRestaurant'])->name('update.restaurant');
        Route::get('/restaurant/delete/{id}', [Admin\RestaurantController::class,'DeleteRestaurants'])->name('delete.restaurant');
        

        Route::get('/orders',[Admin\OrderController::class,'Show_Follow_Ups'])->name('admin.orders');

        Route::get('/dishes',[Admin\DishesController::class,'DishList'])->name('admin.dishes');
        Route::get('/dish/create',[Admin\DishesController::class,'createDishList'])->name('admin.dish.create');
        Route::post('/dish/create',[Admin\DishesController::class,'CreateDish'])->name('save.dish');
        Route::get('/dish/edit/{id}',[Admin\DishesController::class,'EditDish'])->name('edit.dish');
        Route::post('/dish/edit',[Admin\DishesController::class,'UpdateDish'])->name('update.dish');
        Route::get('/dish/delete/{id}', [Admin\DishesController::class,'DeleteDish'])->name('delete.dish');
    
        Route::get('/dish_categories',[Admin\DishesCategoryController::class,'DishCategoryList'])->name('admin.dish_categories');
        Route::get('/dish_category/create',[Admin\DishesCategoryController::class,'CreateDishCategoryList'])->name('admin.dish_category.create');
        Route::post('/dish_category/create',[Admin\DishesCategoryController::class,'CreateDishCategory'])->name('save.dishcategory');
        Route::get('/dish/category/edit/{id}',[Admin\DishesCategoryController::class,'EditDishCategory'])->name('edit.dishcategory');
        Route::post('/dish/category/edit',[Admin\DishesCategoryController::class,'UpdateDishCategory'])->name('update.dishcategory');
        Route::get('/dish/category/delete/{id}', [Admin\DishesCategoryController::class,'DeleteDishCategory'])->name('delete.dishcategory');

        Route::get('/addons',[Admin\AddonsController::class,'AddonList'])->name('admin.addons');
        Route::get('/addon/create', [Admin\AddonsController::class,'createAddonList'])->name('admin.addons.create');
        Route::post('/addon/create',[Admin\AddonsController::class,'CreateAddon'])->name('save.addon');
        Route::get('/addons/edit/{id}',[Admin\AddonsController::class,'EditAddons'])->name('edit.addons');
        Route::post('/addons/edit',[Admin\AddonsController::class,'UpdateAddons'])->name('update.addons');
        Route::get('/addons/delete/{id}', [Admin\AddonsController::class,'DeleteAddons'])->name('delete.addons');

        Route::get('/addon_Categories',[Admin\AddonsCategoryController::class,'AddonCategoryList'])->name('admin.addoncategory');
        Route::get('/addon_category/create',[Admin\AddonsCategoryController::class,'create'])->name('admin.addon_category.create');
        Route::post('/addon_category/create',[Admin\AddonsCategoryController::class,'CreateAddonCategory'])->name('save.addoncategory');
        Route::get('/addon_category/edit/{id}',[Admin\AddonsCategoryController::class,'EditAddonsCategory'])->name('edit.category');
        Route::post('/addon_category/edit',[Admin\AddonsCategoryController::class,'UpdateCategory'])->name('update.category');
        Route::get('/addon_category/delete/{id}', [Admin\AddonsCategoryController::class,'DeleteCategory'])->name('delete.category');

        
        Route::get('/coupons', [Admin\CouponsController::class,'CouponList'])->name('admin.coupons');
        Route::get('/coupon/create', [Admin\CouponsController::class,'createCouponList'])->name('admin.coupon.create');
        Route::post('/coupon/create',[Admin\CouponsController::class,'CreateCoupon'])->name('save.coupon');
        Route::get('/coupons/edit/{id}',[Admin\CouponsController::class,'EditCoupons'])->name('edit.coupons');
        Route::post('/coupons/edit',[Admin\CouponsController::class,'UpdateCoupons'])->name('update.coupons');
        Route::get('/coupons/delete/{id}', [Admin\CouponsController::class,'DeleteCoupons'])->name('delete.coupons');

        Route::get('/customers',[Admin\DashboardController::class,'Show_Wepppi'])->name('admin.customers');
    
        Route::get('/owners',[Admin\DashboardController::class,'Show_Res_owner'])->name('admin.owners');

    });

    Route::get('restaurant-owner/order_details', function (){
        return view('restaurant-owner.order_details');
    })->name('restaurant-owner.order_details');



Route::group(['prefix' => 'restaurant-owner'], function() {
   
    Route::get('/dashboard',[RestaurantControllers\DashboardController::class,'DishListDash'])->name('restaurant-owner.dashboard');
    

    Route::get('/live-request' ,[RestaurantControllers\OrderController::class,'Show_live_Request'])->name('restaurant-owner.live-orders');
    Route::get('/orders',[RestaurantControllers\OrderController::class,'Show_Follow_Ups'])->name('restaurant-owner.orders');
    Route::post('/live-request-store',[RestaurantController::class,'Live_Request_Store'])->name('live-request-store');
    
    Route::get('/dishes',[RestaurantControllers\DishesController::class,'DishList'])->name('restaurant-owner.dishes');
    Route::get('/dish/create',[RestaurantControllers\DishesController::class,'createDishList'])->name('restaurant-owner.dish.create');
    Route::post('/dish/create',[RestaurantControllers\DishesController::class,'CreateDish'])->name('save.dish-res');
    Route::get('/dishes/edit/{id}',[RestaurantControllers\DishesController::class,'EditDish'])->name('edit.dish-res');
    Route::post('/dishes/edit',[RestaurantControllers\DishesController::class,'UpdateDish'])->name('update.dish-res');
    Route::get('/dishes/delete/{id}', [RestaurantControllers\DishesController::class,'DeleteDish'])->name('delete.dish-res');

    Route::get('/dish/categories',[RestaurantControllers\DishesCategoryController::class,'DishCategoryList'])->name('restaurant-owner.dish_categories');
    Route::get('/dish/category/create', function (){ return view('restaurant-owner.dish_category.create'); })->name('restaurant-owner.dish_category.create');
    Route::post('/dish/category/create',[RestaurantControllers\DishesCategoryController::class,'CreateDishCategory'])->name('save.dishcategory-res');
    Route::get('/dish/category/edit/{id}',[RestaurantControllers\DishesCategoryController::class,'EditDishCategory'])->name('edit.dishcategory-res');
    Route::post('/dish/category/edit',[RestaurantControllers\DishesCategoryController::class,'UpdateDishCategory'])->name('update.dishcategory-res');
    Route::get('/dish/category/delete/{id}', [RestaurantControllers\DishesCategoryController::class,'DeleteDishCategory'])->name('delete.dishcategory-res');

    Route::get('/addons', [RestaurantControllers\AddonsController::class,'AddonList'])->name('restaurant-owner.dish_addons');
    Route::get('/addon/create',[RestaurantControllers\AddonsController::class,'createAddonList'])->name('restaurant-owner.addons.create');
    Route::post('/addon/create',[RestaurantControllers\AddonsController::class,'CreateAddon'])->name('save.addon-res');
    Route::get('/addon/edit/{id}',[RestaurantControllers\AddonsController::class,'EditAddons'])->name('edit.addons-res');
    Route::post('/addon/edit',[RestaurantControllers\AddonsController::class,'UpdateAddons'])->name('update.addons-res');
    Route::get('/addon/delete/{id}', [RestaurantControllers\AddonsController::class,'DeleteAddons'])->name('delete.addons-res');

    Route::get('/addons_categories',[RestaurantControllers\AddonsCategoryController::class,'AddonCategoryList'])->name('restaurant-owner.dish_addons_categories');
    Route::get('/addons_category/create',function (){ return view('restaurant-owner.Addon_Category.create'); })->name('restaurant-owner.addons_categories.create');
    Route::post('/addons_category/create',[RestaurantControllers\AddonsCategoryController::class,'CreateAddonCategory'])->name('save.addons_cat-res');
    Route::get('/addon/category/edit/{id}',[RestaurantControllers\AddonsCategoryController::class,'EditAddonsCategory'])->name('edit.category-res');
    Route::post('/addon/category/edit',[RestaurantControllers\AddonsCategoryController::class,'UpdateCategory'])->name('update.category-res');
    Route::get('/addon/category/delete/{id}', [RestaurantControllers\AddonsCategoryController::class,'DeleteCategory'])->name('delete.category-res');

    Route::get('/coupons', [RestaurantControllers\CouponsController::class,'CouponList'])->name('restaurant-owner.coupons');
    Route::get('/coupon/create', [RestaurantControllers\CouponsController::class,'createCouponList'])->name('restaurant-owner.coupon.create');
    Route::post('/coupon/create',[RestaurantControllers\CouponsController::class,'CreateCoupon'])->name('save.coupon-res');
    Route::get('/coupon/edit/{id}',[RestaurantControllers\CouponsController::class,'EditCoupons'])->name('edit.coupons-res');
    Route::post('/coupon/edit',[RestaurantControllers\CouponsController::class,'UpdateCoupons'])->name('update.coupons-res');
    Route::get('/coupon/delete/{id}', [RestaurantControllers\CouponsController::class,'DeleteCoupons'])->name('delete.coupons-res');
    
    Route::get('/payment', function (){ return view('restaurant-owner.orders.payment');})->name('restaurant-owner.payment');
    Route::get('/review', function (){ return view('restaurant-owner.review');})->name('restaurant-owner.review');

    Route::get('/location', function (){ return view('restaurant-owner.Locations.index');})->name('restaurant-owner.location');
    Route::get('/location/create', function (){ return view('restaurant-owner.locations.create'); })->name('restaurant-owner.location.create');
    Route::post('/location/create',[RestaurantControllers\LocationController::class,'CreateLocation'])->name('save.location');
    Route::get('/location/edit/{id}',[RestaurantControllers\LocationController::class,'EditLocation'])->name('edit.location');
    Route::post('/location/edit',[RestaurantControllers\LocationController::class,'UpdateLocation'])->name('update.location');
    Route::get('/location/delete/{id}', [RestaurantControllers\LocationController::class,'DeleteLocation'])->name('delete.location');

    Route::get('/help', function (){ return view('restaurant-owner.help'); })->name('restaurant-owner.help');

    Route::get('/setting',[RestaurantControllers\RestaurantController::class,'EditProfile'])->name('edit.profile');
    Route::post('/setting/edit',[RestaurantControllers\RestaurantController::class,'UpdateRestaurant'])->name('update.restaurant-res');
});



//login

Route::get('/restaurant-owner/login', function (){
    return view('restaurant-owner.login');
})->name('admin.login');







