<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class EpisodesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('episodes.index')
        ->with('episodes', Episode::orderBy('id', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view('episodes.create');
        }
        else{
            return redirect()->route('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'youtube' => 'required',
            'mixcloud' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:5048',
        ]);

        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);


        Episode::create([
            'title' => $request->input('title'),
            'youtube_link' => $request->input('youtube'),
            'cloud_link' => $request->input('mixcloud'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Episode::class, 'slug', $request->title),
            'img_path' => $newImageName,
            'user_id' => auth()->user()->id,
        ]);

        return redirect('/episodes')->with('message', 'قسمت جدید بازگذاری شد!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('episodes.show')->with('episode', Episode::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('episodes.edit')
        ->with('episode', Episode::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'youtube' => 'required',
            'mixcloud' => 'required',
            'description' => 'required',
        ]);

        Episode::where('id', $id)
            ->update([
                'title' => $request->input('title'),
                'youtube_link' => $request->input('youtube'),
                'cloud_link' => $request->input('mixcloud'),
                'description' => $request->input('description'),
                'slug' => SlugService::createSlug(Episode::class, 'slug', $request->title),
                'user_id' => auth()->user()->id,
            ]);

        return redirect('/episodes')->with('message', 'قسمت مورد نظر به درستی ویرایش گردید');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
