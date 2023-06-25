<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::get();
        return view('backend.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title'=> 'required|string|max:50',
            'description'=> 'required|string|max:100',
            'image_path' => 'required|mimes:png,jpg,jpeg|max:8096',
        ]);

        $imageName = time() . '.' . $request->image_path->extension();
        $request->image_path->storeAs('banner', $imageName, 'public');
        $formFields['image_path'] = '/storage/banner/' . $imageName;  
        Banner::create($formFields);
        return redirect(route('backend.banner.index'))->with('success', 'Banner created successfully');

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
    public function edit(Banner $banner)
    {
        return view('backend.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {   
        $formFields = $request->validate([
            'title'=> 'required|string|max:50',
            'description'=> 'required|string|max:100',
            'image_path' => 'mimes:png,jpg,jpeg|max:8096',
        ]);

        if ($request->image_path) {

            $imageName = time() . '.' . $request->image_path->extension();
            $request->image_path->storeAs('banner', $imageName, 'public');
            $formFields['image_path'] = '/storage/banner/' . $imageName;

            $trimmedPath = trim(str_replace("/storage/", "", $banner->image_path));

            if (Storage::disk('public')->exists($trimmedPath)) {

                Storage::disk('public')->delete($trimmedPath);
            }
        }

        $banner->update($formFields);
        return redirect(route('backend.banner.index'))->with('success', "Banner updated successfully");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $trimmedPath = trim(str_replace("/storage/", "", $banner->image_path));

        if (Storage::disk('public')->exists($trimmedPath)) {

            Storage::disk('public')->delete($trimmedPath);
        }

        $banner->delete();
        return redirect()->back()->with('success', "Banner deleted successfully");
    }
}
