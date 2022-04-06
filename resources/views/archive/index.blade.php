@extends('layouts.app')
@section('content')
<header class="masthead" style="background-image:url('assets/img/home-bg.jpg?h=ed6236475a1226b743bf65e6f1bebb34');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto position-relative">
                <div class="site-heading">
                    <h1>آرشیو رادیو پیک زوریخ</h1>
                    {{-- <span class="subheading">این آرشیو تاریخ {{ $date }} می باشد</span> --}}
                </div>
            </div>
        </div>
    </div>
</header>

@include('layouts.hero', ['heading' => 'test', 'subheading' => 'تست'])

<div class="container">
    <div class="row">
        @if (sizeof($episodes) <= 0)
        <div class="alert alert-warning" style="text-align:center" role="alert">
 هیچ قسمتی در این تاریخ وجود ندارد <a class="text-info" href="javascript: history.go(-1)"> بازگشت </a>
        </div>
        @endif
        <div class="col-md-10 col-lg-8">
            @foreach ($episodes as $episode)
            <div class="row" style="align-items: center;">
                <div class="col-2"> <img src="/images/{{ $episode->img_path }}" alt="{{ $episode->title}}" class="img-fluid "/></div>
                <div class="col-10">
                    <div class="post-preview">
                        <a href="/episodes/{{ $episode->slug }}">
                            <h2 class="post-title"> {{ $episode->title }}</h2>
                        </a>
                        <p class="post-meta">بارگذاری شده توسط&nbsp; رادیو پیک زوریخ در {{ $episode->publish_year }} / {{ $episode->publish_month }} / {{ $episode->publish_day }}</p>
                    </div>
                </div>
            </div>
            <hr>
            @endforeach
            
        </div>
    </div>
</div>
@endsection