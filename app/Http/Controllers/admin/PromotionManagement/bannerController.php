<?php

namespace App\Http\Controllers\admin\PromotionManagement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Validator;

class bannerController extends Controller
{
    
  public function benners(){ 
    $user_id=session::get('id');
    $data=DB::table('slider')->get();
    if(!empty($user_id)){
        return view('/admin.Promotion Management.banner',['datas'=>$data]);
    }else{
        return redirect('/login');
    }
  }
   
   
 ////////ADD BANNER///////////
public function add_banner(Request $request)
{ 
    $validate = Validator::make($request->all(), [
        'title' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'images' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048', // Ensure valid file type and size
    ]);

    if ($validate->fails()) {
        return back()->withErrors($validate)->withInput();
    }

    // Check if image is uploaded
    if ($request->hasFile('images')) {
        $imageFile = $request->file('images');
        $publicPath = 'uploads';
        $imageFileName = time() . '_' . $imageFile->getClientOriginalName();
        $imageFile->move(public_path($publicPath), $imageFileName);

        $images = url($publicPath . '/' . $imageFileName);

        // Insert data into the database
        DB::table('slider')->insert([
            'title' => $request->input('title'),
            'type' => $request->input('type'),
            'images' => $images,
        ]);

        return redirect()->back()->with('success', 'Banner added successfully!');
    } else {
        return redirect()->back()->with('error', 'Image upload failed.');
    }
}


///////DELETE BANNER/////

public function banner_delete(String $id){
   
    DB::table('slider')->where('id', $id)->delete(); 
    return redirect('/benner')->with('success', 'Banner deleted successfully!');
}



///////////////UPDATE BANNER//////////////
      public function update_banner(Request $request, $id)
       { 
         $validated = $request->validate([
        'title' => 'required',
        'type' => 'required',
        'images'=>'required',
        
     ]);
 
  if ($request->hasFile('images')) {
        $imageFile = $request->file('images');
        $publicPath = 'uploads';
        $imageFileName = time() . '_' . $imageFile->getClientOriginalName();
        $imageFile->move(public_path($publicPath), $imageFileName); 
        $images = url($publicPath . '/' . $imageFileName);
        
  }
    $data=DB::table('slider') 
        ->where('slider.id', $id)
        ->update([
          'title'=>$request->input('title'),
          'type'=>$request->input('type'),
          'images'=>$images
        ]); 
     return redirect()->back()->with('success', 'updated successfully.');
    }  
 }