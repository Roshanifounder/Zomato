<?php

namespace App\Http\Controllers\admin\restaurantmanagement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function Zone_setup(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('admin.Restaurant Management.zone_setup');
        }else{
            return redirect('/login');
        }
    }

    public function cuisine(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Restaurant Management.cuisine');
        }else{
            return redirect('/login');
        }
    }
}
