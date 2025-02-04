
@extends('layouts.dashboard')

@section('content')



    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Categories</h3>

                </div>
            </div>
        </div>

        <div class="student-group-form">
            <form action="{{route('admin.categories')}}" method="get">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input  type="text"  name="name" class="form-control" placeholder="Search Name ...">
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
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{session()->get('message')}}
                                </div>
                            @endif
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Categories</h3>
                                </div>

                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{session()->get('success')}}
                                    </div>
                                @endif

                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="{{route('admin.add_category')}}" class="btn btn-primary"><i
                                            class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        @if($word)
                            <h6 class="text-center">Serach For {{$word}}</h6>
                        @endif

                        <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                            <thead class="student-thread">
                            <tr>

                                <th>#</th>
                                <th>Name</th>
                                <th>Number of Posts</th>

                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>
                                        {{$category->id}}
                                    </td>
                                    <td>{{$category->name}}</td>
                                    <td>

                                        <?php
                                            $posts_count=0;
                                            $postst=\App\Models\Post::all();
                                            $posts_count=$postst->where('category',$category->name)->count();
//                                            $postst=Illuminate\Support\Facades\DB::table('posts')
//                                                ->where('category', $categories->name)->count();
                                            ?>

                                        {{$posts_count}}
                                    </td>

                                    <td class="text-start">
                                        <div class="actions justify-content-center" >
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-sm bg-success-light me-2">
                                                <i class="feather-trash"></i>
                                            </a>
                                            <a href="{{route('admin.edit_category',$category->id)}}" class="btn btn-sm bg-danger-light">
                                                <i class="feather-edit"></i>
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
                                                        <a href="{{route('admin.delete_category',$category->id)}}" class="btn btn-success me-2">Yes</a>
                                                        <a href="#" class="btn btn-danger" data-bs-dismiss="modal">No</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach


                            </tbody>

                        <div class="mt-2">
                            {{$categories->links('pagination::bootstrap-5')}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
