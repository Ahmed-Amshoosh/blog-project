@extends('layouts.dashboard')

@section('content')




    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Doctors</h3>

                </div>
            </div>
        </div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message')}}
            </div>
        @endif

        <div class="student-group-form">
            <form action="{{route('admin.doctors')}}" method="get">
                 <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="form-group">
                        <input type="text" name="ser_by_name" class="form-control" placeholder="Search by Name ...">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="form-group">
                        <input type="text" name="ser_by_depar" class="form-control" placeholder="Search by Department ...">
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="search-student-btn">
                        <button type="btn" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">

                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Teachers</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">

                                    <a href="{{route('admin.add_doctor')}}" class="btn btn-primary"><i
                                            class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        @if($word)
                            <h6 class="text-center">Serach For {{$word}}</h6>
                        @endif

                        <div class="table-responsive">
                            <table
                                class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>age</th>
                                    <th>gender</th>
                                    <th>joining_date</th>
                                    <th>qualification</th>
                                    <th>department</th>
                                    <th>experience</th>
                                    <th>phone</th>
                                    <th>ctiy</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($doctors as $doctor)
                                    <tr>
                                        <td>{{$doctor->id}}</td>

                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="teacher-details.html"
                                                   class="avatar avatar-sm me-2"><img
                                                        class="avatar-img rounded-circle"
                                                        src="/images/doctor/{{$doctor->image}}"
                                                        alt="User Image"></a>
                                                <a href="teacher-details.html">{{$doctor->name}}</a>
                                            </h2>
                                        </td>
                                        <td>{{$doctor->age}}</td>
                                        <td>{{$doctor->gender}}</td>
                                        <td>{{$doctor->joining_date}}</td>
                                        <td>{{$doctor->qualification}}</td>
                                        <td>{{$doctor->department}}</td>
                                        <td>{{$doctor->experience}}</td>
                                        <td>{{$doctor->phone}}</td>
                                        <td>{{$doctor->ctiy}}</td>
                                        <td class="text-end">
                                            <div class="actions">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-sm bg-success-light me-2">
                                                    <i class="feather-trash"></i>
                                                </a>
                                                <a href="{{route('admin.show_doctor',$doctor->id)}}" class="btn btn-sm bg-success-light me-2">
                                                    <i class="feather-eye"></i>
                                                </a>
                                                <a href="{{route('admin.edit_doctor',$doctor->id)}}" class="btn btn-sm bg-danger-light">
                                                    <i class="feather-edit"></i>
                                                </a>
{{--                                                <a href="#" class="text-danger" data-bs-toggle="modal"--}}
{{--                                                   data-bs-target="#deleteModal"><i class="feather-trash"></i>--}}
{{--                                                    Delete</a>--}}
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade contentmodal" id="deleteModal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content doctor-profile">
                                                <div class="modal-header pb-0 border-bottom-0  justify-content-end">
                                                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close"><i
                                                            class="feather-x-circle"></i></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="delete-wrap text-center">
                                                        <div class="del-icon"><i class="feather-x-circle"></i></div>
                                                        <h2>Sure you want to delete</h2>
                                                        <div class="submit-section">
                                                            <a href="{{route('admin.delete_doctor',$doctor->id)}}" class="btn btn-success me-2">Yes</a>
                                                            <a href="#" class="btn btn-danger" data-bs-dismiss="modal">No</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                                </tbody>
                            </table>
                            <div class="mt-2">
                                {{$doctors->links('pagination::bootstrap-5')}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection

