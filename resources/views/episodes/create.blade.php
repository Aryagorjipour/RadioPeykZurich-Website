@extends('layouts.app')
@section('content')

@include('layouts.hero', ['heading' => 'افزودن قسمت جدید', 'subheading' => ''])

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
            action="/episodes"
            method="post"
            enctype="multipart/form-data">
            @csrf
    
            <input name="title" type="text" placeholder="عنوان..." class="form-control mt-4">
    
            <textarea name="description"
            placeholder="توضیحات..." class="form-control  mt-4"></textarea>
    
            <input name="youtube" type="text" placeholder="لینک یوتیوب..." class="form-control mt-4">
            <input name="mixcloud" type="text" placeholder="لینک میکس کلود..." class="form-control mt-4">
            <input name="publish_year" type="number" placeholder="سال پابلیش ..." class="form-control mt-4">
            <input name="publish_month" type="number" placeholder="ماه پابلیش ..." class="form-control mt-4">
            <input name="publish_day" type="number" placeholder="روز پابلیش ..." class="form-control mt-4">
    

            <div class="pt-4 pb-4">
                <label class="form-control">
                    <span class="mt-2 text-base leading-normal">عکس این قسمت را وارد کنید</span>
                    <input type="file" name="image" class="d-none">               
                </label>
            </div>

            <button type="submit" class="btn btn-primary rounded-pill">
                افزودن قسمت
            </button>
        </form>
    </div>
</div>


@endsection