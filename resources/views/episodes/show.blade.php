@extends('layouts.app')

@section('content')
<header class="masthead">
    <div class="overlay"></div>
    <div class="container">
        <div class="row" style="align-items: center;">
            <div class="col-sm-12 col-md-4 col-lg-4 mx-auto position-relative">
                <div class="post-heading">
                   <img src="/images/{{ $episode->img_path }}" alt="{{ $episode->title }}" class="img-thumbnail">
                </div>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8 mx-auto position-relative">
                <div class="post-heading">
                    <h1>شاهد قسمت {{ $episode->id }} باشید با عنوان</h1>
                    <h2 class="subheading" style="font-weight: bolder">"{{ $episode->title }}"</h2><span
                        class="meta">بارگذاری شده توسط &nbsp;<a href="/">رادیو پیک زوریخ</a>&nbsp;در {{ $episode->publish_year }} / {{ $episode->publish_month }} / {{ $episode->publish_day }}</span>
                </div>
            </div>
        </div>
    </div>
</header>

<article>
    <div class="container">
        <div class="row">
            @if (isset(Auth::user()->id) && Auth::user()->id == $episode->user_id)
                <span>
                    <a 
                        href="/episodes/{{ $episode->slug }}/edit"
                        class="muted">
                        ویرایش 📝
                    </a>
                </span>
            @endif
            <div class="col-md-10 col-lg-8 mx-auto">
                <h2 class="section-heading">توضیحات</h2>
                <p>{{ $episode->description }}</p>
               
                <figure>
                    <blockquote class="blockquote">
                        <p class="mb-0"><i class="fa fa-youtube-play" aria-hidden="true"></i> مشاهده این قسمت در یوتیوب:</p>
                    </blockquote>
                </figure>

                <iframe class="w-100" style="height: 500px !important"
                    src="{{ $episode->youtube_link }}">

                </iframe>

                {{-- <iframe class="w-100" style="height: 500px !important"
                    src="https://www.lora.ch/?tmpl=popup">

                </iframe> --}}
                <figure>
                    <blockquote class="blockquote">
                        <p class="mb-0"><i class="fa fa-mixcloud" aria-hidden="true"></i> مشاهده این قسمت در mixcloud:</p>
                    </blockquote>
                </figure>

                <iframe width="100%" height="300" scrolling="no" frameborder="no" allow="autoplay"
                    src="{{ $episode->cloud_link }}"></iframe>

                <p>
                    امیدواریم این قسمت نیز برای شما مفید بوده باشد.
                </p>
            </div>
        </div>
    </div>
</article>
<hr />

@endsection