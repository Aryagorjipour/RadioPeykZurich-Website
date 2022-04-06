@extends('layouts.app')

@section('content')

@include('layouts.hero', ['heading' => 'test', 'subheading' => 'تست'])

<div class="container">
    <div class="row">
      
        <form action="/archive/" 
        method="get"
        class="d-flex" style="justify-content: center;align-items: baseline;">
            @csrf
            <div class="mb-3 ms-1">
                <select class="form-control" name="year" id="category">
                    <option hidden>سال انتشار را انتخاب کنید &#8595</option>
                    @foreach ($published_years as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 ms-1">
                <select class="form-control" name="month" id="category">
                    <option hidden>ماه انتشار را انتخاب کنید &#8595</option>
                    @foreach ($published_months as $month)
                        <option value="{{ $month }}">{{ $month }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 ms-1">
                <select class="form-control" name="day" id="category">
                    <option hidden>روز انتشار را انتخاب کنید &#8595</option>
                    @foreach ($published_days as $day)
                        <option value="{{ $day }}">{{ $day }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary rounded-pill p-2">
                رفتن به آرشیو
            </button>
        </form>
            <div class="col-md-10 col-lg-8">
                @foreach ($last_published as $episode)
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
                <div class="clearfix"><a class="btn btn-primary float-end" href="/episodes">قسمت های
                        قبلی&nbsp;⇒</a></div>
            </div>
    </div>
</div>

<script src="assets/bootstrap/js/bootstrap.min.js?h=656aaffb18e6a1aff5fbfe3cf106e125"></script>
<script src="assets/js/clean-blog.js?h=44b1c6e85af97fda0fedbb834b3ff3f8"></script>
@endsection