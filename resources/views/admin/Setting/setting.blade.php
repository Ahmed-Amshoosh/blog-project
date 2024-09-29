@extends('layouts.dashboard')

@section('content')


    <div class="content container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Settings</h3>

            </div>
        </div>
    </div>

    <div class="settings-menu-links">
        <ul class="nav nav-tabs menu-tabs">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('setting')}}">General Settings</a>
            </li>
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="localization-details.html">Admin Info</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="payment-settings.html">Payment Settings</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="email-settings.html">Email Settings</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="social-settings.html">Social Media Login</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="social-links.html">Social Links</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="seo-settings.html">SEO Settings</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="others-settings.html">Others</a>--}}
{{--            </li>--}}
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Website Basic Details</h5>
                </div>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif
                <div class="card-body pt-0">
                    <form action="{{route('website.setting')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="settings-form">
                            <div class="form-group">
                                <label>Website Name <span class="star-red">*</span></label>
                                <input type="text" value="{{$websiteInfo->website_name ?? ''}}" name="website_name" class="form-control" placeholder="Enter Website Name">
                                <div class="text-danger">
                                    {{$errors->first('website_name') }}
                                </div>
                            </div>
                            <div class=" mb-5">

                                <label>Description <span class="login-danger">*</span></label>
                                <textarea name="website_desc" class="form-control" placeholder="Enter Description">{{$websiteInfo->website_desc}}</textarea>
                                <div class="text-danger">
                                    {{$errors->first('website_desc')}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Meta Keywords <span class="star-red">*</span></label>

                                <input
                                    type="text"
                                    data-role="tagsinput"
                                    class="input-tags form-control"
                                    placeholder="Meta Keywords"
                                    name="website_keywords"
                                    value="{{ old('website_keywords', $websiteInfo->website_keywords ?? '') }}"
                                    id="services" style="display: none;">
                            </div>

                            <div class="form-group">
                                <p class="settings-label">Logo <span class="star-red">*</span></p>
                                <div class="settings-btn">
                                    <input type="file" value="{{$websiteInfo->logo}}" accept="image/*" name="logo" id="file"
                                           onchange="loadFile(event)" class="hide-input">
                                    <label for="file" class="upload">
                                        <i class="feather-upload"></i>
                                    </label>

                                </div>
                                <div class="text-danger">
                                    {{$errors->first('logo')}}
                                </div>
                                <h6 class="settings-size">Recommended image size is <span>150px x
                                                    150px</span></h6>
                                <div class="upload-images">
                                    <img src="/images/{{$websiteInfo->logo}}" alt="Image">
                                    <a href="javascript:void(0);" class="btn-icon logo-hide-btn">
                                        <i class="feather-x-circle"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="form-group">
                                <p class="settings-label">Logo2 </p>
                                <div class="settings-btn">
                                    <input type="file" value="{{$websiteInfo->logo2}}" accept="image/*" name="logo2" id="file"
                                           onchange="loadFile(event)" class="hide-input">
                                    <label for="file" class="upload">
                                        <i class="feather-upload"></i>
                                    </label>

                                </div>
                                <div class="text-danger">
                                    {{$errors->first('logo2')}}
                                </div>
                                <h6 class="settings-size">Recommended image size is <span>150px x
                                                    150px</span></h6>
                                <div class="upload-images">
                                    <img src="/images/{{$websiteInfo->logo2}}" alt="Image">
                                    <a href="javascript:void(0);" class="btn-icon logo-hide-btn">
                                        <i class="feather-x-circle"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="form-group">
                                <p class="settings-label">Favicon <span class="star-red">*</span></p>
                                <div class="settings-btn">
                                    <input type="file" value="{{$websiteInfo->favicon}}" accept="image/*" name="favicon" id="file"
                                           onchange="loadFile(event)" class="hide-input">
                                    <label for="file" class="upload">
                                        <i class="feather-upload"></i>
                                    </label>

                                </div>
                                <div class="text-danger">
                                    {{$errors->first('favicon')}}
                                </div>
                                <h6 class="settings-size">
                                    Recommended image size is <span>16px x 16px or 32px x 32px</span>
                                </h6>
                                <h6 class="settings-size mt-1">Accepted formats: only png and ico</h6>
                                <div class="upload-images upload-size">
                                    <img src="/images/{{$websiteInfo->favicon}}" alt="Image">
                                    <a href="javascript:void(0);" class="btn-icon logo-hide-btn">
                                        <i class="feather-x-circle"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="settings-btns">
                                    <button type="submit" class="btn btn-orange">Update</button>
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


    <script src="{{asset('bootstrap-tagsinput/js/bootstrap-tagsinput.js')}}"></script>

@endsection

