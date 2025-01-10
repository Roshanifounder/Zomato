<?php

namespace App\Http\Controllers\admin\HelpSupport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    Public function contact_list(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Help Support.contact');
    } else{
        return redirect('/login');
    }
  }

  public function chatting(){
    $user_id=session::get('id');
    if(!empty($user_id)){
        return view('/admin.Help Support.chatting');
    }else{
        return redirect('/login');
    }
  }
}