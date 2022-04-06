<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;

class PagesController extends Controller
{

    public function __invoke(){

    }

    public function index(){
        $published_years = Episode::orderBy('publish_year', 'ASC')->pluck('publish_year');
        $published_months = Episode::orderBy('publish_month', 'ASC')->pluck('publish_month');
        $published_days = Episode::orderBy('publish_day', 'ASC')->pluck('publish_day');
        $last_published = Episode::orderBy('id', 'DESC')->take(5)->get();


        return view('index', compact(['published_years', 'published_months', 'published_days', 'last_published']));
        // return view('index')->with('episodes', Episode::orderBy('id', 'DESC')->take(10)->get());
    }

    public function about(){
        return view('about');
    }

}
