<?php

namespace App\Http\Controllers\admin\EmployeeManagement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function custom_role(){
        $user_id=session::get('id');
        if(!empty($user_id)){
            return view('/admin.Employee Management.custom_role');
        }else{
            return redirect('/login');
        }
    }
}
