<?php

namespace App\Http\Controllers;

use App\Models\WebConfig;
use Illuminate\Http\Request;

class WebConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.webconfig', [
            'webConfigs' => WebConfig::all()->pluck('value', 'name')->toArray()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:png,svg,ico|max:2048',
            'name' => 'required|string',
        ]);

        $imageName = time().'.'.$request->file->extension();
        $request->file->move(public_path('img'), $imageName);

        $webConfig = WebConfig::where('name', $request->name)->first();
        if ($webConfig) {
            if ($webConfig->value && file_exists(public_path($webConfig->value))) {
                unlink(public_path($webConfig->value));
            }
            $webConfig->update(['value' => "/img/".$imageName]);
        } else {
            //WebConfig::create(['name' => 'logo', 'value' => $imageName]);
        }
        return response()->json(['success' => 'You have successfully uploaded an image'], 200);
        //return redirect()->route('dashboard.webconfig');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(WebConfig $webConfig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WebConfig $webConfig)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WebConfig $webConfig)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WebConfig $webConfig)
    {
        //
    }
}
