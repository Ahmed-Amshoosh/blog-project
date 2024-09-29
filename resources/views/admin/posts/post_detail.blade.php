

@extends('layouts.dashboard')
@section('css')
    <style>
        .active{
            background: #0d6efd;
            color: white;
        }
        .active:hover{
            color: white;
        }


    </style>
    <link rel="stylesheet" href="{{asset('share/jquery.floating-social-share.min.css')}}">

@endsection

@section('content')



<div class="content container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-9">

            <div class="blog-view">
                <div class="blog-single-post">
                    <div class="blog-image">
                        <a href="javascript:void(0);"><img alt="" src="/images/{{$post->image}}"
                                                           class="img-fluid"></a>
                    </div>
                    <h3 class="blog-title">{{$post->title}}
                    </h3>
                    <div class="blog-info">
                        <div class="post-list">
                            <ul>
                                <li>
                                    <div class="post-author">
                                        <a href="profile.html"><img src="assets/img/profiles/avatar-14.jpg"
                                                                    alt="Post Author"> <span>by Prof. Lester </span></a>
                                    </div>
                                </li>
                                <li><i class="feather-clock"></i>  <?php
                                                                   $date = \Carbon\Carbon::parse($post->created_at);
                                                                   $formattedDatePost = $date->format('Y-m-d h:i:s');
                                                                   ?>

                                    {{$formattedDatePost}}

                                </li>
                                <li><i class="feather-message-square"></i> {{$commints_count}} Comments</li>


{{--                                <button class="like-button btn btn-primary" data-likeable-type="post" data-likeable-id="{{ $post->id }}" data-is-like="1">--}}
{{--                                    <i class="fas fa-thumbs-up" ></i> <span class="like-count">{{ $post->likes()->count() }}</span>--}}
{{--                                </button>--}}

{{--                                <button class="dislike-button btn btn-primary" data-likeable-type="post" data-likeable-id="{{ $post->id }}" data-is-like="0">--}}
{{--                                    <i class="fas fa-thumbs-down"></i> <span class="dislike-count">{{ $post->dislikes()->count() }}</span>--}}
{{--                                </button>--}}

                                @php
                                    $userLike = \Illuminate\Support\Facades\DB::table('likes')
            ->where('likeable_id', $post->id)->where('user_id', auth()->id())->get();
//                                    dd($userLike[0]->is_like);
                                    $userDislike = $post->userDislike;
                                @endphp

                                <button class="like-button btn {{$userLike[0]->is_like??0 ? 'active':''}}" data-likeable-type="post" data-likeable-id="{{ $post->id }}" data-is-like="1">
                                    <i class="fas fa-thumbs-up" ></i> (<span class="like-count">{{ $post->userLike()->count() }}</span>)
                                </button>

                                <button class="dislike-button btn {{$userLike[0]->is_like ??1 ? '':'active'}} " data-likeable-type="post" data-likeable-id="{{ $post->id }}" data-is-like="0">
                                    <i class="fas fa-thumbs-down"></i> (<span class="dislike-count">{{ $post->userDislike()->count() }}</span>)
                                </button>



                            </ul>
                        </div>
                    </div>

                    <div class="blog-content">
                        {{$post->short_desc}}
                    </div>

                    <div class="blog-content">
                        {!! $post->big_desc !!}
                    </div>
                </div>


                <div class="card blog-comments">
                    <div class="card-header">
                        <h4 class="card-title">Comments ({{$commints_count}})</h4>
                    </div>
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{session()->get('success')}}
                        </div>
                    @endif
                    <div class="card-body pb-0">
                        <ul class="comments-list">
                            @foreach($commints as $commint)
                                <li class="d-flex justify-between w-100 bg-amber-100" style="justify-content: space-between!important;">
                                    <div class="comment">
                                        <div class="comment-author">
                                            <i class="fa fa-user rounded-circle" style="color: #d9d9d9;font-size: 35px"></i>
                                        </div>
                                        <div class="comment-by">
                                            <h5 class="blog-author-name">{{$commint->name}} <span
                                                    class="blog-date"> <i class="feather-clock me-1"></i>
                                                    <?php
                                                        $date = \Carbon\Carbon::parse($commint->created_at);
                                                        $formattedDate = $date->format('Y-m-d h:i:s');
                                                        ?>

                                                    {{$formattedDate}}
{{--                                                    {{ optional($commint->created_at)->format('M j, Y') ?? 'No date available' }}--}}
                                                    </span></h5></div>
                                        <p>{{$commint->content}}</p>

                                    </div>
                                  <a data-bs-toggle="modal"
                                     data-bs-target="#deleteModal" class="btn btn-primary" style="height: fit-content">
                                      <i class="feather-trash-2 "></i></a>
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
                                                          <h4>Are You Sure want to delete This Comment</h4>
                                                          <div class="submit-section">
                                                              <a href="{{route('admin.delete_commint',$commint->id)}}" class="btn btn-success me-2">Yes</a>
                                                              <a href="#" class="btn btn-danger" data-bs-dismiss="modal">No</a>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                    <div class="card-body">
                        @if(auth()->check())
                            <form method="post" action="{{route('add_commint',$post->id)}}">
                          @csrf

                            <div class="form-group">
                                            <textarea rows="4" required name="content" class="form-control bg-grey"
                                                      placeholder="Comments"></textarea>
                                <div class="text-danger">
                                    {{$errors->first('content')}}
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="submit-btn btn-primary btn-blog"
                                        type="submit">Submit</button>
                            </div>
                        </form>
                        @else
                            <p>Please <a href="{{ route('login') }}">log in</a> to add a comment.</p>
                        @endif
                    </div>
                </div>


                <div class="card blog-share clearfix">
                    <div class="card-header">
                        <h4 class="card-title">Share the post</h4>
                    </div>

                    <div class="card-body">
                        <ul class="social-share">
                            <li><a class="twitter-button "  target="_blank"><i class="feather-twitter"></i></a></li>
                            <li><a class="facebook-button" target="_blank" ><i class="feather-facebook"></i></a></li>
                            <li><a class="linkedin-button" target="_blank" ><i class="feather-linkedin"></i></a></li>
                            <li><a class="whatsapp-button"><i class="fab fa-whatsapp"></i></a></li>
                            <li><a class="telegram-button"><i class="fab fa-telegram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
