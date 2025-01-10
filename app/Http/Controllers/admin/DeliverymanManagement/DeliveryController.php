<?php

namespace App\Http\Controllers\admin\DeliverymanManagement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function vehicle_list(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Deliveryman Mang.vehicle-list');
        }else{
            return redirect('/login');
        }
    }


    public function shift(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Deliveryman Mang.shift-setup');
        }else{
            return redirect('/login');
        }
    }

    public function new_join_request(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Deliveryman Mang.new-join-request');
        }else{
            return redirect('/login');
        }
    }

    public function add_new_deliveryman(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Deliveryman Mang.add-deliveryman');
        }else{
            return redirect('/login');
        }
    }

    public function deliveryman_list(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Deliveryman Mang.deliveryman-list');
        }else{
            return redirect('/login');
        }
    }

        public function deliveryman_review(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Deliveryman Mang.deliveryman-review');
        }else{
            return redirect('/login');
        }
    }

        public function deliveryman_bonus(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Deliveryman Mang.deliveryman-bonus');
        }else{
            return redirect('/login');
        }
    }

        public function deliveryman_incentive(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Deliveryman Mang.incentive');
        }else{
            return redirect('/login');
        }
    }

       public function incentive_history(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Deliveryman Mang.incentive-history');
        }else{
            return redirect('/login');
        }
    }
}
