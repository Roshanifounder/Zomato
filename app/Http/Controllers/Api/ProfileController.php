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

class ProfileController extends Controller
{
    
    public function profile(Request $request){
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|digits:10',
            'dob' => 'required',
            'anniversary'=>'required',
            'gender' => 'required',
            'profile_image'=>'required'
        ]);
        
        if ($validate->fails()) {
            $errors = implode(", ", $validate->errors()->all());
            return response()->json([
                'status' => 400,
                'message' => 'Failed: ' . $errors
            ], 200);
        }

   $uploadImage = function ($base64Image) {
        $imageName = Str::random(20) . '.png';
        $imagePath = public_path('uploads') . '/' . $imageName;

        if (file_put_contents($imagePath, base64_decode($base64Image))) {
            return URL::to('/') . '/uploads/' . $imageName;
        }
        return null;
    };

    $profile_image = $uploadImage($request->input('profile_image'));
    if (!$profile_image) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to save one or more images.',
        ], 500);
    }

             $insertdata=DB::table('user_profile')->insertGetId([
             'name'=>$request->input('name'),
             'phone'=>$request->input('phone'),
             'email'=>$request->input('email'),
             'dob'=>$request->input('dob'),
             'anniversary'=>$request->input('anniversary'),
             'gender'=>$request->input('gender'),
             'profile_image'=>$profile_image,
             'status'=>1
        ]); 
             return response()->json([
            'data'=>$insertdata,
            'status'=>'true',
            'message'=>'successfully',
            ],200);
         } 



  //////////////////LOGIN////////////////////////// 
public function login(Request $request){ 
    $validate = Validator::make($request->only('phone'), [
        'phone' => 'required|digits:10',
    ]);
         if ($validate->fails()) {
         $errors = implode(", ", $validate->errors()->all());
         return response()->json([
        'status' => false,
        'message' => 'login Failed: ' . $errors
      
    ], 200); 
    }        
         $user= DB::table('user_profile') 
         ->where('phone', $request->get('phone')) 
         ->first(); 
         if($user==null){
                 return response()->json([
                 'success' =>false,
                 'message' => 'Mobile number not matching.'
                 ]);
         
        }
        
            //////ACTIVE AND DEACTIVE//////
          if ($user->status != 1) {
            return response()->json([
                'status' => 2,
                'success' => true,
                'message' => 'User is not authorized to log in',
            ], 200);
        }
        
        else{
                  return response()->json([
                  'user_id'=>$user->id, 
                  'success' => true,
                  'message' => 'login successfully .'
                  ]);  
                } 
          }  
 

         /////////////////VEG MODE////////////////////
         public function update_veg_mode(Request $request){
            $validate=Validator::make($request->all(),[
                  'id'=>'required',
                  'veg_mode'=>'required',  
               ]);
           
           if($validate->fails()){
               return response()->json([
                     'success'=>false,
                       'message' => 'Failed: ' . implode(', ', $validate->errors()->all()) 
               ],200);
                }   
                $update_veg_mode=DB::table('user_profile')
                   ->where('id', $request->input('id')) 
                   ->update([
                   'veg_mode' => $request->input('veg_mode'), 
                   ]);
   
           if ($update_veg_mode) {
               return response()->json([
                   'success' => true,
                   'message' => 'successfully.'
               ], 200);
           }else{
               return response()->json([
                    'success' => true,
                   'message' => 'successfully.'
               ], 200);
           } 
       }
   
   
   
      ////// ////////UPDATE  PROFILE///////////////////
       public function update_profile(Request $request){
        $validate=Validator::make($request->all(),
           [
                'id'=>'required',  
           ]);
       
       if($validate->fails()){
           return response()->json([
                 'status'=>400,
                   'message' => 'Failed: ' . implode(', ', $validate->errors()->all())
           ],200);
       }
   
                $update_profile=DB::table('user_profile')
               ->where('id', $request->input('id')) 
               ->update([ 
                'name'=>$request->input('name'),
                'phone'=>$request->input('phone'),
                'email'=>$request->input('email'),
                'dob'=>$request->input('dob'),
                'anniversary'=>$request->input('anniversary'),
                'gender'=>$request->input('gender')
               ]);

       if($update_profile){
               return response()->json([
               'status' => 200,
               'message' => 'updated successfuly', 
              ], 200);   
       } else {
                return response()->json([
               'status' =>400,
               'message' => 'id not found',
           ], 200);
         }     
       } 
     }
    

