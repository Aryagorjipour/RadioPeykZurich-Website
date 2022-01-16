@extends('layouts.app')


@section('content')
<header class="masthead" style="background-image:url('assets/img/home-bg.jpg?h=ed6236475a1226b743bf65e6f1bebb34');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto position-relative">
                <div class="site-heading">
                    <h1>ویرایش قسمت {{ $episode->id }}</h1>
                </div>
            </div>
        </div>
    </div>
</header>
@if ($errors->any())
    <div class="w-4/5 m-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="w-1/5 mb-4 text-center text-gray-50 bg-red-700 rounded-2xl py-4">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">

    <div class="form-group w-75">
        <form 
            action="/episodes/{{ $episode->id }}"
            method="post"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <input name="slug" type="hidden" value="{{ $episode->slug }}"/> 
            
            <input name="title" type="text" value="{{ $episode->title }}" class="form-control mt-4">
    
            <textarea name="description"
            placeholder="توضیحات..." class="form-control  mt-4">{{ $episode->description }}</textarea>
    
            <input name="youtube" type="text" value="{{ $episode->youtube_link }}" class="form-control mt-4">
            <input name="mixcloud" type="text" value="{{ $episode->cloud_link }}" class="form-control mt-4">
    

            <button type="submit" class="btn btn-primary rounded-pill mt-5">
                ویرایش قسمت {{ $episode->id }}
            </button>
        </form>
    </div>
</div>


@endsection