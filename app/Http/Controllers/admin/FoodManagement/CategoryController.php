<?php

namespace App\Http\Controllers\admin\FoodManagement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(){
        $user_id=session::get('id');
        $category=DB::table('category')->get();
        if(!empty($user_id)){
            return view('/admin.Food Management.category',['categorys'=>$category]);
        }else{
            return redirect('/login');
        }
    }

//////////////ADD CATEGORY/////////////////

       public function add_category(){
           $user_id=session::get('id');
           if(!empty($user_id)){
               return view('admin.Food Management.category');
           }else{
               return redirect('/login');
           }
       }
       
       public function sub_category(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Food Management.sub_category');
        }else{
            return redirect('/login');
        }
    }

    
        public function addons_list(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Food Management.addons_list');
        }else{
            return redirect('/login');
        }
    }

    ////////Foods ////////
    public function food_list(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Food Management.food_list');
        }else{
            return redirect('/login');
        }
    }


    public  function review(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Food Management.review');
        }else{
            return redirect('/login');
        }
    }
}
