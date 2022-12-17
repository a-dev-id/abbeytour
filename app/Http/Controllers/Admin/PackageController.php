<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Tour;
use App\Models\TourCategory;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::all();
        return view('admin.package.index')->with(compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tour_categories = TourCategory::all();
        $tours =  Tour::all();
        return view('admin.package.create')->with(compact('tour_categories', 'tours'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (empty($request->file('cover_image'))) {
            $cover_image = null;
        } else {
            $cover_image = $request->file('cover_image')->store('img/tour/package/cover', 'public');
        }

        Package::create([
            'title' => $request->title,
            'tour_id' => $request->tour_id,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'destination' => $request->destination,
            'excerpt' => $request->excerpt,
            'cover_image' => $cover_image,
            'status' => $request->status,
            'featured' => $request->featured,
        ]);
        return redirect()->route('package.index');
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
        $package = Package::find($id);
        $tour_categories = TourCategory::all();
        $tours =  Tour::all();
        return view('admin.package.edit')->with(compact('tour_categories', 'tours', 'package'));
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
        if (empty($request->file('cover_image'))) {
            $cover_image = $request->old_cover_image;
        } else {
            $cover_image = $request->file('cover_image')->store('img/tour/package/cover', 'public');
        }

        $t = Package::find($id);

        $t->title = $request->title;
        $t->tour_id = $request->tour_id;
        $t->slug = Str::slug($request->title);
        $t->description = $request->description;
        $t->destination = $request->destination;
        $t->excerpt = $request->excerpt;
        $t->cover_image = $cover_image;
        $t->status = $request->status;
        $t->featured = $request->featured;

        $t->save();

        return redirect()->route('package.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $t = Package::find($id);
        $t->delete();
        return redirect()->route('package.index');
    }
}
