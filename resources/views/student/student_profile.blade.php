@extends('student_layout')
@section('content')

<div class="row user-profile">
            <div class="col-lg-12 side-left">
              <div class="card mb-4">
                <div class="card-body avatar">
                  <h2 class="card-title">My Info</h2>
                  <img src="{{URL::to($student_description_profile->student_image)}}" height="80" width="100">
                  <p class="name">{{$student_description_profile->student_name}}</p>
                  <p class="designation">-{{$student_description_profile->student_roll}} -</p>
                  <a class="email" href="#">{{$student_description_profile->student_email}}</a>
                  <a class="number" href="#">{{$student_description_profile->student_phone}}</a>
                </div>
              </div>
              <div class="card mb-4">
                <div class="card-body overview">
                  <ul class="achivements">
                    <li><p>34</p><p>Projects</p></li>
                    <li><p>23</p><p>Task</p></li>
                    <li><p>29</p><p>Completed</p></li>
                  </ul>
                  <div class="wrapper about-user">
                    <h2 class="card-title mt-4 mb-3">About</h2>
                    <p>The totla students informatin is given bellow. It will help to know the students details. </p>
                  </div>
                  <div class="info-links">
                    <a class="website">
                      <i class="icon-globe icon">Father name: </i>
                      <span>{{$student_description_profile->student_fathername}}</span>
                    </a>
                    <a class="social-link">
                      <i class="icon-social-facebook icon">Mother name: </i>
                      <span>{{$student_description_profile->student_mothername}}</span>
                    </a>
                    <a class="social-link">
                      <i class="icon-social-facebook icon">Department: </i>
                      <span>{{$student_description_profile->student_department}}</span>
                    </a>
                    <a class="social-link">
                      <i class="icon-social-facebook icon">Addmition year: </i>
                      <span>{{$student_description_profile->student_admitionyear}}</span>
                    </a>
                    <a class="social-link">
                      <i class="icon-social-facebook icon">Address: </i>
                      <span>{{$student_description_profile->student_address}}</span>
                    </a>
                    <a class="social-link" href="#">
                      <i class="icon-social-linkedin icon"></i>
                      <span>https://www.linkedin.com/johndoe</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            
          </div>

@endsection