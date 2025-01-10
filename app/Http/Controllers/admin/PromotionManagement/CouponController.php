<?php

namespace App\Http\Controllers\admin\PromotionManagement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CouponController extends Controller
{
    public function coupon(){
        $user_id=session::get('id');
        $coupondata=DB::table('coupon')->get();
        if(!empty($user_id)){
            return view('/admin.Promotion Management.coupon',['data'=>$coupondata]);
        }else{
            return redirect('/login');
        }
    }
    
     
 //////DELETE COUPON//////   
    public function delete_coupon(string $id)
    {
     DB::table('coupon')->where('id', $id)->delete(); 
     return redirect('/coupon');
    
   }
   
   
   /////UPDATE COUPON////
       public function update_coupon(Request $request, $id)
       { 
         $validated = $request->validate([
        'code' => 'required',
        'start_date' => 'required',
        'expire_date'=>'required',
        'discount'=>'required',
        'max_discount'=>'required',
        'min_purchase'=>'required',
        'title'=>'required',
        
     ]);
 
    $data=DB::table('coupon') 
        ->where('coupon.id', $id)
        ->update([
          'code'=>$request->input('code'),
          'start_date'=>$request->input('start_date'),
          'expire_date'=>$request->input('expire_date'),
          'discount'=>$request->input('discount'),
          'max_discount'=>$request->input('max_discount'),
          'min_purchase'=>$request->input('min_purchase'),
          'title'=>$request->input('title')
        ]); 
     return redirect()->back()->with('success', 'updated successfully.');
    }    
}