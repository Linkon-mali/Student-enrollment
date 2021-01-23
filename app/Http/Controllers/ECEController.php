<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ECEController extends Controller
{
    public function ece(){
        // return view('admin.ece');

        
        $ecestudent_info=DB::table('student_tbl')
        ->where(['student_department'=>'ECE'])
        ->get();

        // echo "</pre>";
        // print_r($csestudent_info);


       $manage_student=view('admin.ece')
        ->with('ecestudent_info', $ecestudent_info);
       return view('layout')
        ->with('ece', $manage_student);
    }
}
