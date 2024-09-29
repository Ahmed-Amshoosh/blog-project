<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en-us">

<head>
    <?php
    $setting=\App\Models\Setting::all()->first();

    ?>
    <meta charset="utf-8">
{{--    <title>Reporter - HTML Blog Template</title>--}}
    <title>
        @hasSection('title')
            @yield('title')
        @else
            {{ config('app.name') }}
        @endif</title>
    <!-- Viewport Meta Tag -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Description Meta Tag -->
    <meta name="description" content="{{$setting->website_desc??''}}">

    <!-- Author Meta Tag -->
    <meta name="author" content="{{$setting->website_name ?? 'Blog'}} ">

    <!-- Keywords Meta Tag (Optional) -->
    <meta name="keywords" content="{{$setting->website_keywords}}">

    <!-- Robots Meta Tag -->
    <meta name="robots" content="index, follow">

    <!-- Open Graph Meta Tags for Social Sharing (Optional but Recommended) -->
    <meta property="og:title" content="@yield('og_title')">
    <meta property="og:description" content="@yield('og_description', 'Default Open Graph description for your blog.')">
    <meta property="og:image" content="@yield('og_image')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags for Social Sharing (Optional but Recommended) -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', $setting->website_name ?? 'Blog')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Default Twitter description for your blog.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('images/default-twitter-image.jpg'))">


    <link rel="shortcut icon" href="{{asset('website/images/favicon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('website/images/favicon.png')}}" type="image/x-icon">

    <!-- theme meta -->
    <meta name="theme-name" content="reporter" />

    <!-- # Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Neuton:wght@700&family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- # CSS Plugins -->
    <link rel="stylesheet" href="{{asset('website/plugins/bootstrap/bootstrap.min.css')}}">

    <!-- # Main Style Sheet -->
    @if (App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{asset('website/css/style_rtl.css')}}">
    @else
        <link rel="stylesheet" href="{{asset('website/css/style.css')}}">

    @endif

    @yield('css')
</head>

<body>

