<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\Http\Requests;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
Session_start();

class AllstudentsController extends Controller
{
    public function allstudent(){
        // return view('admin.allstudent');

        $allstudent_info=DB::table('student_tbl')
         ->get();
        $manage_student=view('admin.allstudent')
         ->with('allstudent_info', $allstudent_info);
        return view('layout')
         ->with('allstudent', $manage_student);
    }
// student delete method
    public function studentdelet($student_id){
       
        DB::table('student_tbl')
          ->where('student_id',$student_id)
          ->delete();
          
          return Redirect::to('/allstudent');
    }

// student view method

    public function studentview($student_id){
       
        $student_description_view=DB::table('student_tbl')
            ->select('*')
            ->where('student_id', $student_id)
            ->first();
        
        // echo "</pre>";
        // print_r($student_description_view);

        $manage_discription_student=view('admin.studentview')
          ->with('student_description_profile',$student_description_view);
/// student_description_profile    diya studentview page name show kora hoy
          return view('layout')
              ->with('studentview',$manage_discription_student);

   }

   /// student edit controller

   public function studentedit($student_id){
        $student_description_view=DB::table('student_tbl')
        ->select('*')
        ->where('student_id', $student_id)
        ->first();

        // echo "</pre>";
        // print_r($student_description_view);

        $manage_discription_student=view('admin.studentedit')
        ->with('student_description_profile',$student_description_view);
        /// student_description_profile    diya studentview page name show kora hoy
        return view('layout')
            ->with('studentedit',$manage_discription_student);
   }
// update student here
    public function studentupdate(Request $request, $student_id){

        //  echo "</pre>";
        // print_r($student_id);

        $data=array();
        $data['student_name']=$request->student_name;
        $data['student_roll']=$request->student_roll;
        $data['student_email']=$request->student_email;
        $data['student_fathername']=$request->student_fathername;
        $data['student_mothername']=$request->student_mothername;
        $data['student_phone']=$request->student_phone;
        $data['student_address']=$request->student_address;
        $data['student_password']=$request->student_password;
        $data['student_admitionyear']=$request->student_admitionyear;

        DB::table('student_tbl')
          ->where('student_id',$student_id)
          ->update($data);

        Session::put('exception', 'Student update successfully!');
        return Redirect::to('/allstudent');
    }
////// student siter profile

    public function studentprofile(){
        $student_id=Session::get('student_id');
            $student_description_view=DB::table('student_tbl')
                ->select('*')
                ->where('student_id', $student_id)
                ->first();
            
            // echo "</pre>";
            // print_r($student_description_view);
    
            $manage_discription_student=view('student.student_profile')
              ->with('student_description_profile',$student_description_view);
    /// student_description_profile    diya studentview page name show kora hoy
              return view('student_layout')
                  ->with('student_profile',$manage_discription_student);
    
       

    }

    // update student here
    public function studentownupdate(Request $request){

        $student_id=Session::get('student_id');

         echo "</pre>";
        print_r($student_id);


        $data=array();
        $data['student_name']=$request->student_name;
        $data['student_phone']=$request->student_phone;
        $data['student_password']=$request->student_password;
       

        DB::table('student_tbl')
          ->where('student_id',$student_id)
          ->update($data);

        Session::put('exception', 'Student update successfully!');
        return Redirect::to('/student_setting');
    }

}
