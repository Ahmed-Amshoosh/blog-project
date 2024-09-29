@extends('website.layout')
@section('title')
    @lang('home.homepage')
@endsection
@section('content')

<div class="row no-gutters-lg">
    <div class="col-12">
        <h2 class="section-title">@lang('home.latest_articles') </h2>
    </div>
    <div class="col-lg-8 mb-5 mb-lg-0">
        <div class="row">
            <div class="col-12 mb-4">
                @if($latestPostCreated)
                    <article class="card article-card">
                        <a href="{{route('post_detail',$latestPostCreated->id)}}">
                            <div class="card-image">
                                <div class="post-info"> <span class="text-uppercase">
                                    <?php
                                            $formattedDate = \Carbon\Carbon::parse($latestPostCreated->created_at)->format('d M Y');
                                            ?>
                                        {{$formattedDate}}

                                </span>
                                </div>
                                <img loading="lazy" decoding="async" src="images/{{$latestPostCreated->image}}" alt="Post Thumbnail" class="w-100">
                            </div>
                        </a>
                        <div class="card-body px-0 pb-1">
                            <ul class="post-meta mb-2">
                                <li> <a href="#!">{{$latestPostCreated->category}}</a>
                                </li>
                            </ul>
                            <h2 style="font-size: 30px" class="h1"><a class="post-title" href="{{route('post_detail',$latestPostCreated->id)}}">
                                    {{$latestPostCreated->title}}</a></h2>
                            <p class="card-text"> {!! Illuminate\Support\Str::limit($latestPostCreated->short_desc ,100,'...') !!} </p>
                            <div class="content"> <a class="read-more-btn" href="{{route('post_detail',$latestPostCreated->id)}}">@lang('home.read_full_article')</a>
                            </div>
                        </div>
                    </article>
                @endif

            </div>
            @foreach($latestPosts as $latestPost)
                <div class="col-md-6 mb-4">
                    <article class="card article-card article-card-sm h-100">
                        <a href="{{route('post_detail',$latestPost->id)}}">
                            <div class="card-image">
                                <div class="post-info"> <span class="text-uppercase">
                                          <?php
                                            $formattedDate = \Carbon\Carbon::parse($latestPost->created_at)->format('d M Y');
                                            ?>
                                        {{$formattedDate}}

                                    </span>
                                </div>
                                <img loading="lazy" decoding="async" src="images/{{$latestPost->image}}" alt="Post Thumbnail" class="w-100">
                            </div>
                        </a>
                        <div class="card-body px-0 pb-0">
                            <ul class="post-meta mb-2">
                                <li> <a href="#!">{{$latestPost->category}}</a>
                                </li>
                            </ul>
                            <h2 style="font-size: 20px"><a class="post-title" href="{{route('post_detail',$latestPost->id)}}"> {{$latestPost->title}}</a></h2>
                            <p class="card-text">  {!! Illuminate\Support\Str::limit($latestPost->short_desc ,55,'...') !!}</p>
                            <div class="content"> <a class="read-more-btn" href="{{route('post_detail',$latestPost->id)}}">@lang('home.read_full_article')</a>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <nav class="mt-4">
                            <!-- pagination -->
                            <div class="mt-2">
                                {{$latestPosts->links('pagination::bootstrap-5')}}</div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="widget-blocks">
            <div class="row">
                <div class="col-lg-12">
                    <div class="widget">
                        <div class="widget-body">
                                <img loading="lazy" decoding="async" src="/images/{{$adminInfo->image ?? ''}}" alt="About Me" class="w-100 author-thumb-sm d-block">
                            <h2 class="widget-title my-3">{{$adminInfo->name ?? ''}}</h2>
                            <p class="mb-3 pb-2">
                                {!! Str::limit($adminInfo->short_desc ?? '',100,'...') !!}
                            </p> <a href="{{route('about')}}" class="btn btn-sm btn-outline-primary">@lang('home.know_more')
                                </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6">
                    <div class="widget">
                        <h2 class="section-title mb-3">@lang('home.recommended')</h2>
                        <div class="widget-body">
                            <div class="widget-list">

                                    <article class="card mb-4">
                                        <div class="card-image">
{{--                                            <div class="post-info"> <span class="text-uppercase">1 minutes read</span>--}}
{{--                                            </div>--}}
{{--                                            {{dd($mostViewedPost)}}--}}
                                            <img loading="lazy" decoding="async" src="images/{{$mostViewedPost->image ??''}}" alt="Post Thumbnail" class="w-100">
                                        </div>
                                        <div class="card-body px-0 pb-1">
                                            <h3><a class="post-title post-title-sm"
                                                   href="{{route('post_detail',$mostViewedPost->id ??'')}}">{{$mostViewedPost->title ??''}}</a></h3>
                                            <p class="card-text">{{$mostViewedPost->short_desc ??''}}</p>
                                            <div class="content"> <a class="read-more-btn" href="{{route('post_detail',$mostViewedPost->id ??'')}}">@lang('home.read_full_article')</a>
                                            </div>
                                        </div>
                                    </article>


                                @foreach($recommendedPosts as $recommendedPost)
                                    <a class="media align-items-center" href="{{route('post_detail',$recommendedPost->id)}}">
                                        <img loading="lazy" decoding="async" src="images/{{$recommendedPost->image}}" alt="Post Thumbnail" class="w-100">
                                        <div class="media-body   @if (App::getLocale() == 'ar') mr-3 @else ml-3 @endif">
                                            <h3 style="margin-top:-5px ;font-size: 16px">{{$recommendedPost->title}}</h3>
                                            <p class="mb-0 small"> {!! Str::limit($recommendedPost->short_desc ,50,'...') !!}</p>
                                        </div>
                                    </a>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6">
                    <div class="widget">
                        <h2 class="section-title mb-3">@lang('home.categories')</h2>

                        <div class="widget-body">
                            <ul class="widget-list">
                                @foreach($categories as $category)
                                    <li><a href="{{route('category.show',$category->name)}}">{{$category->name}}<span class="ml-auto">
                                                <?php
                                                    $count_cat =0;
                                                    $count_cat = \Illuminate\Support\Facades\DB::table('posts')
                                                        ->where('category', $category->name)->count();

                                                    ?>
                                                ({{$count_cat}})
                                            </span></a>
                                    </li>
                                @endforeach


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
