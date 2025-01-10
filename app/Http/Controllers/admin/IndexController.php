<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class IndexController extends Controller
{
    public function index(){
        $user_id=session::get('id');
        if(!empty($user_id)){  
        return view('/admin.index');
     }else{
            return redirect('login');
        }
   
    }
}
