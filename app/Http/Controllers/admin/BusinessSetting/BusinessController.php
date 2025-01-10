<?php

namespace App\Http\Controllers\admin\BusinessSetting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function business_setup(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Business Setting.business_setup');
        }else{
            return redirect('/login');
        }
    }

    public function subscriber_list(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Business Setting.subscriber_list');
        }else{
            return redirect('/login');
        }
    }
}
