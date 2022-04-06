@extends('layouts.app')
@section('content')

@include('layouts.hero', ['heading' => 'آرشیو رادیو پیک زوریخ', 'subheading' => 'آرشیو مربوط به سرچ شما'])

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