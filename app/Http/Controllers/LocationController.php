<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::get();
        return view('backend.location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.location.create');
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
            'map' => 'required|string|max:2048',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'website' => 'required|url|max:255',
            'call' => 'required|string|max:255',
        ]);
        $count = Location::count();
        if ($count == 0) {
            Location::create($formFields);
        } else {
            return redirect()->back()->with('danger', 'Multiple entries not allowed');
        }
        return redirect(route('backend.location.index'))->with('success', 'location created successfully');
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
    public function edit(Location $location)
    {
        return view('backend.location.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        $formFields = $request->validate([
            'map' => 'required|string|max:2048',
            'address' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'website' => 'required|string|max:255',
            'call' => 'required|string|max:255',
        ]);

        $location->update($formFields);
        return redirect(route('backend.location.index'))->with('success', "location updated successfully");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->back()->with('success', "location deleted successfully");
    }
}
