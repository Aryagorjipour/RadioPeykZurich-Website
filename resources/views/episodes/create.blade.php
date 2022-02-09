@extends('layouts.app')


@section('content')
<header class="masthead" style="background-image:url('assets/img/home-bg.jpg?h=ed6236475a1226b743bf65e6f1bebb34');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto position-relative">
                <div class="site-heading">
                    <h1>افزودن قسمت جدید</h1>
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
            action="/public/episodes"
            method="post"
            enctype="multipart/form-data">
            @csrf
    
            <input name="title" type="text" placeholder="عنوان..." class="form-control mt-4">
    
            <textarea name="description"
            placeholder="توضیحات..." class="form-control  mt-4"></textarea>
    
            <input name="youtube" type="text" placeholder="لینک یوتیوب..." class="form-control mt-4">
            <input name="mixcloud" type="text" placeholder="لینک میکس کلود..." class="form-control mt-4">
    

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