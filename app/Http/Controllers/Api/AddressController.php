<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class AddressController extends Controller
{
    
    //////////////////ADD ADDRESS////////////////////
    public function add_address(Request $request){
           $validate = Validator::make($request->all(), [
            'street_name' => 'required',
            'house_no' => 'required',
            'floor'=>'required',
            'building'=>'required',
            'user_id' => 'required',
            'phone'=>'required|digits:10',
            'delivery_address'=>'required',
        ]);
        
        if ($validate->fails()) {
            $errors = implode(", ", $validate->errors()->all());
            return response()->json([
                'status' => false,
                'message' => 'Failed: ' . $errors
            ], 200);
        }
        
        $insertaddress=DB::table('address')->insertGetId([
            'user_id'=>$request->input('user_id'),
            'delivery_address'=>$request->input('delivery_address'),
            'phone'=>$request->input('phone'),
            'street_name'=>$request->input('street_name'),
            'floor'=>$request->input('floor'),
            'building'=>$request->input('building'),
            'house_no'=>$request->input('house_no')
            ],200);
            
            if(!empty($insertaddress)){
                return response()->json([
                    'success'=>true,
                    'message'=>'Address Insert Successfully',
                    'data'=>$insertaddress
                ],200);
            }return response()->json([
                'success'=>false,
                'message'=>'Address Failed'
                ],200);
    }
    
    
    
    //////////////////ADDRESS VIEW//////////////////
    public function address_view($id){ 
       $userId = $id; 
    if (!empty($userId)) {
        $viewaddress = DB::table('address')
            ->where('user_id', $userId)
            ->get();

        if ($viewaddress->isEmpty()) {  
            return response()->json([
                'success' => false,
                'error' => 'No data found',
            ], 200);
        } else {
            return response()->json([
                'data' => $viewaddress,
                'success' => true,
                'message' => 'Success.',
            ], 200);
        }
    } else {
        return response()->json([
            'success' => false,
            'message' => 'userid is required',
        ], 200);
       }  
    }
    
    
///////////////////////////ADDRESS DELETE/////////////////////////
     public function address_delete(Request $request){
          $validateUser = Validator::make($request->all(), [
          'userid' => 'required',  
    ]);

    if ($validateUser->fails()) {
        return response()->json([
            'status' => false,
            'message' => 'Validation Failed',
            'errors' => $validateUser->errors()
        ], 400);  
    }
    $user_id=$request->input('user_id');
    $address_delete=DB::table('address')
    ->where('id',$user_id)
    ->delete(); 
     
    if(!empty($address_delete)){
        return response()->json([
            'success'=>false,
            'message'=>'Address Not Found'
            ],200);
          
    }else{
        return response()->json([
            'success'=>true,
            'message'=>'Address Deleted Successful', 
            ],200);
       }
     }
  }