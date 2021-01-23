<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\Http\Requests;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
Session_start();

class TeacherController extends Controller
{
    public function allteacher(){
        // return view('admin.allstudent');

        $allteachers_info=DB::table('teachers_tbl')
         ->get();
        $manage_teacher=view('admin.allteacher')
         ->with('allteachers_info', $allteachers_info);
        return view('layout')
         ->with('allteacher', $manage_teacher);
    }
////////
    public function addteacher(){
        return view('admin.addteacher');
    }

/////
public function saveteacher(REQUEST $request){
    
    $data = array();
          $data['teachers_name']=$request->teachers_name;
          $data['teachers_phone']=$request->teachers_phone;
          $data['teachers_address']=$request->teachers_address;
          $data['teachers_department']=$request->teachers_department;

          $image=$request->file('teachers_image');

          if($image){
              $image_name=str_random(20);
              $ext=strtolower($image->getClientOriginalExtension());
              $image_full_name=$image_name.'.'.$ext;
              $upload_path='image/';
              $image_url=$upload_path.$image_full_name;
              $success=$image->move($upload_path,$image_full_name);

              if($success){
                  $data['teachers_image']=$image_url;

                  DB::table('teachers_tbl')->insert($data);
                  Session::put('exception','Teacher added successfullu!');
                  return Redirect::to('/addteacher');
              }
          }
          $data['image']=$image_url;
                 DB::table('teachers_tbl')->insert($data);
                 Session::put('exception','Teacher added successfullu!');
                 return Redirect::to('/addteacher');

                 DB::table('teachers_tbl')->insert($data);
                 Session::put('exception','Teacher added successfullu!');
                 return Redirect::to('/addteacher');
  }

}
