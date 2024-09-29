
@extends('website.layout')
@section('title')
    @lang('home.contact')
@endsection
@section('content')

    <main>
        <section class="section">
            <div class="container">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs mb-4"> <a href="/">@lang('home.homepage')</a>
                            <span class="mx-1">/</span> <a href="#!"> @lang('home.contact')</a>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="pr-0 pr-lg-4">
                            <div class="content"> @lang('home.contact_desc')
                                <div class="mt-5">
                                    <p class="h3 mb-3 font-weight-normal"><a class="text-dark"
                                                                             href="mailto:hello@reporter.com">{{$adminInfo->email ??''}}</a>
                                    </p>
                                    <p class="mb-3"><a class="text-dark" href="tel:&#43;211234565523">+{{$adminInfo->number ??''}}</a>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-4 mt-lg-0">

                        <form method="POST" action="{{ route('contact.submit') }}" class="row">
                            @csrf
                            <div class="col-md-6">
                                <input type="text" required class="form-control mb-4" placeholder="@lang('home.name')" name="name" id="name">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="email" required class="form-control mb-4" placeholder="@lang('home.email')" name="email"
                                       id="email">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <input type="text" required class="form-control mb-4" placeholder="@lang('home.subject')" name="subject"
                                       id="subject">
                                @error('subject')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                    <textarea required name="message" id="message" class="form-control mb-4"
                                              placeholder=" @lang('home.message_here')" rows="5"></textarea>
                                @error('message')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button class="btn btn-outline-primary" type="submit">@lang('home.send_message')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
