<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Facades\Hash;
use  Illuminate\Support\Facades\Validator;
class SliderController extends Controller 
{   

///////////////////BANNER////////////////////////// 
public function getSliders()
{ 
    $sliders = DB::table('slider')
        ->select('*')  
        ->get(); 
    if ($sliders->isEmpty()) {
        return response()->json([
            'status' => false,
            'message' => 'No banners found',
        ], 400);
    }else{
    return response()->json([
        'status' => true,
        'message' => 'banners retrieved successfully',
        'sliders' => $sliders,
    ], 200);

      }
    }
    
    
///////////////////////REVIEW/////////////////////////   
  public function review(Request $request)
        {
             $validate = Validator::make($request->all(), [
            'user_id' => 'required',
            'review_id' => 'required',
            'rating' => 'required',
            'message'=>'required', 
        ]);
        
        if ($validate->fails()) {
            $errors = implode(", ", $validate->errors()->all());
            return response()->json([
                'status' => false,
                'message' => 'Failed: ' . $errors
            ], 200);
        }
        
        $reviewdata=DB::table('review')->insertGetId([
            'user_id'=>$request->input('user_id'),
            'review_id'=>$request->input('review_id'),
            'rating'=>$request->input('rating'),
            'message'=>$request->input('message')
        ]);
       if(!empty($reviewdata)){
             return response()->json([
             'success'=>true,
             'message'=>'Review Added Successfully',
             'data'=>$reviewdata
        ],200);
        }else{return response()->json([
             'success'=>false,
             'message'=>'Review Failed'
        ],200);
         } 
     }
     
     
////////////////////////ADD TO CART/////////////////////////
public function add_to_cart(Request $request){
         $validate = Validator::make($request->all(), [
            'quantity'=>'required',
            'user_id'=>'required',
            'price'=>'required',
            'discount'=>'required', 
        ]);
        
        if ($validate->fails()) {
            $errors = implode(", ", $validate->errors()->all());
            return response()->json([
                'status' => false,
                'message' => 'Failed: ' . $errors
            ], 200);
        }
        $AddToCart=DB::table('add_to_cart')->insert([
            'user_id'=>$request->input('user_id'),
            'quantity'=>$request->input('quantity'),
            'price'=>$request->input('price'),
            'discount'=>$request->input('discount')
            ]);
            if(!empty($AddToCart)){
                 return response()->json([
                'status'=>true,
                'message'=>'Add Item Successfully',
                'item'=>$AddToCart
                ],200);
            }else{
                return response->json([
                 'status'=>false,
                 'message'=>'Item Added Failed'
                    
               ],200);
            }
      }
  }
