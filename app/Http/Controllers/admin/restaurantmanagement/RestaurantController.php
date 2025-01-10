<?php

namespace App\Http\Controllers\admin\restaurantmanagement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function restaurant_list(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('admin.Restaurant Management.restaurant_list');
        }else{
            return redirect('/login');
        }
    }
}
