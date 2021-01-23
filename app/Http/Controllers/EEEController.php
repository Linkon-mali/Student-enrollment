<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EEEController extends Controller
{
    public function eee(){
        // return view('admin.eee');

        $eeestudent_info=DB::table('student_tbl')
        ->where(['student_department'=>'EEE'])
        ->get();

        // echo "</pre>";
        // print_r($csestudent_info);


       $manage_student=view('admin.eee')
        ->with('eeestudent_info', $eeestudent_info);
       return view('layout')
        ->with('eee', $manage_student);
    }
}
