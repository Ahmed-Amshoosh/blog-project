
@extends('layouts.dashboard')

@section('content')

<div class="content container-fluid">

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Add Department</h3>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session()->get('message')}}
                    </div>
                @endif
                <div class="card-body">
                    <form method="post" action="{{route('admin.create_department')}}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>Department Details</span></h5>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Department Name <span class="login-danger">*</span></label>
                                    <input type="text" name="name" class="form-control">
                                    <div class="text-danger">
                                        {{$errors->first('name')}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group local-forms col-12 col-sm-4">
                                <label>Head of Department <span class="login-danger">*</span></label>
                                <select class="form-control select"  name="head_depart" required>
                                    <option>Please Select Doctor </option>
                                    @foreach($doctors as $doctor)
                                        <option value="{{$doctor->name}}">{{$doctor->name}}</option>
                                    @endforeach
                                </select>
                                <div class="text-danger">
                                    {{$errors->first('head_depart')}}
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms calendar-icon">
                                    <label>Department Start Date <span class="login-danger">*</span></label>
                                    <input name="deprt_star_tdate" class="form-control datetimepicker" type="date"
                                           placeholder="DD-MM-YYYY">
                                    <div class="text-danger">
                                        {{$errors->first('deprt_star_tdate')}}
                                    </div>
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
