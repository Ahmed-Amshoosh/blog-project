@extends('layouts.dashboard')


@section('content')


    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Contact Inquiries</h3>

                </div>
            </div>
        </div>
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
        @endif

        <div class="student-group-form">
            <form action="{{route('admin.contact')}}" method="get">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" name="ser_by_name" class="form-control" placeholder="Search by Name ...">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" name="ser_by_email" class="form-control" placeholder="Search by Email ...">
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
                                    <h3 class="page-title">Inquiries</h3>
                                </div>

                            </div>
                        </div>
                        @if($word)
                            <h6 class="text-center" style="margin-bottom: 20px">Serach For {{$word}}</h6>
                        @endif

                        <div class="table-responsive">
                            <table
                                class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>subject</th>
                                    <th>message</th>
                                    <th>Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contact_inquiries as $index => $contact_inquirie)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$contact_inquirie->name}}</td>
                                        <td>{{$contact_inquirie->email}}</td>
                                        <td>{{$contact_inquirie->subject}}</td>
                                        <td>{{$contact_inquirie->desc}}</td>
                                        <td>{{$contact_inquirie->created_at}}</td>

                                        <td class="text-end">
                                            <div class=" text-center">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-sm bg-success-light me-2">
                                                    <i class="feather-trash"></i>
                                                </a>

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
                                                            <a href="{{route('admin.delete_contact_inquirie',$contact_inquirie->id)}}" class="btn btn-success me-2">Yes</a>
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
                                {{$contact_inquiries->links('pagination::bootstrap-5')}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection
