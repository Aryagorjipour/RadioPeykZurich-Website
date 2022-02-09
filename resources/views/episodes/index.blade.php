@extends('layouts.app')

@section('content')
<header class="masthead" style="background-image:url('assets/img/home-bg.jpg?h=ed6236475a1226b743bf65e6f1bebb34');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto position-relative">
                <div class="site-heading">
                    <h1>فهرست قسمت های منتشر شده</h1><span class="subheading">در اینجا شما میتوانید لیست همه قسمت های منتشر شده را ببینید</span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        @if (Auth::check())
            <div class="col-6">
                <a href="/public/episodes/create"
                    class="btn btn-success me-2 rounded-pill">
                    افزودن قسمت جدید
                </a>
            </div>
        @endif
        @if (session()->has('message'))
        <div class="col-6">
            <p class="w-25 alert alert-success">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-lg-8">
            @foreach ($episodes as $episode)
            <div class="row" style="align-items: center;">
                <div class="col-2"> <img src="/public/images/{{ $episode->img_path }}" alt="{{ $episode->title}}" class="img-fluid "/></div>
                <div class="col-10">
                    <div class="post-preview">
                        <a href="/public/episodes/{{ $episode->slug }}">
                            <h2 class="post-title"> {{ $episode->title }}</h2>
                        </a>
                        <p class="post-meta">بارگذاری شده توسط&nbsp; رادیو پیک زوریخ در  {{ date('jS M Y', strtotime($episode->updated_at))}}</p>
                    </div>
                </div>
            </div>
            <hr>
            @endforeach
        </div>
    </div>
@endsection