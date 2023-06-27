<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $gallerys = Gallery::where(function ($query) use ($request) {
            $query->where('title', 'LIKE', '%' . $request->search . '%')
                ->orWhereHas('album', function ($query) use ($request) {
                    $query->where('name', 'LIKE', '%' . $request->search . '%');
                });
        })->get();
        
        return view('backend.gallery.index', compact('gallerys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $albums = Album::pluck('name','id');
        return view('backend.gallery.create',compact('albums'));
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
            'description'=> 'required|string|max:254',
            'image_path' => 'required|mimes:png,jpg,jpeg|max:8096',
            'album_id' => 'required|numeric',
        ]);

        $imageName = time() . '.' . $request->image_path->extension();
        $request->image_path->storeAs('gallery', $imageName, 'public');
        $formFields['image_path'] = '/storage/gallery/' . $imageName;  
        Gallery::create($formFields);
        return redirect(route('backend.gallery.index'))->with('success', 'gallery created successfully');
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
    public function edit(Gallery $gallery)
    {
        $albums = Album::pluck('name','id');

        return view('backend.gallery.edit', compact('gallery','albums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {   
        $formFields = $request->validate([
            'title'=> 'required|string|max:50',
            'description'=> 'required|string|max:254',
            'image_path' => 'mimes:png,jpg,jpeg|max:8096',
            'album_id' => 'required|numeric',
        ]);

        if ($request->image_path) {

            $imageName = time() . '.' . $request->image_path->extension();
            $request->image_path->storeAs('gallery', $imageName, 'public');
            $formFields['image_path'] = '/storage/gallery/' . $imageName;

            $trimmedPath = trim(str_replace("/storage/", "", $gallery->image_path));

            if (Storage::disk('public')->exists($trimmedPath)) {

                Storage::disk('public')->delete($trimmedPath);
            }
        }

        $gallery->update($formFields);
        return redirect(route('backend.gallery.index'))->with('success', "gallery updated successfully");


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $trimmedPath = trim(str_replace("/storage/", "", $gallery->image_path));

        if (Storage::disk('public')->exists($trimmedPath)) {

            Storage::disk('public')->delete($trimmedPath);
        }

        $gallery->delete();
        return redirect()->back()->with('success', "gallery deleted successfully");
    }
}