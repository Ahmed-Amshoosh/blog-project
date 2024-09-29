
@extends('layouts.dashboard')


@section('content')

    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Add Doctors</h3>

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
                        <form action="{{route('admin.create_doctor')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Basic Details</span></h5>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Name <span class="login-danger">*</span></label>
                                        <input name="name" value="" type="text" class="form-control" placeholder="Enter Name">
                                        <div class="text-danger">
                                            {{$errors->first('name')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Age <span class="login-danger">*</span></label>
                                        <input name="age" type="number" class="form-control" placeholder="Enter Age">
                                        <div class="text-danger">
                                            {{$errors->first('age')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Gender <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
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
                                        <input class="form-control datetimepicker" name="date_of_birth" type="date"
                                               placeholder="DD-MM-YYYY">
                                        <div class="text-danger">
                                            {{$errors->first('date_of_birth')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Mobile <span class="login-danger">*</span></label>
                                        <input type="number" class="form-control" name="phone" placeholder="Enter Phone">
                                        <div class="text-danger">
                                            {{$errors->first('phone')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>Joining Date <span class="login-danger">*</span></label>
                                        <input class="form-control datetimepicker" name="joining_date" type="date"
                                               placeholder="DD-MM-YYYY">
                                        <div class="text-danger">
                                            {{$errors->first('joining_date')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 local-forms">
                                    <div class="form-group">
                                        <label>Qualification <span class="login-danger">*</span></label>
                                        <input class="form-control" name="qualification" type="text"
                                               placeholder="Enter Qualification">
                                        <div class="text-danger">
                                            {{$errors->first('qualification')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Experience <span class="login-danger">*</span></label>
                                        <input name="experience" class="form-control" type="text" placeholder="Enter Experience">
                                        <div class="text-danger">
                                            {{$errors->first('experience')}}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Department<span class="login-danger">*</span></label>
                                        <select class="form-control select" name="department">
                                            <option value="neurologists">Neurologists</option>
                                            <option value="eyes">Eyes</option>
                                            <option value="bones">Bones</option>
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
                                                Choose File <input type="file" name="image">
                                            </label>
                                            <div class="text-danger">
                                                {{$errors->first('image')}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <h5 class="form-title"><span>Login Details</span></h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Username <span class="login-danger">*</span></label>
                                        <input type="text" name="username" class="form-control" placeholder="Enter Username">
                                        <div class="text-danger">
                                            {{$errors->first('username')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Email ID <span class="login-danger">*</span></label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter Mail Id">
                                        <div class="text-danger">
                                            {{$errors->first('email')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Password <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" name="password" placeholder="Enter Password">
                                        <div class="text-danger">
                                            {{$errors->first('password')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Repeat Password <span class="login-danger">*</span></label>
                                        <input type="text" name="cinform_password" class="form-control" placeholder="Repeat Password">
                                        <div class="text-danger">
                                            {{$errors->first('cinform_password')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5 class="form-title"><span>Address</span></h5>
                                </div>
                                <div class="col-12">
                                    <div class="form-group local-forms">
                                        <label>Address <span class="login-danger">*</span></label>
                                        <input name="address" type="text" class="form-control" placeholder="Enter address">
                                        <div class="text-danger">
                                            {{$errors->first('address')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>City <span class="login-danger">*</span></label>
                                        <input name="ctiy" type="text" class="form-control" placeholder="Enter City">
                                        <div class="text-danger">
                                            {{$errors->first('ctiy')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>State <span class="login-danger">*</span></label>
                                        <input name="state" type="text" class="form-control" placeholder="Enter State">
                                        <div class="text-danger">
                                            {{$errors->first('state')}}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Country <span class="login-danger">*</span></label>
                                        <input name="country" type="text" class="form-control" placeholder="Enter Country">
                                        <div class="text-danger">
                                            {{$errors->first('country')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">

                                        <label>Description <span class="login-danger">*</span></label>
                                        <textarea name="desc"  class="form-control" placeholder="Enter Description" ></textarea>

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
