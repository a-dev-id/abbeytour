<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.index')->with(compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog_categories = BlogCategory::all();
        return view('admin.blog.create')->with(compact('blog_categories'));
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
            $banner_image = $request->file('banner_image')->store('img/blog/banner', 'public');
        }

        if (empty($request->file('cover_image'))) {
            $cover_image = null;
        } else {
            $cover_image = $request->file('cover_image')->store('img/blog/cover', 'public');
        }

        Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'excerpt' => $request->excerpt,
            'blog_category_id' => $request->blog_category_id,
            'cover_image' => $cover_image,
            'banner_image' => $banner_image,
            'status' => $request->status,
            'featured' => $request->featured,
        ]);
        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        $blog_categories = BlogCategory::all();
        return view('admin.blog.edit')->with(compact('blog', 'blog_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (empty($request->file('banner_image'))) {
            $banner_image = $request->old_banner_image;
        } else {
            $banner_image = $request->file('banner_image')->store('img/blog/banner', 'public');
        }

        if (empty($request->file('cover_image'))) {
            $cover_image = $request->old_cover_image;
        } else {
            $cover_image = $request->file('cover_image')->store('img/blog/cover', 'public');
        }

        $t = Blog::find($id);

        $t->title = $request->title;
        $t->slug = Str::slug($request->title);
        $t->description = $request->description;
        $t->excerpt = $request->excerpt;
        $t->blog_category_id = $request->blog_category_id;
        $t->cover_image = $cover_image;
        $t->banner_image = $banner_image;
        $t->status = $request->status;
        $t->featured = $request->featured;

        $t->save();

        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $t = Blog::find($id);
        $t->delete();
        return redirect()->route('blogs.index');
    }
}
