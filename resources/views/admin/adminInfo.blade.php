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
                        <h5 class="card-title">Admin Basic Details</h5>
                    </div>
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{session()->get('success')}}
                        </div>
                    @endif
                    <div class="card-body pt-0">
                        <form action="{{route('update_admin_info')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="settings-form">
                                <div class="form-group">
                                    <label> Name <span class="star-red">*</span></label>
                                    <input type="text" value="{{$admin_info->name ??''}}" name="name" class="form-control" placeholder="Admin Name">
                                </div>
                                <div class="form-group">
                                    <label> Email <span class="star-red">*</span></label>
                                    <input type="email" value="{{$admin_info->email ??''}}" name="email" class="form-control" placeholder="Admin Email">
                                </div>
                                <div class="form-group">
                                    <p class="settings-label">image <span class="star-red">*</span></p>
                                    <div class="settings-btn">
                                        <input type="file" value="{{$admin_info->image ??''}}" accept="image/*" name="image" id="file"
                                               onchange="loadFile(event)" class="hide-input">
                                        <label for="file" class="upload">
                                            <i class="feather-upload"></i>
                                        </label>
                                    </div>
                                    <h6 class="settings-size">Recommended image size is <span>150px x
                                                    150px</span></h6>
                                    <div class="upload-images">
                                        <img src="/images/{{$admin_info->image ??''}}" alt="Image">
                                        <a href="javascript:void(0);" class="btn-icon logo-hide-btn">
                                            <i class="feather-x-circle"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class=" mb-5">

                                    <label>Description <span class="login-danger">*</span></label>
                                    <textarea name="short_desc" class="form-control" placeholder="Enter Description">{{$admin_info->short_desc ??''}}</textarea>
                                    <div class="text-danger">
                                        {{$errors->first('short_desc')}}
                                    </div>
                                </div>

                                <div class="">
                                    <div class="form-group">
                                        <textarea  id="summernote" required  name="big_desc">{{$admin_info->big_desc ??''}} </textarea>
                                        <div class="text-danger">
                                            {{$errors->first('big_desc')}}
                                        </div>
                                    </div>
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
@section('scripts')

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height:300
            });
        });

    </script>
@endsection
