@extends('layouts.dashboard')

@section('content')


    <div class="content container-fluid">

    <div class="row">
        <div class="col-md-9">

        </div>
        <div class="col-md-3 text-md-end">
            <a href="{{route('admin.add_post')}}" class="btn btn-primary btn-blog mb-3"><i
                    class="feather-plus-circle me-1"></i> Add New</a>
        </div>
    </div>
    <div class="row">
        @if($post->isEmpty())
            <div class="col-12">
                <p class="text-center">No posts available at the moment.</p>
            </div>
        @else
            @foreach($post as $post)
            <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
                <div class="blog grid-blog flex-fill">
                    <div class="blog-image">
                        <a href="{{route('admin.post_detail',$post->id)}}">
                            <img class="img-fluid" src="../images/{{$post->image}}"
                                                         alt="Post Image" ></a>

                    </div>
                    <div class="blog-content">
                        <ul class="entry-meta meta-item">
                            <li>
                                <div class="post-author">
                                    <a href="{{route('admin.post_detail',$post->id)}}">

                                        <img src="{{asset('/images/'.$admin_info->image)}}" alt="Post Author" >
                                        <span>
                                                    <span class="post-title">{{auth()->user()->name}}</span>
                                                    <span class="post-date"><i class="far fa-clock"></i>
{{--                                                        {{$post->created_at}}--}}
                                                        {{date('d-m-Y', strtotime($post->created_at))}}
                                                        </span>
                                                </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <h3 class="blog-title"><a href="{{route('admin.post_detail',$post->id)}}">{{$post->title}}</a></h3>
                        <p>
                            <?php


                                ?>

{{--                            {!!  Str::words( $post->desc, 1, ' >>>');!!}--}}


{{--                            {!! $string = Str::of($post->desc)->words(1, ' >>>'); !!}--}}

                        </p>
                    </div>
                    <div class="row">
                        <div class="edit-options">
                            <div class="edit-delete-btn">
                                <a href="{{route('admin.edit_post',$post->id)}}" class="text-success"><i
                                        class="feather-edit-3 me-1"></i> Edit</a>
                                <a href="#" class="text-danger" data-bs-toggle="modal"
                                   data-bs-target="#deleteModal"><i class="feather-trash-2 me-1"></i>
                                    Delete</a>
                            </div>

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
                                    <a href="{{route('admin.delete_post',$post->id)}}" class="btn btn-success me-2">Yes</a>
                                    <a href="#" class="btn btn-danger" data-bs-dismiss="modal">No</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
        @endif








    </div>





</div>




@endsection
