<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();
        $gallery_categories = GalleryCategory::all();
        return view('admin.gallery.index')->with(compact('galleries', 'gallery_categories'));
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
        if (empty($request->file('original_image'))) {
            $original_image = null;
        } else {
            $original_image = $request->file('original_image')->store('gallery/original', 'public');
        }

        if (empty($request->file('cover_image'))) {
            $cover_image = null;
        } else {
            $cover_image = $request->file('cover_image')->store('gallery/cover', 'public');
        }

        Gallery::create([
            'title' => $request->title,
            'original_image' => $original_image,
            'cover_image' => $cover_image,
            'gallery_category_id' => $request->gallery_category_id,
            'status' => $request->status,
            'featured' => $request->featured,
        ]);
        return redirect()->route('galleries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galleries = Gallery::all();
        $gallery = Gallery::find($id);
        $gallery_categories = GalleryCategory::all();
        return view('admin.gallery.edit')->with(compact('gallery', 'galleries', 'gallery_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (empty($request->file('original_image'))) {
            $original_image = $request->old_original_image;
        } else {
            $original_image = $request->file('original_image')->store('gallery/original', 'public');
        }

        if (empty($request->file('cover_image'))) {
            $cover_image = $request->old_cover_image;
        } else {
            $cover_image = $request->file('cover_image')->store('gallery/cover', 'public');
        }

        $g = Gallery::find($id);

        $g->title = $request->title;
        $g->original_image = $original_image;
        $g->cover_image = $cover_image;
        $g->gallery_category_id = $request->gallery_category_id;
        $g->status = $request->status;
        $g->featured = $request->featured;

        $g->save();

        return redirect()->route('galleries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $g = Gallery::find($id);
        $g->delete();
        return redirect()->route('galleries.index');
    }
}
