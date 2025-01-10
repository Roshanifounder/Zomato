<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\IndexController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\order\OrderController;
use App\Http\Controllers\admin\order\SubscriptionController;
use App\Http\Controllers\admin\order\DispatchManagementController;
use App\Http\Controllers\admin\restaurantmanagement\RestaurantController;
use App\Http\Controllers\admin\restaurantmanagement\ZoneController;
use App\Http\Controllers\admin\FoodManagement\CategoryController;
use App\Http\Controllers\admin\PromotionManagement\CampaignController;
use App\Http\Controllers\admin\PromotionManagement\AdvertisementController;
use App\Http\Controllers\admin\PromotionManagement\CouponController; 
use App\Http\Controllers\admin\PromotionManagement\bannerController; 
use App\Http\Controllers\admin\HelpSupport\HelpController;
use App\Http\Controllers\admin\CustomerManagement\CustomerController;
use App\Http\Controllers\admin\DeliverymanManagement\DeliveryController;
use App\Http\Controllers\admin\TransactionManagement\TransactionController;
use App\Http\Controllers\admin\BusinessSetting\BusinessController;
use App\Http\Controllers\admin\EmployeeManagement\EmployeeController;


Route::get('/', function () {
    return view('welcome');
});
 
Route::get('/index',[IndexController::class,'index']);
Route::get('/login',[LoginController::class,'login']);
Route::post('login',[LoginController::class,'admin']);
Route::get('/logout', [LoginController::class, 'logout']);
 
 
 ///////////ORDER MANAGEMENT/////////
Route::controller(OrderController::class)->group(function(){
    Route::get('/order_list', 'order_list')->name('order_list'); 
    Route::get('/scheduling', 'scheduling')->name('scheduling'); 
    Route::get('/pending', 'pending')->name('pending'); 
    Route::get('/accepted', 'accepted')->name('accepted');
    Route::get('/processing', 'processing')->name('processing');
    Route::get('/food_on_way', 'food_on_way')->name('food_on_way');  
    Route::get('/delivery', 'delivery')->name('delivery');  
    Route::get('/canceled', 'canceled')->name('canceled');  
    Route::get('/peyment_failed', 'payment_failed')->name('payment_failed');  
    Route::get('/refunded', 'refunded')->name('refunded');  
    Route::get('/dine_in', 'dine_in')->name('dine_in');
    Route::get('/offline_payment', 'offline_payment')->name('offline_payment'); 
    Route::get('/refund_request', 'new_refund_request')->name('new_refund_request');  
 });
 
    Route::get('/subscription_order', [SubscriptionController::class, 'subscription_order']); 
   
    Route::controller(DispatchManagementController::class)->group(function(){
    Route::get('/searching_deliveryman','searching_deliveryman')->name('searching_deliveryman');
    Route::get('/ongoing_order','ongoing_order')->name('ongoing_order'); 
    });


   //////////////////////RESTAURANT MANAGEMENT//////////////////////////////////////
    Route::controller(RestaurantController::class)->group(function(){
    Route::get('/restaurant_list','restaurant_list')->name('restaurant_list'); 
    });

        Route::get('/zone_setup', [ZoneController::class, 'zone_setup']);
        Route::get('/cuisine', [ZoneController::class, 'cuisine']);
        
        
  /////////////////////////FOOD MANAGEMENT/////////////////////////////////
        Route::controller(CategoryController::class)->group(function(){
        Route::get('/category','category')->name('category');
        Route::get('/sub_category','sub_category')->name('sub_category'); 
        Route::get('/addons_list','addons_list')->name('addons_list');
        Route::get('/food_list','food_list')->name('food_list');
        Route::get('/review','review')->name('review');
        Route::get('add_category','add_category');
        });
    
      ////////////////////////PROMOTION MANAGEMENT/////////////////
      Route::controller(CampaignController::class)->group(function(){
      Route::get('/campaign_list','basic_campaign')->name('campaign_list');
      Route::get('/food_campaign','food_campaign')->name('food_campaign');   
      Route::get('/cashback','cashback')->name('cashback');
      });
   
   ///BENNER//////
   Route::controller(bannerController::class)->group(function(){
   Route::get('/benner','benners');
   Route::post('/banner/store','add_banner')->name('banner.store');
   Route::get('/banner/banner_delete/{id}','banner_delete');
    Route::put('banner/{id}','update_banner')->name('update.banner');
   });
   
   /////////////////////////COUPON///////////////////////////////////////
     Route::controller(CouponController::class)->group(function(){
         Route::get('/coupon','coupon')->name('coupon'); 
         Route::get('/coupon/delete_coupon/{id}','delete_coupon');
         Route::put('coupon/{id}','update_coupon')->name('update.coupon');
 
    });


      Route::controller(AdvertisementController::class)->group(function(){ 
      Route::get('ads_request','ads_request')->name('advertisement_request');
      Route::get('ads_list','ads_list')->name('ads_list');
      Route::get('notification','notification')->name('notification');
      });


      //////////////////HELP AND SUPPORT/////////////////////////
      Route::controller(HelpController::class)->group(function(){
      Route::get('contact_list','contact_list')->name('contact_list');
      Route::get('chatting','chatting')->name('chatting');
      });


     ///CUSTOMER MANAGEMENT//
     Route::controller(CustomerController::class)->group(function(){
     Route::get('customer_list','customer_list')->name('customer_list');
     Route::get('add_fund','add_fund')->name('add_fund');
     Route::get('bonus','bonus')->name('bonus');
     Route::get('report','report')->name('report');
     Route::get('subscribed','subscribed')->name('subscribed');
     });

     ///DELIVERYMAN MANAGEMENT//
    Route::controller(DeliveryController::class)->group(function(){
    Route::get('vehicle-list','vehicle_list')->name('vehicle_list');
    Route::get('shift','shift')->name('shift');
    Route::get('join-request','new_join_request')->name('new_join_request');
    Route::get('add-deliveryman','add_new_deliveryman')->name('add_new_deliveryman');
    Route::get('deliveryman-list','deliveryman_list')->name('deliveryman_list');
    Route::get('deliveryman-review','deliveryman_review')->name('deliveryman_review');
    Route::get('deliveryman-bonus','deliveryman_bonus')->name('deliveryman_bonus');
    Route::get('incentive','deliveryman_incentive')->name('deliveryman_incentive');
    Route::get('incentive-history','incentive_history')->name('incentive_history');
    });

     Route::controller(TransactionController::class)->group(function(){
     Route::get('account-trans','account_trans')->name('account_trans');
     Route::get('withdraw_list','withdraw_list')->name('withdraw_list');
     Route::get('provide_delivery_earning','provide_delivery_earning')->name('provide-delivery-earning');
     Route::get('withdraw_method','withdraw_method')->name('withdraw_method');
     });
    
     Route::controller(BusinessController::class)->group(function(){
     Route::get('business_setup','business_setup')->name('business_setup');
     Route::get('subscriber_list','subscriber_list')->name('subscriber_list');
     });

     Route::controller(EmployeeController::class)->group(function(){
     Route::get('custom_role','custom_role')->name('custom_role');
     });
     