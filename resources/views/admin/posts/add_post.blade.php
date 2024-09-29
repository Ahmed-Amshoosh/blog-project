
@extends('layouts.dashboard')
@section('css')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection

@section('content')


<div class="content container-fluid">
    <div class="row">
        <div class="col-xl-12">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Add Post</h3>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="bank-inner-details">
                        <div class="row">
                            <form action="{{route('admin.create_post')}}" method="post" enctype="multipart/form-data">
                                @csrf
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" required class="form-control" >
                                    <div class="text-danger">
                                        {{$errors->first('title')}}
                                    </div>
                                </div>
                            </div>
                                <div class="form-group ">
                                    <label class="col-form-label col-md-2">Select Category <span class="text-danger">*</span></label>
                                    <div class="col-md-12">
                                        <select class="form-control form-select" required name="category" >
                                            <option value=""></option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->name}}">{{$category->name}}</option>
                                            @endforeach


                                        </select>
                                        <div class="text-danger">
                                            {{$errors->first('category')}}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12"  style="margin-top: 20px;">
                                    <div class="form-group">
                                        <label>Blog Image</label>
                                        <div class="change-photo-btn">
                                            <div>
                                                <p>Add Image</p>
                                            </div>
                                            <input  type="file" name="image" required class="upload">
                                            <div class="text-danger">
                                                {{$errors->first('image')}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 mb-5">

                                    <label>Description <span class="login-danger">*</span></label>
                                    <textarea name="short_desc" required class="form-control" placeholder="Enter Description"></textarea>
                                    <div class="text-danger">
                                        {{$errors->first('short_desc')}}
                                    </div>
                                </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                        <textarea  id="summernote" required  name="big_desc"></textarea>
                                    <div class="text-danger">
                                        {{$errors->first('big_desc')}}
                                    </div>
                                </div>
                            </div>





                                <div class=" blog-categories-btn pt-0">
                                    <div class="bank-details-btn ">
                                        <button type="submit" class="btn bank-cancel-btn me-2">Add Post</button>
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

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height:300
            });
        });

    </script>
@endsection

