<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;

class PagesController extends Controller
{

    public function __invoke(){

    }

    public function index(){
        return view('index')->with('episodes', Episode::orderBy('id', 'DESC')->take(10)->get());
    }

    public function about(){
        return view('about');
    }

}
