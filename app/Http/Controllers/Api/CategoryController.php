<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class CategoryController extends Controller
{
    
    /////////////////CATEGORY////////////////////////
    public function category_list(Request $request){
        $getCategory=DB::table('category')
        ->select('*')
        ->get();
        
        if(empty($getCategory)){
            return response()->json([
                'success'=>false,
                'message'=>'category data list not found'
                ],200);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'category data list',
                'category_list'=>$getCategory
                ],200);
        }
    }
    
    
    ///////////////////////SUB CATEGORY///////////////////
    public function sub_category(Request $request){
           $validate = Validator::make($request->all(), [
            'CategoryID' => 'required',
        ]);
        
        if ($validate->fails()) {
            $errors = implode(", ", $validate->errors()->all());
            return response()->json([
                'status' => false,
                'message' => 'Failed: ' . $errors
            ], 200);
        }
        
        $getSubCategory=DB::table('sub_category')
        ->get();
     
        if(!empty($getSubCategory)){
            return response()->json([
               'success'=>false,
               'message'=>'sub_category data not found'
                ],200);
        }else{  
            return response()->json([
                'success'=>true,
                'message'=>'sub category list',
                'sub_category'=>$getSubCategory
                ],200); 
        }
    }
}