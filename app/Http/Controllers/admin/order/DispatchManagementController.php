<?php

namespace App\Http\Controllers\admin\order;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class DispatchManagementController extends Controller
{
     public function searching_deliveryman(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('admin.order.searching_deliveryman');
        }else{
            return redirect('/login');
        }
     }

     public function ongoing_order(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('admin.order.ongoing_order');
        }else{
            return redirect('/login');
        }
     }
}
