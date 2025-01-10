<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
   public function login(){
    return view('admin.login');
   }

   public function admin(Request $request){
      $request->validate([
         'email' => 'required',
         'password' => 'required',  
     ]);
    
     $data = DB::table('admin')->where('email', $request->email)->where('password', $request->password)->first();
     if ($data) {  
             Session::put('id', $data->id); 
             Session::get('id'); 
             Session::put('email', $data->email); 
             return redirect('index')->with('success', 'Login Successfully');
           
     } else { 
         return redirect('login')->with('error', 'Email and password does not exist');
     }
   }

   public function logout(Request $request)
   {
       Session::forget(['id', 'email']);  
       Session::flush();
       $request->session()->regenerateToken();
       return redirect('/login')->with('success', 'Logged out successfully');
   }
}
