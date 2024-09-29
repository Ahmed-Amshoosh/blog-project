@extends('layouts.dashboard')

@section('content')

<div class="content container-fluid">

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm-12">
                <div class="page-sub-header">
                    <h3 class="page-title">Add Appoitment</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message')}}
            </div>
        @endif
        <div class="col-sm-12">
            <div class="card comman-shadow">
                <div class="card-body">
                    <form method="post" action="{{route('admin.create_appointment')}}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title student-info">Student Information <span><a
                                            href="javascript:;"><i
                                                class="feather-more-vertical"></i></a></span></h5>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>First Name <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" name="fname" placeholder="Enter First Name">
                                    <div class="text-danger">
                                        {{$errors->first('fname')}}
                                    </div>
                                </div>
                            </div>
{{--                            <div class="col-12 col-sm-4">--}}
{{--                                <div class="form-group local-forms">--}}
{{--                                    <label>Last Name <span class="login-danger">*</span></label>--}}
{{--                                    <input class="form-control" type="text" name="lname" placeholder="Enter Last Name">--}}

{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Gender <span class="login-danger">*</span></label>
                                    <select class="form-control select"  name="gender">

                                        <option selected>Select Gender</option>
                                        <option value="female">Female</option>
                                        <option value="male">Male</option>
                                    </select>

                                    <div class="text-danger">
                                        {{$errors->first('gender')}}
                                    </div>

                                </div>
                                <div class="text-danger">
                                    {{$errors->first('gender')}}
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms ">
                                    <label>Age <span class="login-danger">*</span></label>
                                    <input class="form-control datetimepicker" type="text"
                                           placeholder="Your Age" name="age">
                                    <div class="text-danger">
                                        {{$errors->first('age')}}
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Department <span class="login-danger">*</span></label>
                                    <select class="form-control select" name="depart">
                                        <option>Please Select Department </option>
                                        @foreach($departs as $depart)
                                            <option value="{{$depart->name}}">{{$depart->name}}</option>
                                        @endforeach


                                    </select>
                                    <div class="text-danger">
                                        {{$errors->first('depart')}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Select Doctor <span class="login-danger">*</span></label>
                                    <select class="form-control select" name="doctor">
                                        <option>Please Select Doctor </option>
                                        @foreach($doctors as $doctor)
                                            <option value="{{$doctor->name}}">{{$doctor->name}}</option>
                                        @endforeach


                                    </select>
                                    <div class="text-danger">
                                        {{$errors->first('doctor')}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms ">
                                    <label>Date <span class="login-danger">*</span></label>
                                    <input class="form-control" type="date"
                                           placeholder="Enter Phone Number" name="date">
                                    <div class="text-danger">
                                        {{$errors->first('date')}}
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Phone <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text"
                                           placeholder="Enter Phone Number" name="phone">
                                    <div class="text-danger">
                                        {{$errors->first('phone')}}
                                    </div>
                                </div>

                            </div>


                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Adderss  </label>
                                    <input class="form-control" type="text"
                                           placeholder="Enter Address" name="address">
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="student-submit">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
