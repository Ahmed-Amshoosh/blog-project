
@extends('layouts.dashboard')

@section('content')

<div class="content container-fluid">

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Add Notices</h3>

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
                    <form method="post" action="{{route('admin.create_notice')}}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>Notices Details</span></h5>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Notices Description <span class="login-danger">*</span></label>
                                    <textarea name="notice" class="form-control"></textarea>
                                    <div class="text-danger">
                                        {{$errors->first('notice')}}
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
