@extends('layouts.dashboard')

@section('content')

    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Edit Appoitment</h3>
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
                        <form method="post" action="{{route('admin.update_appointment',$appoint->id)}}">
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
                                        <input class="form-control" type="text" name="fname" value="{{$appoint->name}}" placeholder="Enter Full Name">
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

                                            <option >Select Gender</option>
                                            <option value="female" @if($appoint->gender == 'female') selected @endif>Female</option>
                                            <option value="male" @if($appoint->gender == 'male') selected @endif>Male</option>
                                        </select>

                                        <div class="text-danger">
                                            {{$errors->first('gender')}}
                                        </div>

                                    </div>

                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms ">
                                        <label>Age <span class="login-danger">*</span></label>
                                        <input class="form-control datetimepicker" value="{{$appoint->age}}" type="text"
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
                                            <option value="neurologists" @if($appoint->depart == 'neurologists') selected @endif>Neurologists</option>
                                            <option value="eyes" @if($appoint->depart == 'eyes') selected @endif>Eyes</option>
                                            <option value="bones" @if($appoint->depart == 'bones') selected @endif>Bones</option>
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
                                            <option>Please Select Group </option>
                                            <option value="D.Ahmed" @if($appoint->doctor == 'D.Ahmed') selected @endif>D.Ahmed</option>
                                            <option value="D.Mohammed" @if($appoint->doctor == 'D.Mohammed') selected @endif>D.Mohammed</option>
                                            <option value="D.Amshoosh" @if($appoint->doctor == 'D.Amshoosh') selected @endif>D.Amshoosh</option>
                                        </select>
                                        <div class="text-danger">
                                            {{$errors->first('doctor')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms ">
                                        <label>Date <span class="login-danger">*</span></label>
                                        <input class="form-control" type="date" value="{{$appoint->date}}"
                                               placeholder="Enter Phone Number" name="date">
                                        <div class="text-danger">
                                            {{$errors->first('date')}}
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Phone <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" value="{{$appoint->phone}}"
                                               placeholder="Enter Phone Number" name="phone">
                                        <div class="text-danger">
                                            {{$errors->first('phone')}}
                                        </div>
                                    </div>

                                </div>


                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Adderss  </label>

                                        <input class="form-control" type="text" value="{{$appoint->address}}"
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
