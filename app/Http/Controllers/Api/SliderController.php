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
    
    
///////////////////////REVIEW/////////////////////////////  
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
            'item_id'=>'required',
            'discount'=>'required', 
        ]);
        
        if ($validate->fails()) {
            $errors = implode(", ", $validate->errors()->all());
            return response()->json([
                'status' => false,
                'message' => 'Failed: ' . $errors
            ], 200);
        }
        $AddToCart=DB::table('add_cart')->insertGetId([
            'user_id'=>$request->input('user_id'),
            'quantity'=>$request->input('quantity'),
            'price'=>$request->input('price'),
            'discount'=>$request->input('discount'),
            'item_id'=>$request->input('item_id')
            ]);
            if(!empty($AddToCart)){
                 $AddToCart=DB::table('add_cart')->where('id',$AddToCart)->first();
                 return response()->json([
                'status'=>true,
                'message'=>'Add Item Successfully',
                'Cart_Item'=>$AddToCart
                ],200);
            }else{
                return response->json([
                 'status'=>false,
                 'message'=>'Item Added Failed'
                    
               ],200);
            }
      }
      
      
///////////////////////////REMOVE CART////////////////////////////  
public function delete_cart(Request $request) { 
    $validate = Validator::make($request->only('user_id'), [
        'user_id' => 'required|integer',
    ]);

    if ($validate->fails()) {
        $errors = implode(", ", $validate->errors()->all());
        return response()->json([
            'status' => false,
            'message' => 'Failed: ' . $errors,
        ], 200);
    }
 
    $existingCartItems = DB::table('add_cart')
        ->where('user_id', $request->input('user_id'))
        ->count();

    if ($existingCartItems == 0) {
        return response()->json([
            'status' => false,
            'message' => 'No cart items found for this user.',
        ], 200);
    }
 
    $query = DB::table('add_cart')
        ->where('user_id', $request->input('user_id'))
        ->delete();

    if ($query) {
        return response()->json([
            'status' => true,
            'message' => 'Cart items deleted successfully.',
        ], 200);
    } else {
        return response()->json([
            'status' => false,
            'message' => 'Failed to delete cart items. Please try again.',
        ], 200);
    }
}


///////////////////////CART ITEM VIEW////////////////////////////// 
public function view_cart(Request $request, $user_id)
{
    $cart_view = DB::table('add_cart')->where('user_id', $user_id)->first();

    if (!empty($cart_view)) {
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'data' => $cart_view,
        ], 200);
    } else {
        return response()->json([
            'status' => false,
            'message' => 'No cart data found.',
        ], 200);
    }
}

  }
