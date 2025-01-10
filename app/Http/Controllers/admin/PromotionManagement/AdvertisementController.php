<?php

namespace App\Http\Controllers\admin\PromotionManagement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function ads_request(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Promotion Management.ads_request');
        }else{
            return redirect('/login');
        }
    }

    public function ads_list(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Promotion Management.ads_list');
        }else{
            return redirect('/login');
        }
    }
    
    public function notification(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Promotion Management.notification');
        }else{
            return redirect('/login');
        }
    }
    
}
