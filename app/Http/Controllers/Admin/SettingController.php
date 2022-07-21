<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $setting = Setting::find($id);
        return view('admin.setting.index')->with(compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
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
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (empty($request->file('logo'))) {
            $logo = $request->old_logo;
        } else {
            $logo = $request->file('logo')->store('setting', 'public');
        }

        $s = Setting::find($id);

        $s->logo = $logo;
        $s->website_title = $request->website_title;
        $s->website_description = $request->website_description;
        $s->email = $request->email;
        $s->phone = $request->phone;
        $s->address = $request->address;
        $s->facebook = $request->facebook;
        $s->twitter = $request->twitter;
        $s->instagram = $request->instagram;
        $s->youtube = $request->youtube;
        $s->whatsapp_number = $request->whatsapp_number;
        $s->about_us = $request->about_us;
        $s->about_us_description = $request->about_us_description;
        $s->why_choose_us = $request->why_choose_us;
        $s->why_choose_us_description = $request->why_choose_us_description;
        $s->popular_destination = $request->popular_destination;
        $s->popular_destination_description = $request->popular_destination_description;
        $s->latest_news = $request->latest_news;
        $s->latest_news_description = $request->latest_news_description;
        $s->testimonial = $request->testimonial;
        $s->testimonial_description = $request->testimonial_description;
        $s->our_client = $request->our_client;
        $s->our_client_description = $request->our_client_description;
        $s->gallery = $request->gallery;
        $s->gallery_description = $request->gallery_description;

        $s->save();

        return redirect()->route('setting.show', ['1']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
