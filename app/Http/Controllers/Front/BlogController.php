<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog;
use App\Models\Page;
use App\Models\Setting;
use App\Models\TourCategory;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Page::where('id', '=', '2')->first();
        $blogs = Blog::where('status', '=', '1')->latest()->paginate(9);
        $setting = Setting::find(1);
        $tour_categories = TourCategory::where('status', '=', '1')->orderBy('order', 'ASC')->get();
        return view('front.blog')->with(compact('page', 'blogs', 'setting', 'tour_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $blog = Blog::where([['slug', '=', $slug], ['status', '=', '1']])->first();
        $setting = Setting::find(1);
        $tour_categories = TourCategory::where('status', '=', '1')->orderBy('order', 'ASC')->get();
        return view('front.blog-detail')->with(compact('blog', 'setting', 'tour_categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
