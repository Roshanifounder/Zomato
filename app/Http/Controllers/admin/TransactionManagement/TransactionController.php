<?php

namespace App\Http\Controllers\admin\TransactionManagement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function account_trans(){
        $user_id=session::get('id');
        if(!empty($user_id)){
             return view('/admin.Transaction Management.amount-trans');
        }else{
           return redirect('/login');
        }
    }

    public function withdraw_list(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('admin.Transaction Management.withdraw_list');
        }else{
            return redirect('/login');
        }
    }

    public function provide_delivery_earning(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('admin.Transaction Management.provide_delivery_earning');
        }else{
            return redirect('/login');
        }
    }
     
    public function Withdraw_method(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('admin.Transaction Management.withdraw-method');
        }else{
            return redirect('/login');
        }
    }
     
}
