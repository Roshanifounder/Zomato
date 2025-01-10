<?php

namespace App\Http\Controllers\admin\order;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscription_order(){
        $user_id=session::get('id');
        $subscription=DB::table('subscription')->get();
        if(!empty($user_id)){
          return view('/admin.order.subscription_order',['users'=>$subscription]);
        }else{
            return redirect('/login');
        }
    }
}
