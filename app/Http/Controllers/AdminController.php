<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
Session_start();

class AdminController extends Controller
{
    public function admin_dashboard(){
        return view('admin.dashboard');
    }

/// student login here
// public function student_dashboard(){
//     return view('student.dashboard');
// }

// view profile
public function profile(){
    return view('admin.profile');
}

// view setting thats means update password
public function setting(){
    return view('admin.setting');
}

// view setting thats means update password of student
public function studentsetting(){
    $student_id=Session::get('student_id');
    $student_description_view=DB::table('student_tbl')
    ->select('*')
    ->where('student_id', $student_id)
    ->first();

    // echo "</pre>";
    // print_r($student_description_view);

    $manage_discription_student=view('student.studentsetting')
    ->with('student_description_profile',$student_description_view);
    /// student_description_profile    diya studentview page name show kora hoy
    return view('student_layout')
        ->with('studentedit',$manage_discription_student);
}

// admin logout
public function logout(){
    Session::put('admin_id',null);
    Session::put('admin_name',null);

    return Redirect::to('/backend');
}

// student logout
public function studentlogout(){
    Session::put('admin_id',null);
    Session::put('admin_name',null);

    return Redirect::to('/');
}

// login dashboard for admin
    public function login_dashboard(Request $request)
     {
        // return view('admin.dashboard');
        $email = $request->admin_email;
        $password = md5($request->admin_password);
        $result = DB::table('admin_tbl')
        ->where('admin_email', $email)
        ->where('admin_password', $password)
        ->first();

        // echo "</pre>";
        // print_r($result);
        if($result){
            // echo "wellcome";
         Session::put('admin_email',$result->admin_email);
         Session::put('admin_id',$result->admin_email);
            return Redirect::to('/admin_dashboard');
        } else{
            Session::put('exception','Email or password invalid!');
            return Redirect::to('/backend');
        }
     }

     // login dashboard for student
    public function studentlogindashboard(Request $request)
    {
       // return view('student.dashboard');
       $email = $request->student_email;
       $password = $request->student_password;
       $result = DB::table('student_tbl')
       ->where('student_email', $email)
       ->where('student_password', $password)
       ->first();

    //    echo "</pre>";
    //    print_r($result);
       if($result){
           // echo "wellcome";
        Session::put('student_email',$result->student_email);
        Session::put('student_id',$result->student_id);
        //    return Redirect::to('/student_dashboard'); 
        return view('student.dashboard'); // aivabe use korle student_dashboard controller banan lage na
       } else{
           Session::put('exception','Email or password invalid!');
           return Redirect::to('/');
       }
    }
}
?>