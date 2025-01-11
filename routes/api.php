<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\AddressController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/sliders', [SliderController::class, 'getSliders']); 
Route::post('/review', [SliderController::class, 'review']); 
Route::post('/add_to_cart', [SliderController::class, 'add_to_cart']); 

Route::post('register',[ProfileController::class,'register']);
Route::get('user_profile/{id}',[ProfileController::class,'user_profile']); 
Route::post('update_veg_mode',[ProfileController::class,'update_veg_mode']);
Route::post('Login',[ProfileController::class,'login']);
Route::post('update_profile',[ProfileController::class,'update_profile']);

Route::post('category_list',[CategoryController::class,'category_list']);
Route::post('sub_category',[CategoryController::class,'sub_category']);

Route::post('address_add',[AddressController::class,'add_address']);
Route::get('address_view/{id}',[AddressController::class,'address_view']);   
Route::post('address_delete',[AddressController::class,'address_delete']);
