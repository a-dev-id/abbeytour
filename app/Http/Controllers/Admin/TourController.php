<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::all();
        return view('admin.tour.index')->with(compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tour.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (empty($request->file('banner_image'))) {
            $banner_image = null;
        } else {
            $banner_image = $request->file('banner_image')->store('tour/banner', 'public');
        }

        if (empty($request->file('cover_image'))) {
            $cover_image = null;
        } else {
            $cover_image = $request->file('cover_image')->store('tour/cover', 'public');
        }

        Tour::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'excerpt' => $request->excerpt,
            'cover_image' => $cover_image,
            'banner_image' => $banner_image,
            'order' => $request->order,
            'status' => $request->status,
            'featured' => $request->featured,
        ]);
        return redirect()->route('tour.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function show(Tour $tour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tour = Tour::find($id);
        return view('admin.tour.edit')->with(compact('tour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (empty($request->file('banner_image'))) {
            $banner_image = $request->old_banner_image;
        } else {
            $banner_image = $request->file('banner_image')->store('tour/banner', 'public');
        }

        if (empty($request->file('cover_image'))) {
            $cover_image = $request->old_cover_image;
        } else {
            $cover_image = $request->file('cover_image')->store('tour/cover', 'public');
        }

        $t = Tour::find($id);

        $t->title = $request->title;
        $t->slug = Str::slug($request->title);
        $t->description = $request->description;
        $t->excerpt = $request->excerpt;
        $t->cover_image = $cover_image;
        $t->banner_image = $banner_image;
        $t->order = $request->order;
        $t->status = $request->status;
        $t->featured = $request->featured;

        $t->save();

        return redirect()->route('tour.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $t = Tour::find($id);
        $t->delete();
        return redirect()->route('tour.index');
    }
}
