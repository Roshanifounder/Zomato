<?php

namespace App\Http\Controllers\admin\FoodManagement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
     public function category_list(){
         $user_id=session::get('id');
         $categorydata=DB::table('category')->get();
         if(!empty($user_id)){
             return view('/admin.Food Management.category_list',['categorys'=>$categorydata]);
         }else{
             return redirect('/login');
        }
     }
     
///////////////////////////ADD CATEGORY/////////////////////////////
public function category_add(Request $request){
      $validate = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'images' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048', // Ensure valid file type and size
    ]);

    if ($validate->fails()) {
        return back()->withErrors($validate)->withInput();
    }

   
    if ($request->hasFile('images')) {
        $imageFile = $request->file('images');
        $publicPath = 'category';
        $imageFileName = time() . '_' . $imageFile->getClientOriginalName();
        $imageFile->move(public_path($publicPath), $imageFileName); 
        $images = url($publicPath . '/' . $imageFileName); 
       
        DB::table('category')->insert([
            'name' => $request->input('name'), 
            'images' => $images,
        ]); 
        return redirect()->back()->with('success', 'category added successfully!');
       }else {
        return redirect()->back()->with('error', 'Image upload failed.');
     }
 }
 
 

//////////////////////UPDATE CATEGORY///////////////////////////////
public function update_category(Request $request, $id)
       { 
         $validated = $request->validate([
        'name' => 'required',
        'images'=>'required',
     ]);
 
  if ($request->hasFile('images')) {
        $imageFile = $request->file('images');
        $publicPath = 'category';
        $imageFileName = time() . '_' . $imageFile->getClientOriginalName();
        $imageFile->move(public_path($publicPath), $imageFileName); 
        $images = url($publicPath . '/' . $imageFileName);  
   }
    $data=DB::table('category') 
        ->where('category.id', $id)
        ->update([
          'name'=>$request->input('name'),
          'images'=>$images
        ]); 
     return redirect()->back()->with('success', 'updated successfully.');
    }  
 
 
 
/////////////////////CATEGORY DELETE////////////////////////////////
public function category_delete(String $id){
    $data=DB::table('category')
    ->where('id',$id)
    ->delete();
    return redirect('/category_list')->with('success', 'category deleted successfully!');
}
  
    
//////////////////////////SUB CATEGORY/////////////////////////////
       public function sub_category(){
        $user_id=session::get('id');
        $sub_category=DB::table('sub_category')->get();
        if(!empty($user_id)){
            return view('/admin.Food Management.sub_category',['subcategory'=>$sub_category]);
        }else{
            return redirect('/login');
        }
    }

    
////////////////////////DELETE SUB CATEGORY///////////////////////
public function sub_category_delete(String $id){
    $data=DB::table('sub_category')
    ->where('id',$id)
    ->delete();
    return redirect('/sub_category')->with('success','sub category deleted successfully');
}


////////////////////ADDONS LIST///////////////////////////////////
        public function addons_list(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Food Management.addons_list');
        }else{
            return redirect('/login');
        }
    }


//////////////////////////FOODS/////////////////////////////////
    public function food_list(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Food Management.food_list');
        }else{
            return redirect('/login');
        }
    }


///////////////////////REVIEW//////////////////////////////////
    public  function review(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Food Management.review');
        }else{
            return redirect('/login');
        }
    }
}
