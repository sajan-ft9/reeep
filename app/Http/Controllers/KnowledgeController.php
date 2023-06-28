<?php

namespace App\Http\Controllers;

use App\Models\Knowledge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KnowledgeController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $knowledges = Knowledge::get();
        return view('backend.knowledge.index', compact('knowledges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.knowledge.create');
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
            'description'=> 'required|string|max:255',
            'image_path' => 'required|mimes:png,jpg,jpeg,pdf|max:8096',
        ]);

        $imageName = time() . '.' . $request->image_path->extension();
        $request->image_path->storeAs('knowledge', $imageName, 'public');
        $formFields['image_path'] = '/storage/knowledge/' . $imageName;  
        Knowledge::create($formFields);
        return redirect(route('backend.knowledge.index'))->with('success', 'knowledge created successfully');

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
    public function edit(Knowledge $knowledge)
    {
        return view('backend.knowledge.edit', compact('knowledge'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Knowledge $knowledge)
    {   
        $formFields = $request->validate([
            'title'=> 'required|string|max:50',
            'description'=> 'required|string|max:255',
            'image_path' => 'mimes:png,jpg,jpeg,pdf|max:8096',
        ]);

        if ($request->image_path) {

            $imageName = time() . '.' . $request->image_path->extension();
            $request->image_path->storeAs('knowledge', $imageName, 'public');
            $formFields['image_path'] = '/storage/knowledge/' . $imageName;

            $trimmedPath = trim(str_replace("/storage/", "", $knowledge->image_path));

            if (Storage::disk('public')->exists($trimmedPath)) {

                Storage::disk('public')->delete($trimmedPath);
            }
        }

        $knowledge->update($formFields);
        return redirect(route('backend.knowledge.index'))->with('success', "knowledge updated successfully");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Knowledge $knowledge)
    {
        $trimmedPath = trim(str_replace("/storage/", "", $knowledge->image_path));

        if (Storage::disk('public')->exists($trimmedPath)) {

            Storage::disk('public')->delete($trimmedPath);
        }

        $knowledge->delete();
        return redirect()->back()->with('success', "knowledge deleted successfully");
    }
}
