@extends('layouts.dashboard')

@section('content')


    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Settings</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="settings.html">Settings</a></li>
                        <li class="breadcrumb-item active">Social Links</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">

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
                    <div class="col-lg-7 col-md-10">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Social Link Settings</h5>
                            </div>
                            @if(session()->has('Delete_success'))
                                <div class="alert alert-success">
                                    {{session()->get('Delete_success')}}
                                </div>
                            @endif
                            <div class="card-body pt-0">
                                <form>
                                    <div class="settings-form">
                                        @foreach($social_links as $social_link)
                                            <div class="links-info">
                                                <div class="row form-row links-cont">
                                                    <div class="form-group form-placeholder d-flex">
                                                        <a href="#" class="btn btn-primary">
                                                            <i style="font-size: 22px" class="{{$social_link->platform}}"></i></a>
                                                        <input type="text" value="{{$social_link->url}}" disabled class="form-control"
                                                               placeholder="https://www.facebook.com">
                                                        <div class="d-flex">
                                                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                                               data-bs-target="#deleteModal" class="btn btn-primary">
                                                                <i class="feather-trash-2"></i>
                                                            </a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                                                    <a href="{{route('admin.delete_social_link',$social_link->id)}}" class="btn btn-success me-2">Yes</a>
                                                                    <a href="#" class="btn btn-danger" data-bs-dismiss="modal">No</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach

                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Social Link Settings</h5>
                            </div>
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{session()->get('success')}}
                                </div>
                            @endif
                            <div class="card-body pt-0">
                                <form action="{{route('social-media.store')}}" method="post">
                                    @csrf
                                    <div class="settings-form">
                                        <div class="links-info">
                                            <div class="row form-row links-cont">
                                                <div class="form-group ">
                                                    <label class="col-form-label ">Platform Select</label>
                                                    <div class="col-md-12">
                                                        <select name="platform" class="form-control form-select">
                                                            <option value="">-- Select Platform --</option>
                                                            <option value="fa-brands fa-facebook">Facebook</option>
                                                            <option value="fa-brands fa-twitter">Twitter</option>
                                                            <option value="fa-brands fa-instagram">Instagram</option>
                                                            <option value="fa-brands fa-youtube">YouTube</option>
                                                            <option value="fa-brands fa-linkedin">Linkedin</option>
                                                            <option value="fa-brands fa-tiktok">TikTok</option>
                                                            <option value="fa-brands fa-telegram">Telegram</option>
                                                            <option value="fa-brands fa-snapchat">Snapchat</option>
                                                            <option value="fa-brands fa-whatsapp">WhatsApp</option>
                                                            <option value="fa-brands fa-pinterest">Pinterest</option>
                                                        </select>
                                                        <div class="text-danger">
                                                            {{$errors->first('platform')}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <label class="col-form-label">Url</label>
                                                <div class="form-group form-placeholder d-flex">
                                                    <input type="text" name="url" class="form-control"
                                                           placeholder="https://www.facebook.com"><br>

                                                </div>
                                                <div class="text-danger" style="margin-top: -20px; margin-bottom: 15px">
                                                    {{$errors->first('url')}}
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group mb-0">
                                        <div class="settings-btns">
                                            <button type="submit" class="btn btn-orange">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('scripts')


        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace();
    </script>
@endsection