@section('scripts')
    <script>
        const post = @json($post);
        const link = encodeURI(window.location.origin + window.location.pathname);
        const msg = encodeURIComponent(post.title);
        const title = encodeURIComponent(post.title);

        const fb = document.querySelector('.facebook-button');
        fb.href = `https://www.facebook.com/share.php?u=${link}`;

        const twitter = document.querySelector('.twitter-button');
        twitter.href = `http://twitter.com/share?&url=${link}&text=${msg}&hashtags=javascript,programming`;

        const linkedIn = document.querySelector('.linkedin-button');
        linkedIn.href = `https://www.linkedin.com/sharing/share-offsite/?url=${link}`;
        //
        // const reddit = document.querySelector('.reddit');
        // reddit.href = `http://www.reddit.com/submit?url=${link}&title=${title}`;

        const whatsapp = document.querySelector('.whatsapp-button');
        whatsapp.href = `https://api.whatsapp.com/send?text=${msg}: ${link}`;




        const telegram = document.querySelector('.telegram-button');
        telegram.href = `https://telegram.me/share/url?url=${link}&text=${msg}`;
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>



        $(document).ready(function() {
            $('.like-button, .dislike-button').click(function() {
                var button = $(this);
                var likeableType = button.data('likeable-type');
                var likeableId = button.data('likeable-id');
                var isLike = button.data('is-like');


                $.ajax({
                    url: "{{ route('like.or.dislike') }}",
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        likeable_type: likeableType,
                        likeable_id: likeableId,
                        is_like: isLike
                    },
                    success: function(response) {
                        // Update counts
                        $('.like-count').text(response.likes_count);
                        $('.dislike-count').text(response.dislikes_count);

                        // Toggle active class
                        if (isLike) {
                            if (button.hasClass('active')) {
                                button.removeClass('active');
                            } else {
                                button.addClass('active');
                                $('.dislike-button').removeClass('active');
                            }
                        } else {
                            if (button.hasClass('active')) {
                                button.removeClass('active');
                            }else {
                            button.addClass('active');
                            $('.like-button').removeClass('active');}
                        }
                    }
                });
            });
        });
    </script>
    <script src="{{asset('share/jquery.floating-social-share.min.js')}}"></script>
    <script>
        $('body').floatingSocialShare({
            buttons:[
                "facebook","linkedin"
            ],
            text:"share with",
            url:"{{route('admin.post_detail',$post->id)}}"
        });
    </script>

@endsection
