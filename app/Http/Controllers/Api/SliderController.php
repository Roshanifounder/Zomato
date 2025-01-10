<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Facades\Hash;
use  Illuminate\Support\Facades\Validator;
class SliderController extends Controller 
{   
      public function slider(Request $request){
    $slider1 = DB::table('slider')
    ->select('*')
    ->where('id',$request->input('id'))
    ->get(); 
    $slider2 = DB::table('slider')
    ->select('*')
    ->where('id',$request->input('id'))
    ->get(); 
    $slider3 = DB::table('slider')
    ->select('*')
     ->where('id',$request->input('id'))
    ->get();      
    
         return response()->json([
        'message' => 'successfully',
        'status' => true,
        'slider1' => $slider1,
        'slider2'=>$slider2,
        'slider3'=>$slider3,
    ]);          
   }   
}
