<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BBAController extends Controller
{
    public function bba(){
        // return view('admin.bba');

        $bbastudent_info=DB::table('student_tbl')
        ->where(['student_department'=>'BBA'])
        ->get();

        // echo "</pre>";
        // print_r($csestudent_info);


       $manage_student=view('admin.bba')
        ->with('bbastudent_info', $bbastudent_info);
       return view('layout')
        ->with('bba', $manage_student);   $bbastudent_info=DB::table('student_tbl')
        ->where(['student_department'=>'BBa'])
        ->get();

        // echo "</pre>";
        // print_r($csestudent_info);


       $manage_student=view('admin.bba')
        ->with('bbastudent_info', $bbastudent_info);
       return view('layout')
        ->with('bba', $manage_student);
    }
}
