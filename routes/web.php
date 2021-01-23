<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// logout
Route::get('/logout','AdminController@logout');
Route::get('/student_logout','AdminController@studentlogout');

Route::get('/', function () {
    return view('student_login');
});

Route::get('/backend', function () {
    return view('admin.admin_login');
});

// admin login....
Route::post('/adminlogin','AdminController@login_dashboard');
Route::post('/studentlogin','AdminController@studentlogindashboard');

Route::get('/admin_dashboard','AdminController@admin_dashboard');
Route::get('/student_dashboard','AdminController@student_dashboard');

Route::get('/profile','AdminController@profile');
Route::get('/setting','AdminController@setting');
Route::get('/student_setting','AdminController@studentsetting');

// students
Route::get('/addstudent','AddstudentsController@addstudent');
Route::post('/savestudent','AddstudentsController@savestudent');
Route::get('/studentdelet/{student_id}','AllstudentsController@studentdelet');
Route::get('/studentview/{student_id}','AllstudentsController@studentview');
Route::get('/studentedit/{student_id}','AllstudentsController@studentedit');
Route::post('/update_student/{student_id}','AllstudentsController@studentupdate');
Route::get('/student_profile','AllstudentsController@studentprofile');
Route::post('/student_own_update','AllstudentsController@studentownupdate');

// all page route 
Route::get('/allstudent','AllstudentsController@allstudent');
Route::get('/tutionfee','TutionController@tution');
Route::get('/cse','CSEController@cse');
Route::get('/bba','BBAController@bba');
Route::get('/eee','EEEController@eee');
Route::get('/ece','ECEController@ece');
Route::get('/mba','MBAController@mba');

Route::get('/allteacher','TeacherController@allteacher');
Route::get('/addteacher','TeacherController@addteacher');
Route::post('/save_teacher','TeacherController@saveteacher');


