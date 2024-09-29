@extends('website.layout')
@section('title')
    @lang('home.homepage')
@endsection
@section('content')

    <div class="row no-gutters-lg">
        <div class="col-12">
            <h2 class="section-title">@lang('home.all_category_posts') {{$category}} </h2>
        </div>
        <div class="col-lg-12 mb-5 mb-lg-0">
            <div class="row">

                @foreach($posts as $post)
                    <div class="col-md-6 mb-4">
                        <article class="card article-card article-card-sm h-100">
                            <a href="{{route('post_detail',$post->id)}}">
                                <div class="card-image">
                                    <div class="post-info"> <span class="text-uppercase">
                                          <?php
                                                $formattedDate = \Carbon\Carbon::parse($post->created_at)->format('d M Y');
                                                ?>
                                            {{$formattedDate}}

                                    </span>
                                    </div>
                                    <img loading="lazy" decoding="async" src="/images/{{$post->image}}" alt="Post Thumbnail" class="w-100">
                                </div>
                            </a>
                            <div class="card-body px-0 pb-0">
                                <ul class="post-meta mb-2">
                                    <li> <a href="#!">{{$post->category}}</a>
                                    </li>
                                </ul>
                                <h2 style="font-size: 20px"><a class="post-title" href="{{route('post_detail',$post->id)}}"> {{$post->title}}</a></h2>
                                <p class="card-text"> {{$post->short_desc}}</p>
                                <div class="content"> <a class="read-more-btn" href="{{route('post_detail',$post->id)}}">@lang('home.read_full_article')</a>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
