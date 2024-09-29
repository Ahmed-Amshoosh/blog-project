@extends('website.layout')

@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Feather Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css">

    <style>
        .fa-facebook{
            color: #1877F2;
        }
        .fa-twitter{
            color:#1DA1F2 ;
        }
        .fa-instagram{
            color: #E1306C;
        }
        .fa-youtube{
            color:#FF0000 ;
        }
        .fa-linkedin{
            color:#0077B5 ;
        }
        .fa-tiktok{
            color: #69C9D0;
        }
        .fa-telegram{
            color: #0088CC;
        }
        .fa-snapchat{
            color: #dfc210;
        }
        .fa-whatsapp{
            color: #25D366;
        }
        .fa-pinterest{
            color: #E60023;
        }
    </style>


@endsection


@section('title')
    @lang('home.about_me')
@endsection

@section('content')

    <main>
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto mb-5 mb-lg-0 ">
                        <div class="breadcrumbs mb-4"> <a href="index.html">@lang('home.homepage') </a>
                            <span class="mx-1">/</span> <a href="about.html">@lang('home.about_me') </a>
                        </div>
                    </div>
                    <div class="col-lg-10 mx-auto mb-5 mb-lg-0">
                        <img loading="lazy" decoding="async" src="/images/{{$adminInfo->image ??''}}" class="img-fluid w-100 mb-4"
                             alt="Author Image">
                        <h1 class="mb-4">{{$adminInfo->name ??''}}</h1>
                        <div class="content">

                            <blockquote style="padding:2px 20px 5px!important; margin: 10px">
                                <h5>@lang('home.about_me')</h5>
                            </blockquote>
                            <p>{{$adminInfo->short_desc ??''}}</p>
                            <br>
                            <p>{!! $adminInfo->short_desc ??'' !!}</p>
                        </div>
                        <div style="margin-top: 30px">
                             <blockquote style=" border-left:@if(App::getLocale() == 'ar') 0px @else 4px @endif  solid #13AE6F;border-right:@if(App::getLocale() == 'ar') 4px @else 0px @endif  solid #13AE6F; padding:2px 20px 5px!important; margin: 10px">
                            <h3>@lang('home.social_media_accounts')</h3>
                            </blockquote>
                            <ul style="display: flex;list-style-type: none;margin-top: 20px;padding-left: 0px;flex-wrap: wrap;text-align: center">
                              @foreach($social_links as $social_link)
                                  <li style="margin-bottom: 10px">
                                      <a style="padding: 10px;border: none" class="btn"  href="{{$social_link->url}}"><i style="font-size: 22px" class="{{$social_link->platform}}"></i></a>
                                  </li>
                              @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>


@endsection




