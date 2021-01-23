<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MBAController extends Controller
{
    public function mba(){
        // return view('admin.mba');

        $mbastudent_info=DB::table('student_tbl')
        ->where(['student_department'=>'MBA'])
        ->get();

        // echo "</pre>";
        // print_r($csestudent_info);


       $manage_student=view('admin.mba')
        ->with('mbastudent_info', $mbastudent_info);
       return view('layout')
        ->with('mba', $manage_student);
    }
}
