@extends('layouts.app')


@section('content')

@include('layouts.hero', ['heading' => 'ویرایش قسمت {{ $episode->id }}', 'subheading' => ''])

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
            <input type="hidden" name="img_path" value="{{ $episode->img_path }}"/>
            <input name="slug" type="hidden" value="{{ $episode->slug }}"/> 
            
            <input name="title" type="text" value="{{ $episode->title }}" class="form-control mt-4">
    
            <textarea name="description"
            placeholder="توضیحات..." class="form-control  mt-4">{{ $episode->description }}</textarea>
    
            <input name="youtube" type="text" value="{{ $episode->youtube_link }}" class="form-control mt-4">
            <input name="mixcloud" type="text" value="{{ $episode->cloud_link }}" class="form-control mt-4">
            <input name="publish_year" type="number" value="{{ $episode->publish_year }}" class="form-control mt-4">
            <input name="publish_month" type="number" value="{{ $episode->publish_month }}" class="form-control mt-4">
            <input name="publish_day" type="number" value="{{ $episode->publish_day }}" class="form-control mt-4">
            <div class="pt-4 pb-4">
                <label class="form-control">
                    <span class="mt-2 text-base leading-normal">عکس این قسمت را وارد کنید</span>
                    <input type="file" name="image" class="d-none">               
                </label>
            </div>

            <button type="submit" class="btn btn-primary rounded-pill mt-5">
                ویرایش قسمت {{ $episode->id }}
            </button>
        </form>
    </div>
</div>


@endsection