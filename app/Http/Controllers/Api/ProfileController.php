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
    
///////////////////////REGISTER/////////////////////////
    public function register(Request $request){
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|digits:10', 
            'email'=>'required'
        ]);
        
         if ($validate->fails()) {
            $errors = implode(", ", $validate->errors()->all());
            return response()->json([
                'status' => false,
                'message' => 'Failed: ' . $errors
            ], 200);
        }

          $data = DB::table('user_profile')
        ->where('phone', $request->input('phone'))
        ->first();
    
        if ($data) {
        return response()->json([
            'status' => false,
            'message' => 'Phone number is already registered.',
        ], 200);
      }
      
             $user=DB::table('user_profile')->insertGetId([
             'name'=>$request->input('name'),
             'phone'=>$request->input('phone'),
             'email'=>$request->input('email'), 
             'status'=>1
        ]); 
        
            $insertedData = DB::table('user_profile')->where('id', $user)->first();
             return response()->json([
            'data'=>$insertedData,
            'status'=>true,
            'message'=>'successfully',
            ],200);
         } 



/////////////////////////LOGIN/////////////////////////////  
public function login(Request $request)
{
     
    $validate = Validator::make($request->only('phone'), [
        'phone' => 'required|digits:10',  
    ]);

    
    if ($validate->fails()) {
        $errors = implode(", ", $validate->errors()->all());
        return response()->json([
            'status' => false,
            'message' => 'Login Failed: ' . $errors
        ], 200);
    }

     
    $user = DB::table('user_profile')
        ->where('phone', $request->get('phone'))
        ->first();

    if ($user == null) {
        return response()->json([
            'status' => 0,  
            'success' => false,
            'message' => 'Mobile number not matching.'
        ]);
    }

    
////////////////// ACTIVE AND INACTIVE USER CHECK ///////////////////
    if ($user->status != 1) {  
        return response()->json([
            'status' => 2,  
            'success' => true,
            'message' => 'User is not authorized to log in',
        ], 200);
    } else {
        
        return response()->json([
            'user_id' => $user->id,
            'status' => 1,  
            'success' => true,
            'message' => 'Login successfully.',
        ]);
    }
}

 

///////////////////////VEG MODE////////////////////////////
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
   
   
 
///////////////////////UPDATE  PROFILE////////////////////////
//     public function update_profile(Request $request)
//     { 
//     $validator = Validator::make($request->all(), [
//         'id' => 'required|exists:user_profile,id',  
//         'name' => 'nullable|string|max:255',
//         'phone' => 'nullable|string|max:15',
//         'email' => 'nullable|email|max:255',
//         'dob' => 'nullable|date',
//         'anniversary' => 'nullable|date',
//         'gender' => 'nullable|string|in:male,female,other',
//         'profile_images'=>'required'
        
//     ]);

//     if ($validator->fails()) {
//         return response()->json([
//             'status' => false,
//             'message' => 'Validation Failed: ' . implode(', ', $validator->errors()->all()),
//         ], 400);
//     }
 
//     $data = $request->only(['name', 'phone', 'email', 'dob', 'anniversary', 'gender']);
//     $data = array_filter($data, function ($value) {
//         return $value !== null;
//     });

//         $uploadImage = function ($base64Image) {
//         $imageName = Str::random(20) . '.png';
//         $imagePath = public_path('uploads') . '/' . $imageName; 
//         if (file_put_contents($imagePath, base64_decode($base64Image))) {
//             return URL::to('/') . '/uploads/' . $imageName;
//         }
//         return null;
//      };

//         $profile_image = $uploadImage($request->input('profile_image'));
//         if (!$profile_image) {
//         return response()->json([
//             'success' => false,
//             'message' => 'Failed to save one or more images.',
//         ], 500);
//     }
 
//           $updated = DB::table('user_profile')
//         ->where('id', $request->input('id'))
//         ->update($data);

//     if ($updated) {
//         return response()->json([
//             'status' => true,
//             'message' => 'Profile updated successfully',
//         ], 200);
//     }else{
//         return response()->json([
//             'status' => false,
//             'message' => 'No changes were made or ID not found',
//         ], 200);
//     }
//   }
 
