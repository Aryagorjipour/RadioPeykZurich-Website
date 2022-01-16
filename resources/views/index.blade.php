@extends('layouts.app')

@section('content')
<header class="masthead" style="background-image:url('assets/img/home-bg.jpg?h=ed6236475a1226b743bf65e6f1bebb34');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto position-relative">
                <div class="site-heading">
                    <h1>رادیو پیک زوریخ</h1><span class="subheading">وب سایت رسمی رادیو پیک زوریخ</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-lg-8">
            @foreach ($episodes as $episode)
            <div class="row" style="align-items: center;">
                <div class="col-2"> <img src="/images/{{ $episode->img_path }}" alt="{{ $episode->title}}" class="img-fluid "/></div>
                <div class="col-10">
                    <div class="post-preview">
                        <a href="/episodes/{{ $episode->slug }}">
                            <h2 class="post-title"> {{ $episode->title }}</h2>
                        </a>
                        <p class="post-meta">بارگذاری شده توسط&nbsp; رادیو پیک زوریخ در  {{ date('jS M Y', strtotime($episode->updated_at))}}</p>
                    </div>
                </div>
            </div>
            <hr>
            @endforeach
            <div class="clearfix"><a class="btn btn-primary float-end" href="/episodes">قسمت های
                    قبلی&nbsp;⇒</a></div>
        </div>
    </div>
</div>

<script src="assets/bootstrap/js/bootstrap.min.js?h=656aaffb18e6a1aff5fbfe3cf106e125"></script>
<script src="assets/js/clean-blog.js?h=44b1c6e85af97fda0fedbb834b3ff3f8"></script>
@endsection