<?php

namespace App\Http\Controllers;

use App\Models\Working;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workings = Working::get();
        return view('backend.working.index', compact('workings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.working.create');
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
        ]);

        $imageName = time() . '.' . $request->image_path->extension();
        $request->image_path->storeAs('working', $imageName, 'public');
        $formFields['image_path'] = '/storage/working/' . $imageName;  
        Working::create($formFields);
        return redirect(route('backend.working.index'))->with('success', 'working created successfully');
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
    public function edit(Working $working)
    {
        return view('backend.working.edit', compact('working'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Working $working)
    {   
        $formFields = $request->validate([
            'title'=> 'required|string|max:50',
            'description'=> 'required|string|max:254',
            'image_path' => 'mimes:png,jpg,jpeg|max:8096',
        ]);

        if ($request->image_path) {

            $imageName = time() . '.' . $request->image_path->extension();
            $request->image_path->storeAs('working', $imageName, 'public');
            $formFields['image_path'] = '/storage/working/' . $imageName;

            $trimmedPath = trim(str_replace("/storage/", "", $working->image_path));

            if (Storage::disk('public')->exists($trimmedPath)) {

                Storage::disk('public')->delete($trimmedPath);
            }
        }

        $working->update($formFields);
        return redirect(route('backend.working.index'))->with('success', "working updated successfully");


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Working $working)
    {
        $trimmedPath = trim(str_replace("/storage/", "", $working->image_path));

        if (Storage::disk('public')->exists($trimmedPath)) {

            Storage::disk('public')->delete($trimmedPath);
        }

        $working->delete();
        return redirect()->back()->with('success', "working deleted successfully");
    }
}