//   public function update_profile(Request $request)
//     { 
//     $validator = Validator::make($request->all(), [
//         'id' => 'required|exists:user_profile,id', 
//         'name' => 'nullable|string|max:255',
//         'phone' => 'nullable|string|max:15',
//         'email' => 'nullable|email|max:255',
//         'dob' => 'nullable|date',
//         'anniversary' => 'nullable|date',
//         'gender' => 'nullable|string|in:male,female,other',
//         'profile_images'=>'required'
//     ]);

//     if ($validator->fails()) {
//         return response()->json([
//             'status' => false,
//             'message' => 'Validation Failed: ' . implode(', ', $validator->errors()->all()),
//         ], 400);
//     }
 
//     $data = $request->only(['name', 'phone', 'email', 'dob', 'anniversary', 'gender']);
//     $data = array_filter($data, function ($value) {
//         return $value !== null;
//     });


//         $uploadImage = function ($base64Image) {
//         $imageName = Str::random(20) . '.png';
//         $imagePath = public_path('uploads') . '/' . $imageName; 
//         if (file_put_contents($imagePath, base64_decode($base64Image))) {
//             return URL::to('/') . '/uploads/' . $imageName;
//         }
//         return null;
//      };

//         $profile_image = $uploadImage($request->input('profile_image'));
//         if (!$profile_image) {
//         return response()->json([
//             'success' => false,
//             'message' => 'Failed to save one or more images.',
//         ], 500);
//     }
   
//           $updated = DB::table('user_profile')
//         ->where('id', $request->input('id'))
//         ->update($data);

//     if ($updated) {
//         return response()->json([
//             'status' => true,
//             'message' => 'Profile updated successfully',
//         ], 200);
//     }else{
//         return response()->json([
//             'status' => false,
//             'message' => 'No changes were made or ID not found',
//         ], 200);
//      }
//   }


 public function update_profile(Request $request)
{ 
    $validator = Validator::make($request->all(), [
        'id' => 'required|exists:user_profile,id', 
        'name' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:15',
        'email' => 'nullable|email|max:255',
        'dob' => 'nullable|date',
        'anniversary' => 'nullable',
        'gender' => 'nullable|string|in:male,female,other',
        'profile_image' => 'nullable|string', 
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'message' => 'Validation Failed: ' . implode(', ', $validator->errors()->all()),
        ], 400);
    }

    $data = $request->only(['name', 'phone', 'email', 'dob', 'anniversary', 'gender']);
    $data = array_filter($data, function ($value) {
        return $value !== null;
    });

  
    $uploadImage = function ($base64Image) {
        $imageName = Str::random(20) . '.';
        $imagePath = public_path('uploads') . '/' . $imageName; 
        if (file_put_contents($imagePath, base64_decode($base64Image))) {
            return URL::to('/') . '/uploads/' . $imageName;
        }
        return null;
    };
//   dd($uploadImage);
   
    if ($request->has('profile_image')) {
        $profile_image = $uploadImage($request->input('profile_image'));
        if ($profile_image) {
            $data['profile_image'] = $profile_image;  
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to save the image.',
            ], 500);
        }
    }
// dd($uploadImage);
    $updated = DB::table('user_profile')
        ->where('id', $request->input('id'))
        ->update($data);
 
    if ($updated) {
        return response()->json([
            'status' => true,
            'message' => 'Profile updated successfully',
        ], 200);
    } else {
        return response()->json([
            'status' => false,
            'message' => 'No changes were made or ID not found',
        ], 200);
    }
}


 
////////////////////USER PROFILE////////////////////////
  public function user_profile($id){ 
         $users = DB::table('user_profile')
        ->select('*') 
        ->where('id', $id) 
        ->first(); 
  
        if (empty($users)) {
            return response()->json([
                'status' => false,  
                'error' => 'user not found'
            ], 200);
        }else{
            return response()->json([
            'data'=>$users, 
            'status'=> true,
            'message' => 'success .',
        ], 200);
        }
    }

}
    

