<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurClient;
use Illuminate\Http\Request;

class OurClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $our_clients = OurClient::all();
        return view('admin.our-client.index')->with(compact('our_clients'));
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
        if (empty($request->file('client_logo'))) {
            $client_logo = null;
        } else {
            $client_logo = $request->file('client_logo')->store('our_client', 'public');
        }

        OurClient::create([
            'title' => $request->title,
            'client_logo' => $client_logo,
            'status' => $request->status,
            'featured' => $request->featured,
        ]);
        return redirect()->route('our-client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OurClient  $ourClient
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OurClient  $ourClient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $our_clients = OurClient::all();
        $our_client = OurClient::find($id);
        return view('admin.our-client.edit')->with(compact('our_client', 'our_clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OurClient  $ourClient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (empty($request->file('client_logo'))) {
            $client_logo = $request->old_client_logo;
        } else {
            $client_logo = $request->file('client_logo')->store('our_client', 'public');
        }

        $oc = OurClient::find($id);

        $oc->title = $request->title;
        $oc->client_logo = $client_logo;
        $oc->status = $request->status;
        $oc->featured = $request->featured;

        $oc->save();

        return redirect()->route('our-client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OurClient  $ourClient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oc = OurClient::find($id);
        $oc->delete();
        return redirect()->route('our-client.index');
    }
}