<header class="navigation">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light px-0">
            <a class="navbar-brand order-1 py-0" href="/">


                <img loading="prelaod" decoding="async" class="img-fluid" src="/images/{{$setting->logo}}" alt="Reporter Hugo">
            </a>
            <div class="navbar-actions order-3 ml-0 ml-md-4">
                <button aria-label="navbar toggler" class="navbar-toggler border-0" type="button" data-toggle="collapse"
                        data-target="#navigation"> <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="order-lg-3 order-md-2 order-3  moblie_menu">
                <ul class="navbar-nav mx-auto mt-3 mt-lg-0">
                  @if(Auth::check())
                        <li class="nav-item dropdown pig_scren">
                            <a class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{auth()->user()->name}}
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('user_logout')}}">@lang('home.logout')</a>
                            </div>
                        </li>
                    @else
                        <li class="nav-item pig_scren"> <a class="nav-link" href="/login">@lang('home.login')</a>
                        </li>

                        <li class="nav-item pig_scren"> <a class="nav-link" href="/register">@lang('home.register')</a>
                        </li>
                  @endif
                </ul>
            </div>

            <div class="collapse navbar-collapse text-center order-lg-2 order-4" id="navigation">
                @if (App::getLocale() == 'ar')
                    <ul class="navbar-nav mx-auto mt-3 mt-lg-0">
                        @if(Auth::check())
                            <li class="nav-item dropdown moblie">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{auth()->user()->name}}
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('user_logout')}}">@lang('home.logout')</a>
                                </div>
                            </li>
                        @else
                            <li class="nav-item moblie"> <a class="nav-link" href="/login">@lang('home.login')</a>
                            </li>

                            <li class="nav-item moblie"> <a class="nav-link" href="/register">@lang('home.register')</a>
                            </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if (App::getLocale() == 'ar')
                                    العربية
                                @else
                                    English
                                @endif
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ url()->current() }}?lang=en">English</a>
                                <a class="dropdown-item" href="{{ url()->current() }}?lang=ar">العربية</a>
                            </div>
                            <script>
                                function setLanguage(lang) {
                                    // Store the selected language in local storage
                                    localStorage.setItem('locale', lang);

                                    // Redirect to the same page with the selected language as a query parameter
                                    window.location.href = window.location.pathname + '?lang=' + lang;
                                }

                                // On page load, check if there's a language in local storage
                                document.addEventListener('DOMContentLoaded', function() {
                                    const storedLang = localStorage.getItem('locale');
                                    if (storedLang) {
                                        // Redirect to the same page with the language set from local storage
                                        if (!window.location.search.includes('lang=' + storedLang)) {
                                            window.location.href = window.location.pathname + '?lang=' + storedLang;
                                        }
                                    }
                                });
                            </script>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="/contact">@lang('home.contact')</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="/about">@lang('home.about_me')</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="/">@lang('home.homepage')</a>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav mx-auto mt-3 mt-lg-0">

                        <li class="nav-item"> <a class="nav-link" href="/">@lang('home.homepage')</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="/about">@lang('home.about_me')</a>
                        </li>


                        <li class="nav-item"> <a class="nav-link" href="/contact">@lang('home.contact')</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if (App::getLocale() == 'ar')
                                    العربية
                                @else
                                    English
                                @endif
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ url()->current() }}?lang=en">English</a>
                                <a class="dropdown-item" href="{{ url()->current() }}?lang=ar">العربية</a>
                            </div>
                            <script>
                                function setLanguage(lang) {
                                    // Store the selected language in local storage
                                    localStorage.setItem('locale', lang);

                                    // Redirect to the same page with the selected language as a query parameter
                                    window.location.href = window.location.pathname + '?lang=' + lang;
                                }

                                // On page load, check if there's a language in local storage
                                document.addEventListener('DOMContentLoaded', function() {
                                    const storedLang = localStorage.getItem('locale');
                                    if (storedLang) {
                                        // Redirect to the same page with the language set from local storage
                                        if (!window.location.search.includes('lang=' + storedLang)) {
                                            window.location.href = window.location.pathname + '?lang=' + storedLang;
                                        }
                                    }
                                });
                            </script>
                        </li>
                        @if(Auth::check())
                            <li class="nav-item dropdown moblie">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{auth()->user()->name}}
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('user_logout')}}">@lang('home.logout')</a>
                                </div>
                            </li>
                        @else
                            <li class="nav-item moblie"> <a class="nav-link" href="/login">@lang('home.login')</a>
                            </li>

                            <li class="nav-item moblie"> <a class="nav-link" href="/register">@lang('home.register')</a>
                            </li>
                        @endif
                    </ul>

                @endif



            </div>
        </nav>
    </div>
</header>

<main>
    <section class="section">
        <div class="container">
            @yield('content')

        </div>
    </section>
</main>

<footer class="bg-dark mt-5">
    <div class="container section">
        <div class="row">
            <div class="col-lg-10 mx-auto text-center">
                <a class="d-inline-block mb-4 pb-2" href="index.html">
                    <img loading="prelaod" decoding="async" class="img-fluid" src="/images/{{$setting->logo2}}" alt="Reporter Hugo">
                </a>
                <ul class="p-0 d-flex navbar-footer mb-0 list-unstyled">
                    <li class="nav-item my-0"> <a class="nav-link" href="/">@lang('home.homepage')</a></li>
                    <li class="nav-item my-0"> <a class="nav-link" href="/about">@lang('home.about_me')</a></li>
                    <li class="nav-item my-0"> <a class="nav-link" href="/contact">@lang('home.contact')</a></li>

                </ul>
            </div>
        </div>
    </div>
    <div class="copyright bg-dark content">@lang('home.footer_desc') <a href="https://amshooshweb.free.nf/">Amshoosh</a></div>
</footer>

@yield('scrpit')
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/feather.min.js')}}"></script>
<script src="{{asset('plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('plugins/apexchart/apexcharts.min.js')}}"></script>
<script src="{{asset('plugins/apexchart/chart-data.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
<script src="{{asset('summernote-bs4.min.js')}}"></script>
<script src="{{asset('dropzone.js')}}"></script>
<script src="{{asset('demo.js')}}"></script>
<!-- # JS Plugins -->
<script src="{{asset('website/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('website/plugins/bootstrap/bootstrap.min.js')}}"></script>

<!-- Main Script -->
<script src="{{asset('website/js/script.js')}}></script>


</body>
</html>
