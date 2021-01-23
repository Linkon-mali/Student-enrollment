<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CSEController extends Controller
{
    public function cse(){
        // return view('admin.cse');

        $csestudent_info=DB::table('student_tbl')
        ->where(['student_department'=>'CSE'])
        ->get();

        // echo "</pre>";
        // print_r($csestudent_info);


       $manage_student=view('admin.cse')
        ->with('csestudent_info', $csestudent_info);
       return view('layout')
        ->with('cse', $manage_student);
       
    }
}
