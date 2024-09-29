@extends('layouts.dashboard')

@section('content')




    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Appoitments</h3>

                    </div>
                </div>
            </div>
        </div>

        <div class="student-group-form">

                <form action="{{route('admin.appointments')}}" method="get">
                    <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="form-group">
                        <input type="text" name="search_by_name" class="form-control" placeholder="Search by Name ...">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="form-group">
                        <input type="text" name="search_by_phone" class="form-control" placeholder="Search by Phone ...">
                    </div>
                </div>
{{--                <div class="col-lg-4 col-md-6">--}}
{{--                    <div class="form-group">--}}
{{--                        <input type="text" name="search_by_date" class="form-control" placeholder="Search by Date ...">--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="col-lg-2">
                    <div class="search-student-btn">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>

            </div></form>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">

                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Appoitments</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
{{--                                    <a href="students.html" class="btn btn-outline-gray me-2 active"><i--}}
{{--                                            class="feather-list"></i></a>--}}
{{--                                    <a href="students-grid.html" class="btn btn-outline-gray me-2"><i--}}
{{--                                            class="feather-grid"></i></a>--}}
{{--                                    <a href="#" class="btn btn-outline-primary me-2"><i--}}
{{--                                            class="fas fa-download"></i> Download</a>--}}
                                    <a href="{{route('admin.add_appointment')}}" class="btn btn-primary"><i
                                            class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{session()->get('message')}}
                                </div>
                            @endif
                            <table
                                class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                <tr>

                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Age</th>

                                    <th>Department</th>
                                    <th>doctor</th>
                                    <th>date</th>
                                    <th>status</th>
                                    <th>gender</th>
                                    <th>phone</th>
                                    <th class="text-end">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($appoints as $appointment)
                                    <tr>

                                        <td>{{$appointment->id}}</td>

                                        <td>{{$appointment->name}}</td>
                                        <td>{{$appointment->age}}</td>
                                        <td>{{$appointment->depart}}</td>
                                        <td>{{$appointment->doctor}}</td>
                                        <td>{{$appointment->date}}</td>

                                        <td>
                                            @if($appointment->status == 'pending')
                                                <p style="background: #ff6060; margin-bottom: 0px ; width: fit-content;padding: 3px 7px;color: white">Pending</p>

                                            @else
                                                <p style="background: #7bd793;margin-bottom: 0px ;width: fit-content;padding: 3px 7px;color: white">Complated</p>
                                            @endif
                                            </td>

                                        <td>{{$appointment->gender}}</td>
                                        <td>{{$appointment->phone}}</td>
                                        <td class="text-end">
                                            <div class="actions ">

                                                <a   data-bs-toggle="modal" data-bs-target="#complateAppoit"
                                                    class="btn btn-sm me-2 "
                                                     style="@if($appointment->status == 'pending') background: #ff6060; @else background: #7bd793!important; @endif border-radius: 50%;color: white; margin-bottom: 0px"
                                                >
                                                    @if($appointment->status == 'pending')
                                                        <i   class="fa feather-x"></i>
                                                    @else
                                                        <i   class="fa feather-check"></i>
                                                    @endif

                                                </a>
                                                <a  data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                   class="btn btn-sm bg-success-light me-2 ">
                                                    <i class="fa feather-trash"></i>
                                                </a>

                                                <a  href="{{route('admin.edit_appoint',$appointment->id)}}" class="btn btn-sm bg-danger-light">
                                                    <i class="feather-edit"></i>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach



                                </tbody>
                            </table>
                                <div class="mt-2">  {{$appoints->links('pagination::bootstrap-5')}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Appoitment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   Are Sure To Delete This Appoitment?
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                    <a type="button" href="{{route('admin.delete_appoint',$appointment->id)}}" class="btn btn-primary">Yes</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="complateAppoit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">StatUs Appoitment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if($appointment->status == 'pending')
                        Are you sure to complete this appointment?
                    @else
                        Are you sure you want to cancel this appointment?
                    @endif


                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                    <a type="button" href="{{route('admin.complate_appoint',$appointment->id)}}" class="btn btn-primary">Yes</a>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

