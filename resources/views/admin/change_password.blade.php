@extends('layouts.dashboard')


@section('content')


    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Admin</h3>
                </div>
            </div>
        </div>
        <div class="settings-menu-links">
            <ul class="nav nav-tabs menu-tabs">
{{--                <li class="nav-item active">--}}
{{--                    <a class="nav-link " href="{{route('admin.info')}}">General Settings</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link " href="{{route('admin_change_password')}}">Password</a>--}}
{{--                </li>--}}

                <li class="nav-item {{ request()->is('admin/info*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.info') }}">General Settings</a>
                </li>
                <li class="nav-item {{ request()->is('admin/change_password*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin_change_password') }}">Password</a>
                </li>
                <li class="nav-item {{ request()->is('admin/admin_social_links*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin_social_links') }}">Social Links</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Change Admin Password</h5>
                    </div>

                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{session()->get('success')}}
                        </div>
                    @endif
                    <div class="card-body pt-0">
                        <form action="{{route('admin_password.update')}}" method="post">
                            @csrf
                            <div class="settings-form">
                                <div class="form-group">
                                    <label> Old Password <span class="star-red">*</span></label>
                                    <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" placeholder="Old Password">
                                    @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label> New Password <span class="star-red">*</span></label>
                                    <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" placeholder="New Password">
                                    @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label> Confirm Password <span class="star-red">*</span></label>
                                    <input type="password" name="new_password_confirmation" class="form-control" placeholder="Confirm Password">
                                </div>

                                <div class="form-group mb-0">
                                    <div class="settings-btns">
                                        <button type="submit" class="btn btn-orange">Update</button>
                                        <button type="submit" class="btn btn-grey">Cancel</button>
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
