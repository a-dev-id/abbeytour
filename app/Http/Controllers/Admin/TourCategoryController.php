<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourCategory;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class TourCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tour_categories = TourCategory::all();
        return view('admin.tour-category.index')->with(compact('tour_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tour-category.create');
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
            $banner_image = $request->file('banner_image')->store('img/tour/banner', 'public');
        }

        if (empty($request->file('cover_image'))) {
            $cover_image = null;
        } else {
            $cover_image = $request->file('cover_image')->store('img/tour/cover', 'public');
        }

        TourCategory::create([
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
        return redirect()->route('tour-category.index');
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
        $tour = TourCategory::find($id);
        return view('admin.tour-category.edit')->with(compact('tour'));
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
        if (empty($request->file('banner_image'))) {
            $banner_image = $request->old_banner_image;
        } else {
            $banner_image = $request->file('banner_image')->store('img/tour/banner', 'public');
        }

        if (empty($request->file('cover_image'))) {
            $cover_image = $request->old_cover_image;
        } else {
            $cover_image = $request->file('cover_image')->store('img/tour/cover', 'public');
        }

        $t = TourCategory::find($id);

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

        return redirect()->route('tour-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $t = TourCategory::find($id);
        $t->delete();
        return redirect()->route('tour-category.index');
    }
}
