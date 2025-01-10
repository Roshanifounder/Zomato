<?php

namespace App\Http\Controllers\admin\order; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order_list(){
        $user_id=session::get('id');
        $orderdata=DB::table('order')->get();
        if(!empty($user_id)){
        return view('admin.order.order_list',['orders'=>$orderdata]);
        }else{
            return redirect('/login');
        }
    }
 
   public function scheduling(){
        $user_id=session::get('id');
        $orderdata=DB::table('order')
        ->where('order.status','1')
        ->get();
        $heading="Total Shipped Order";
        if(!empty($user_id)){ 
         return view('admin.order.order_list',['orders' => $orderdata,'heading'=>$heading]);
        }else{
            return redirect('/login');
        }
    }
    
    public function pending(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.order.order_list');
        }else{
            return redirect('/login');
        }
    }

    public function Accepted(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.order.order_list');
        }else{
            return redirect('/login');
        }
    }

    public function Processing(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.order.order_list');
        }else{
            return redirect('/login');
        }
    }

    public function food_on_way(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.order.order_list');
        }else{
            return redirect('/login');
        }
    }

    public function delivery(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.order.order_list');
        }else{
            return redirect('/login');
        }
    }
    
   public function canceled(){
    $user_id=session::get('id');
    if(!empty($user_id)){
        return view('/admin.order.order_list');
    }else{
        return redirect('/login');
    }

   } 

   public function payment_failed(){
    $user_id=session::get('id');
    if(!empty($user_id)){
        return view('/admin.order.order_list');
    }else{
        return redirect('/login');
    }
  }
    
  public function refunded(){
    $user_id=session::get('id');
    if(!empty($user_id)){
        return view('/admin.order.order_list');
    }else{
        return redirect('/login');
    }
  }

  public function dine_in(){
    $user_id=session::get('id');
    if(!empty($user_id)){
        return view('/admin.order.order_list');
    }else{
        return redirect('/login');
    }
  }

  public function offline_payment(){
    $user_id=session::get('id');
    if(!empty($user_id)){
        return view('/admin.order.order_list');
    }else{
        return redirect('/login');
    }
  }

  public function new_refund_request(){
    $user_id=session::get('id');
    if(!empty($user_id)){
        return view('/admin.order.order_list');
    }else{
        return redirect('/login');
    }
  }
}
