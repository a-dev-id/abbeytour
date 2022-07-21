<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slider;
use App\Models\Tour;
use App\Models\WhyChooseUs;
use App\Models\Blog;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\OurClient;
use App\Models\Gallery;
use App\Models\GalleryCategory;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::where('status', '=', '1')->orderBy('order', 'ASC')->get();
        $tours = Tour::where('status', '=', '1')->orderBy('order', 'ASC')->get();
        $popular_destinations = Tour::where([['status', '=', '1'], ['featured', '=', 'on']])->get();
        $why_choose_us = WhyChooseUs::where('status', '=', '1')->get();
        $latest_news = Blog::where('status', '=', '1')->limit('6')->get();
        $setting = Setting::find(1);
        $testimonials = Testimonial::where('status', '=', '1')->get();
        $our_clients = OurClient::where('status', '=', '1')->get();
        $gallery_categories = GalleryCategory::where('status', '=', '1')->get();
        $galleries = Gallery::where('status', '=', '1')->limit('8')->get();
        return view('front.index')->with(compact('setting', 'sliders', 'tours', 'popular_destinations', 'why_choose_us', 'latest_news', 'testimonials', 'our_clients', 'gallery_categories', 'galleries'));
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
    public function show($id)
    {
        //
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
