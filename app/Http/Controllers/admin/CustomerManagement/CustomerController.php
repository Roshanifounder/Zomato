<?php

namespace App\Http\Controllers\admin\CustomerManagement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customer_list(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Customer Management.customer_list');
        }else{
            return redirect('/login');
        }
    }

    Public function add_fund(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Customer Management.add_fund');
        }else{
            return redirect('/login');
        }
    }

    public function bonus(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Customer Management.bonus');
        }else{
            return redirect('/login');
        }
    }

    public function report(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Customer Management.report');
        }else{
            return redirect('/login');
        }
    }

    public function subscribed(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Customer Management.subscribed');
        }else{
            return redirect('/login');
        }
    }
}
