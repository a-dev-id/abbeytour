<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class WhyChooseUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $why_choose_us = WhyChooseUs::all();
        return view('admin.why-choose-us.index')->with(compact('why_choose_us'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.why-choose-us.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        WhyChooseUs::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'excerpt' => $request->excerpt,
            'font_awesome' => $request->font_awesome,
            'status' => $request->status,
            'featured' => $request->featured,
        ]);
        return redirect()->route('why-choose-us.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WhyChooseUs  $whyChooseUs
     * @return \Illuminate\Http\Response
     */
    public function show(WhyChooseUs $whyChooseUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WhyChooseUs  $whyChooseUs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $why_choose_us = WhyChooseUs::find($id);
        return view('admin.why-choose-us.edit')->with(compact('why_choose_us'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WhyChooseUs  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $wcu = WhyChooseUs::find($id);

        $wcu->title = $request->title;
        $wcu->slug = Str::slug($request->title);
        $wcu->description = $request->description;
        $wcu->excerpt = $request->excerpt;
        $wcu->font_awesome = $request->font_awesome;
        $wcu->status = $request->status;
        $wcu->featured = $request->featured;

        $wcu->save();

        return redirect()->route('why-choose-us.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WhyChooseUs  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wcu = WhyChooseUs::find($id);
        $wcu->delete();
        return redirect()->route('why-choose-us.index');
    }
}
