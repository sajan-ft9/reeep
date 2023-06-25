<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::get();
        return view('backend.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.news.create');

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
            'title'=> 'required|string|max:100',
            'description'=> 'required|string',
            'image_path' => 'required|mimes:png,jpg,jpeg|max:8096',
            'category' => 'required|string'
        ]);

        $imageName = time() . '.' . $request->image_path->extension();
        $request->image_path->storeAs('news', $imageName, 'public');
        $formFields['image_path'] = '/storage/news/' . $imageName;  
        News::create($formFields);
        return redirect(route('backend.news.index'))->with('success', 'News us created successfully');
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
    public function edit(News $news)
    {
        return view('backend.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $formFields = $request->validate([
            'title'=> 'required|string|max:100',
            'description'=> 'required|string',
            'image_path' => 'mimes:png,jpg,jpeg|max:8096',
            'category' => 'required|string'

        ]);

        if ($request->image_path) {

            $imageName = time() . '.' . $request->image_path->extension();
            $request->image_path->storeAs('news', $imageName, 'public');
            $formFields['image_path'] = '/storage/news/' . $imageName;

            $trimmedPath = trim(str_replace("/storage/", "", $news->image_path));

            if (Storage::disk('public')->exists($trimmedPath)) {

                Storage::disk('public')->delete($trimmedPath);
            }
        }

        $news->update($formFields);
        return redirect(route('backend.news.index'))->with('success', "News updated successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $trimmedPath = trim(str_replace("/storage/", "", $news->image_path));

        if (Storage::disk('public')->exists($trimmedPath)) {

            Storage::disk('public')->delete($trimmedPath);
        }

        $news->delete();
        return redirect()->back()->with('success', "News deleted successfully");
    }
}
