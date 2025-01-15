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
    
//////////////////////CATEGORY//////////////////////// 
   public function category_list(Request $request)
{
    $categories = DB::table('category')
        ->select('*')
        ->get();

    if ($categories->isEmpty()) {
        return response()->json([
            'success' => false,
            'message' => 'Category data list not found',
        ], 200);
    }

    $categoryList = $categories->map(function ($category) use ($request) { 
        $subCategories = DB::table('sub_category')
            ->where('categoryID', $category->id)  
            ->select('*')
            ->get();

       
        $subCategoryList = $subCategories->map(function ($subCategory) {
            return [
                
                  'category_ID'=>$subCategory->categoryID,
                'sub_cat_id' => $subCategory->id,
                'name' => $subCategory->name,
                'image' => $subCategory->image,
                'status' => $subCategory->status,
                'created_at' => $subCategory->created_at,
                'updated_at' => $subCategory->updated_at,
            ];
        });

        
        $subCategoryList->prepend([
            'category_ID' => $category->id,
            'sub_cat_id' => 0,
            'name' => $category->name,  
            'image' => $category->images,  
            'status' => $category->status,
            'delivery_time' => $category->delivery_time,
            'created_at' => $category->created_at,
            'updated_at' => $category->updated_at,
        ]);

       
        return [
            'id' => $category->id,
            'name' => $category->name,
            'images' => $category->images,
            'status' => $category->status,
            'delivery_time'=>$category->delivery_time,
            'created_at' => $category->created_at,
            'updated_at' => $category->updated_at,
            'sub_category' => $subCategoryList,
        ];
    });

    return response()->json([
        'success' => true,
        'message' => 'Category data list',
        'category_list' => $categoryList,
    ], 200);
  }
  
}