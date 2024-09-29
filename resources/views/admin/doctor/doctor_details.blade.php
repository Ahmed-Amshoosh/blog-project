
@extends('layouts.dashboard')


@section('content')


<div class="content container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-sub-header">
                    <h3 class="page-title">{{$doctor->name}} Details</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="about-info">
                        <h4>Profile <span><a href="javascript:;"><i
                                        class="feather-more-vertical"></i></a></span></h4>
                    </div>
                    <div class="student-profile-head">

                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="profile-user-box">
                                    <div class="profile-user-img">
                                        <img src="/images/doctor/{{$doctor->image}}" alt="Profile">

                                    </div>
                                    <div class="names-profiles">
                                        <h4>{{$doctor->name}}</h4>
                                        <h5>{{$doctor->department}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 d-flex align-items-center">
                                <div class="follow-group">
                                    <div class="students-follows">
                                        <h5 style="font-size: 17px;font-weight: 500;">Age</h5>
                                        <h5 style="font-size: 17px;color: black;font-weight: 500;">{{$doctor->age}}</h5>
                                    </div>
                                    <div class="students-follows">
                                        <h5 style="font-size: 17px;font-weight: 500;">Experience</h5>
                                        <h5 style="color: black;font-size: 17px;font-weight: 500;">{{$doctor->experience}}</h5>
                                    </div>
                                    <div class="students-follows">
                                        <h5 style="font-size: 17px;font-weight: 500;"> Ctiy</h5>
                                        <h5 style="color: black; font-size: 17px;font-weight: 500;">{{$doctor->ctiy}}</h5>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="student-personals-grp">
                        <div class="card">
                            <div class="card-body">
                                <div class="heading-detail">
                                    <h4>Personal Details :</h4>
                                </div>
                                <div class="personal-activity">
                                    <div class="personal-icons">
                                        <i class="feather-user"></i>
                                    </div>
                                    <div class="views-personal">
                                        <h4>Name</h4>
                                        <h5>{{$doctor->name}}</h5>
                                    </div>
                                </div>
                                <div class="personal-activity">
                                    <div class="personal-icons">
                                        <img src="{{asset('img/icons/buliding-icon.svg')}}" alt="">
                                    </div>
                                    <div class="views-personal">
                                        <h4>Department </h4>
                                        <h5>{{$doctor->department}}</h5>
                                    </div>
                                </div>
                                <div class="personal-activity">
                                    <div class="personal-icons">
                                        <i class="feather-phone-call"></i>
                                    </div>
                                    <div class="views-personal">
                                        <h4>Mobile</h4>
                                        <h5>{{$doctor->phone}}</h5>
                                    </div>
                                </div>
                                <div class="personal-activity">
                                    <div class="personal-icons">
                                        <i class="feather-mail"></i>
                                    </div>
                                    <div class="views-personal">
                                        <h4>Email</h4>
                                        <h5><a href="#" class="__cf_email__" data-cfemail="d4bebbb194b3b9b5bdb8fab7bbb9">{{auth()->user()->email}}</a>
                                        </h5>
                                    </div>
                                </div>
                                <div class="personal-activity">
                                    <div class="personal-icons">
                                        <i class="feather-user"></i>
                                    </div>
                                    <div class="views-personal">
                                        <h4>Gender</h4>
                                        <h5>{{$doctor->gender}}</h5>
                                    </div>
                                </div>
                                <div class="personal-activity">
                                    <div class="personal-icons">
                                        <i class="feather-calendar"></i>
                                    </div>
                                    <div class="views-personal">
                                        <h4>Date of Birth</h4>
                                        <h5>{{$doctor->date_of_birth}}</h5>
                                    </div>
                                </div>

                                <div class="personal-activity mb-0">
                                    <div class="personal-icons">
                                        <i class="feather-map-pin"></i>
                                    </div>
                                    <div class="views-personal">
                                        <h4>Address</h4>
                                        <h5>{{$doctor->address}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-8">
                    <div class="student-personals-grp">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="heading-detail">
                                    <h4>About Me</h4>
                                </div>
                                <div class="hello-park">
                                    <h5>Hello I am {{$doctor->name}}</h5>
                                    <p>{{$doctor->desc}}</p>
                                </div>
                                <div class="hello-park">
                                    <h5>Education</h5>

                                    <div class="educate-year">
                                        <h6>{{$doctor->qualification}}</h6>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
