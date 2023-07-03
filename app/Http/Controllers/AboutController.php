<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::get();
        return view('backend.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.about.create');

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
            'title.en'=> 'required|string|max:255',
            'title.ne'=> 'required|string|max:255',
            'description.en'=> 'required|string',
            'description.ne'=> 'required|string',
            'image_path' => 'required|mimes:png,jpg,jpeg|max:8096',
        ]);

        $imageName = time() . '.' . $request->image_path->extension();
        $request->image_path->storeAs('about', $imageName, 'public');
        $formFields['image_path'] = '/storage/about/' . $imageName;  
        About::create($formFields);
        return redirect(route('backend.about.index'))->with('success', 'About us created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        return view('backend.about.edit', compact('about'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $formFields = $request->validate([
            'title.en'=> 'required|string|max:255',
            'title.ne'=> 'required|string|max:255',
            'description.en'=> 'required|string',
            'description.ne'=> 'required|string',
            'image_path' => 'required|mimes:png,jpg,jpeg|max:8096',
        ]);

        if ($request->image_path) {

            $imageName = time() . '.' . $request->image_path->extension();
            $request->image_path->storeAs('about', $imageName, 'public');
            $formFields['image_path'] = '/storage/about/' . $imageName;

            $trimmedPath = trim(str_replace("/storage/", "", $about->image_path));

            if (Storage::disk('public')->exists($trimmedPath)) {

                Storage::disk('public')->delete($trimmedPath);
            }
        }

        $about->update($formFields);
        return redirect(route('backend.about.index'))->with('success', "About updated successfully");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        $trimmedPath = trim(str_replace("/storage/", "", $about->image_path));

        if (Storage::disk('public')->exists($trimmedPath)) {

            Storage::disk('public')->delete($trimmedPath);
        }

        $about->delete();
        return redirect()->back()->with('success', "About deleted successfully");
    }
}
