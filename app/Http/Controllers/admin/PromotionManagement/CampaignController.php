<?php

namespace App\Http\Controllers\admin\PromotionManagement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CampaignController extends Controller
{
    public function basic_campaign(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Promotion Management.campaigns_list');
        }else{
            return redirect('/login');
        }
    }

    public function food_campaign(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('admin.Promotion Management.food_campaign');
        }else{
            return redirect('/login');
        }
    }


 

  public function cashback(){ 
    $user_id=session::get('id');
    if(!empty($user_id)){
        return view('/admin.Promotion Management.cashback');
    }else{
        return redirect('/login');
    }
  }

}
