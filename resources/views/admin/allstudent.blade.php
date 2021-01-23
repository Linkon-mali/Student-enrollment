@extends('layout')
@section('content')

<div class="content">
          <h1 class="page-title">Data table</h1>

          <p class="alert-success"><?php 
                            $exception=Session::get('exception');
                                if($exception){
                                echo $exception;
                                Session::put('exception',null);
                                }
                            ?></p>

          <div class="card">
            <div class="card-body">
              <h2 class="card-title">Data table</h2>
              <div class="row">
                <div class="col-12">
                  <table id="order-listing" class="table table-striped" style="width:100%;">
                    <thead>
                       <tr>
                          <th>Roll</th>
                          <th>Name</th>
                          <th>Phone</th>
                          <th>Image</th>
                          <th>Address</th>
                          <th>Department</th>
                          <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($allstudent_info as $v_student)
                      <tr>
                          <td>{{$v_student->student_roll}}</td>
                          <td>{{$v_student->student_name}}</td>
                          <td>{{$v_student->student_phone}}</td>
                          <td><img src="{{URL::to($v_student->student_image)}}" height="80" width="100"></td>
                          <td>{{$v_student->student_address}}</td>
                          <td>{{$v_student->student_department}}</td>
                          <td>
                            <a href="{{URL::to('/studentedit/'.$v_student->student_id)}}"><button class="btn btn-outline-primary">Edit</button></a>
                            <a href="{{URL::to('/studentview/'.$v_student->student_id)}}"><button class="btn btn-outline-primary">View</button></a>
                            <a href="{{URL::to('/studentdelet/'.$v_student->student_id)}}"><button class="btn btn-outline-danger">Delet</button></a>
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection