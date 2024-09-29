@extends('website.layout')

@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <style>
            .active{
                background: #0d6efd;
                color: white;
            }
            .active:hover{
                color: white;
            }
            .social-share {
                float: left;
                list-style: none;
                margin: 0;
                padding: 0;
            }
            .social-share>li {
                display: inline-block;
                float: left;
                margin-left: 10px;
                text-align: center;
            }
            .social-share>li>a {
                border-radius: 6px;
                color: #3d5ee1;
                display: flex;
                display: -ms-flexbox;
                align-items: center;
                justify-content: center;
                font-size: 20px;
                height: 40px;
                width: 40px;
            }
            .content ul li {
                 padding-left: 0px;
            }
            .social-share>li {
                 margin-left: 0px;
            }
            /*.social-share>li>a:hover.social-share>li>a>i {*/
            /*    */
            /*}*/
            .social-share > li:hover > a > i {
                /* your styles here */color: white;
            }

            .content ul li::before {
              display: none;
            }

            .fa-twitter{
                color: #1DA1F2;
            }
            .fa-facebook{
                color: #1877F2;
            }
            .fa-linkedin{
                color: #0077B5;
            }
            .fa-whatsapp{
                color: #25D366;
            }
            .fa-telegram{
                color: #0088CC;
            }

        </style>
        <link rel="stylesheet" href="{{asset('share/jquery.floating-social-share.min.css')}}">



@endsection
@section('title')
    {{$post->title}}
@endsection
@section('meta_keywords', $post->title)

@section('og_title', $post->title)
@section('og_description', $post->short_desc)
@section('og_image', asset('images/'.$post->image))
@section('twitter_title',$post->title)
@section('twitter_description', $post->short_desc)
@section('twitter_image',  asset('images/'.$post->image))
@section('content')

    <main>
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-5 mb-lg-0">
                        <article>
                            <img loading="lazy" decoding="async" src="/images/{{$post->image}}" alt="Post Thumbnail" class="w-100">
                            <ul class="post-meta mb-2 mt-4">
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" style="margin-right:5px;margin-top:-4px" class="text-dark" viewBox="0 0 16 16">
                                        <path d="M5.5 10.5A.5.5 0 0 1 6 10h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z" />
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
                                        <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z" />
                                    </svg> <span>

                                        <?php
                                            $formattedDate = \Carbon\Carbon::parse($post->created_at)->format('d M Y');
                                        ?>
                                        {{$formattedDate}}</span>
                                </li>
                                <li> <a href="#">{{$post->category}}</a>
                                </li>
                                <li>
                                    <i class="feather-message-square"></i> {{$commints_count}} @lang('home.comments')</li>

                                @php
                                    $userLike = \Illuminate\Support\Facades\DB::table('likes')
                                              ->where('likeable_id', $post->id)->where('user_id', auth()->id())->get();
//                                    dd($userLike[0]->is_like);
                                    $userDislike = $post->userDislike;
                                @endphp
                                @if(auth()->check())
                                    <!-- Like Button for Authenticated Users -->
                                    <button style="border: none; padding: 6px 15px; border-radius: 10%;"
                                            class="like-button btn {{$userLike[0]->is_like ?? 0 ? 'active' : ''}}"
                                            data-likeable-type="post"
                                            data-likeable-id="{{ $post->id }}"
                                            data-is-like="1">
                                        <i class="fas fa-thumbs-up"></i>
                                        <span class="like-count">{{ $post->userLike()->count() }}</span>
                                    </button>

                                    <!-- Dislike Button for Authenticated Users -->
                                    <button style="border: none; padding: 6px 15px; border-radius: 10%;"
                                            class="dislike-button btn {{$userLike[0]->is_like ?? 1 ? '' : 'active'}}"
                                            data-likeable-type="post"
                                            data-likeable-id="{{ $post->id }}"
                                            data-is-like="0">
                                        <i class="fas fa-thumbs-down"></i>
                                        <span class="dislike-count">{{ $post->userDislike()->count() }}</span>
                                    </button>
                                @else

                                    <!-- Disabled Like Button for Unauthenticated Users -->
                                    <div id="warning-alert-modal" class="modal fade" tabindex="-1" role="dialog"
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-body p-4">
                                                    <div class="text-center">
                                                        <i class="dripicons-warning h1 text-warning"></i>
                                                        <h4 class="mt-2">@lang('home.title_message')</h4>
                                                        <p class="mt-3">@lang('home.please_log_in_to_continue')</p>
                                                        <button type="button" class="btn btn-primary my-2"
                                                                data-bs-dismiss="modal"><a style="color: white" href="{{route('login')}}">@lang('home.continue')</a></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button data-bs-toggle="modal"
                                            data-bs-target="#warning-alert-modal" style="border: none; padding: 6px 15px; border-radius: 10%;"
                                            class="btn disabled"
                                            >
                                        <i class="fas fa-thumbs-up"></i>
                                        <span class="like-count">{{ $post->userLike()->count() }}</span>
                                    </button>

                                    <!-- Disabled Dislike Button for Unauthenticated Users -->
                                    <button data-bs-toggle="modal"
                                            data-bs-target="#warning-alert-modal" style="border: none; padding: 6px 15px; border-radius: 10%;"
                                            class="btn disabled"
                                            >
                                        <i class="fas fa-thumbs-down"></i>
                                        <span class="dislike-count">{{ $post->userDislike()->count() }}</span>
                                    </button>

                                @endif

                            </ul>

                            <h1 class="my-3">{{$post->title}}</h1>

                            <div class="content  @if(App::getLocale() == 'ar')  @else text-left @endif">




                                <p>{{$post->short_desc}}</p>
                                <hr>
                                <p>{!! $post->big_desc !!}</p>
                                <br>
                                <hr>
                                <br>
                                <div class="card-header" style="text-align: @if(App::getLocale() == 'ar') right @else left @endif">
                                    <h4 class="card-title" >@lang('home.comments') ({{$commints_count}})</h4>
                                </div>
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{session()->get('success')}}
                                    </div>
                                @endif
                                <div class="card-body pb-0">
                                    <ul class="" style="list-style-type: none;text-align:@if(App::getLocale() == 'ar') right @else left @endif ">
                                        @foreach($commints as $commint)
                                            <li class="" style="border-bottom: 1px solid #e3e3e3">
                                                <div class="comment d-flex align-items-center">
                                                    <div class="comment-author">
                                                        <i class="fa fa-user rounded-circle" style="color: #d9d9d9;font-size: 35px"></i>
                                                    </div>
                                                    <div class="comment-by"  style="margin-left: 10px ;margin-right:@if(App::getLocale() == 'ar') 10px @else 0px @endif ">
                                                        <h5 class="blog-author-name" style="margin-bottom: 0px;margin-top: 0px;">{{$commint->name}}</h5> <span
                                                                class="blog-date"> <i class="feather-clock me-1"></i>
                                                    <?php
                                                                    $date = \Carbon\Carbon::parse($commint->created_at);
                                                                    $formattedDate = $date->format('Y-m-d');
                                                                    ?>

                                                                {{$formattedDate}}
                                                                {{--                                                    {{ optional($commint->created_at)->format('M j, Y') ?? 'No date available' }}--}}
                                                    </span>
                                                    </div>
                                                </div>
                                                <p>{{$commint->content}}</p>
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
                                                <button class="btn submit-btn btn-primary btn-blog"
                                                        type="submit">@lang('home.submit')</button>
                                            </div>
                                        </form>
                                    @else

                                        <!-- Disabled Comment Form for Unauthenticated Users with Modal Trigger -->
                                        <form>
                                            <div class="form-group">
                                                <textarea rows="4" class="form-control bg-grey" placeholder="Comments" id="comment-textarea"></textarea>
                                                <div class="text-danger">
                                                    {{ $errors->first('content') }}
                                                </div>
                                            </div>
                                            <div class="submit-section">
                                                <button class="btn submit-btn btn-primary btn-blog" id="comment-submit-btn" type="button">
                                                    @lang('home.submit')
                                                </button>
                                            </div>
                                            <div id="warning-alert-modal-2" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-body p-4">
                                                            <div class="text-center">
                                                                <i class="dripicons-warning h1 text-warning"></i>
                                                                <h4 class="mt-2">@lang('home.title_message')</h4>
                                                                <p class="mt-3">@lang('home.please_log_in_to_continue_adding_comment')</p>
                                                                <button type="button" class="btn btn-primary my-2" data-bs-dismiss="modal">
                                                                    <a style="color: white" href="{{ route('login') }}">@lang('home.continue')</a>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>

                                        <!-- Warning Modal -->

                                        <!-- JavaScript to Trigger Modal -->
                                        <script>
                                            document.getElementById('comment-textarea').addEventListener('click', function() {
                                                var modal = new bootstrap.Modal(document.getElementById('warning-alert-modal-2'));
                                                modal.show();
                                            });

                                            document.getElementById('comment-submit-btn').addEventListener('click', function() {
                                                var modal = new bootstrap.Modal(document.getElementById('warning-alert-modal-2'));
                                                modal.show();
                                            });
                                        </script>
{{--                                        <p style="text-align: @if(App::getLocale() == 'ar') right @else left @endif">. @lang('home.please') <a href="{{ route('login') }}"> @lang('home.login') </a> @lang('home.to_add_comment')</p>--}}
                                    @endif
                                </div>
                                <div class="card blog-share clearfix" style="text-align: @if(App::getLocale() == 'ar') right @else left @endif">
                                    <div class="card-header" >
                                        <h4 class="card-title">@lang('home.share_the_post')</h4>
                                    </div>

                                    <div class="card-body">
                                        <ul class="social-share" style="list-style: none; float:@if(App::getLocale() == 'ar') right @else left @endif">
                                            <li><a class="twitter-button "  target="_blank"><i class="fab fa-twitter"></i></a></li>
                                            <li><a class="facebook-button" target="_blank" ><i class="fab fa-facebook"></i></a></li>
                                            <li><a class="linkedin-button" target="_blank" ><i class="fab fa-linkedin"></i></a></li>
                                            <li><a class="whatsapp-button"><i class="fab fa-whatsapp"></i></a></li>
                                            <li><a class="telegram-button"><i class="fab fa-telegram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </article>

                    </div>
                </div>
            </div>
        </section>
    </main>


@endsection

@section('scrpit')

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
{{--    <script>--}}
{{--        $('body').floatingSocialShare({--}}
{{--            buttons:[--}}
{{--                "facebook","linkedin","whatsapp"--}}
{{--            ],--}}
{{--            text:"share with",--}}
{{--            url:"{{route('admin.post_detail',$post->id)}}"--}}
{{--        });--}}
{{--    </script>--}}

@endsection




