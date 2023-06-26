<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::get();
        return view('backend.partner.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.partner.create');
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
        $request->image_path->storeAs('partner', $imageName, 'public');
        $formFields['image_path'] = '/storage/partner/' . $imageName;  
        Partner::create($formFields);
        return redirect(route('backend.partner.index'))->with('success', 'partner created successfully');
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
    public function edit(Partner $partner)
    {
        return view('backend.partner.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {   
        $formFields = $request->validate([
            'title'=> 'required|string|max:50',
            'description'=> 'required|string|max:254',
            'image_path' => 'mimes:png,jpg,jpeg|max:8096',
        ]);

        if ($request->image_path) {

            $imageName = time() . '.' . $request->image_path->extension();
            $request->image_path->storeAs('partner', $imageName, 'public');
            $formFields['image_path'] = '/storage/partner/' . $imageName;

            $trimmedPath = trim(str_replace("/storage/", "", $partner->image_path));

            if (Storage::disk('public')->exists($trimmedPath)) {

                Storage::disk('public')->delete($trimmedPath);
            }
        }

        $partner->update($formFields);
        return redirect(route('backend.partner.index'))->with('success', "partner updated successfully");


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        $trimmedPath = trim(str_replace("/storage/", "", $partner->image_path));

        if (Storage::disk('public')->exists($trimmedPath)) {

            Storage::disk('public')->delete($trimmedPath);
        }

        $partner->delete();
        return redirect()->back()->with('success', "partner deleted successfully");
    }
}
