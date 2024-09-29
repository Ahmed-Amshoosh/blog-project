
@extends('layouts.dashboard')


@section('content')

    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Edit Doctors</h3>

                </div>
            </div>
        </div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message')}}
            </div>
        @endif

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.update_doctor',$doctor->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Basic Details</span></h5>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Name <span class="login-danger">*</span></label>
                                        <input  name="name" value="{{$doctor->name}}" type="text" class="form-control" placeholder="Enter Name">
                                        <div class="text-danger">
                                            {{$errors->first('name')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Age <span class="login-danger">*</span></label>
                                        <input value="{{$doctor->age}}" name="age" type="number" class="form-control" placeholder="Enter Age">
                                        <div class="text-danger">
                                            {{$errors->first('age')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Gender <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="gender">
                                            <option @if($doctor->gender == 'male') selected @endif value="male">Male</option>
                                            <option @if($doctor->gender == 'female') selected @endif value="female">Female</option>
                                            <option>Others</option>
                                        </select>
                                        <div class="text-danger">
                                            {{$errors->first('gender')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>Date Of Birth <span class="login-danger">*</span></label>
                                        <input value="{{$doctor->date_of_birth}}" class="form-control datetimepicker" name="date_of_birth" type="date"
                                               placeholder="DD-MM-YYYY">
                                        <div class="text-danger">
                                            {{$errors->first('date_of_birth')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Mobile <span class="login-danger">*</span></label>
                                        <input type="number" value="{{$doctor->phone}}" class="form-control" name="phone" placeholder="Enter Phone">
                                        <div class="text-danger">
                                            {{$errors->first('phone')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>Joining Date <span class="login-danger">*</span></label>
                                        <input value="{{$doctor->joining_date}}" class="form-control datetimepicker" name="joining_date" type="date"
                                               placeholder="DD-MM-YYYY">
                                        <div class="text-danger">
                                            {{$errors->first('joining_date')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 local-forms">
                                    <div class="form-group">
                                        <label>Qualification <span class="login-danger">*</span></label>
                                        <input value="{{$doctor->qualification}}" class="form-control" name="qualification" type="text"
                                               placeholder="Enter Qualification">
                                        <div class="text-danger">
                                            {{$errors->first('qualification')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Experience <span class="login-danger">*</span></label>
                                        <input value="{{$doctor->experience}}" name="experience" class="form-control" type="text" placeholder="Enter Experience">
                                        <div class="text-danger">
                                            {{$errors->first('experience')}}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Department<span class="login-danger">*</span></label>
                                        <select class="form-control select" name="department">
                                            <option value="neurologists" @if($doctor->department == 'neurologists') selected @endif>Neurologists</option>
                                            <option value="eyes" @if($doctor->department == 'eyes') selected @endif>Eyes</option>
                                            <option value="bones" @if($doctor->department == 'bones') selected @endif>Bones</option>
                                        </select>
                                        <div class="text-danger">
                                            {{$errors->first('department')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group students-up-files">
                                        <label>Upload Student Photo (150px X 150px)</label>
                                        <div class="uplod">
                                            <label class="file-upload image-upbtn mb-0">
                                                Choose File <input value="{{$doctor->image}}" type="file" name="image">


                                            </label>
                                            <img src="/images/doctor/{{$doctor->image}}" width="100" alt="">
                                            <div class="text-danger">
                                                {{$errors->first('image')}}
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <h5 class="form-title"><span>Address</span></h5>
                                </div>
                                <div class="col-12">
                                    <div class="form-group local-forms">
                                        <label>Address <span class="login-danger">*</span></label>
                                        <input value="{{$doctor->address}}" name="address" type="text" class="form-control" placeholder="Enter address">
                                        <div class="text-danger">
                                            {{$errors->first('address')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>City <span class="login-danger">*</span></label>
                                        <input value="{{$doctor->ctiy}}" name="ctiy" type="text" class="form-control" placeholder="Enter City">
                                        <div class="text-danger">
                                            {{$errors->first('ctiy')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>State <span class="login-danger">*</span></label>
                                        <input value="{{$doctor->state}}" name="state" type="text" class="form-control" placeholder="Enter State">
                                        <div class="text-danger">
                                            {{$errors->first('state')}}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Country <span class="login-danger">*</span></label>
                                        <input value="{{$doctor->country}}" name="country" type="text" class="form-control" placeholder="Enter Country">
                                        <div class="text-danger">
                                            {{$errors->first('country')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">

                                    <label>Description <span class="login-danger">*</span></label>
                                    <textarea  name="desc"  class="form-control" placeholder="Enter Description" >
                                        {{$doctor->desc}}
                                    </textarea>

                                </div>

                                <div class="col-12" style="margin-top: 20px">
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
