<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class GalleryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery_categories = GalleryCategory::all();
        return view('admin.gallery-category.index')->with(compact('gallery_categories'));
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
        GalleryCategory::create([
            'title' => $request->title,
            'status' => $request->status,
            'featured' => $request->featured,
        ]);
        return redirect()->route('gallery.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GalleryCategory  $galleryCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GalleryCategory  $galleryCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery_categories = GalleryCategory::all();
        $gallery_category = GalleryCategory::find($id);
        return view('admin.gallery-category.edit')->with(compact('gallery_category', 'gallery_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GalleryCategory  $galleryCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bc = GalleryCategory::find($id);

        $bc->title = $request->title;
        $bc->status = $request->status;
        $bc->featured = $request->featured;

        $bc->save();

        return redirect()->route('gallery.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GalleryCategory  $galleryCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bc = GalleryCategory::find($id);
        $bc->delete();
        return redirect()->route('gallery.category.index');
    }
}
