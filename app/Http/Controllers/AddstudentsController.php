<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\Http\Requests;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
Session_start();

class AddstudentsController extends Controller
{
   public function addstudent(){
       return view('admin.addstudent');
   }

   public function savestudent(REQUEST $request){
    
    $data = array();
          $data['student_name']=$request->student_name;
          $data['student_roll']=$request->student_roll;
          $data['student_email']=$request->student_email;
          $data['student_fathername']=$request->student_fathername;
          $data['student_mothername']=$request->student_mothername;
          $data['student_phone']=$request->student_phone;
          $data['student_password']=$request->student_password;
          $data['student_address']=$request->student_address;
          $data['student_admitionyear']=$request->student_admitionyear;
          $data['student_department']=$request->student_department;
          $image=$request->file('student_image');

          if($image){
              $image_name=str_random(20);
              $ext=strtolower($image->getClientOriginalExtension());
              $image_full_name=$image_name.'.'.$ext;
              $upload_path='image/';
              $image_url=$upload_path.$image_full_name;
              $success=$image->move($upload_path,$image_full_name);

              if($success){
                  $data['student_image']=$image_url;

                  DB::table('student_tbl')->insert($data);
                  Session::put('exception','Student added successfullu!');
                  return Redirect::to('/addstudent');
              }
          }
          $data['image']=$image_url;
                 DB::table('student_tbl')->insert($data);
                 Session::put('exception','Student added successfullu!');
                 return Redirect::to('/addstudent');

                 DB::table('student_tbl')->insert($data);
                 Session::put('exception','Student added successfullu!');
                 return Redirect::to('/addstudent');
  }
}
