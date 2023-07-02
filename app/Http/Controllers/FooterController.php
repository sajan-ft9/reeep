<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footers = Footer::get();
        return view('backend.footer.index', compact('footers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.footer.create');
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
            'title' => 'required|string|max:255',
            'image_1' => 'required|mimes:png,jpg,jpeg|max:8096',
            'image_2' => 'required|mimes:png,jpg,jpeg|max:8096',
        ]);

        $imageName = time() . '.' . $request->image_1->extension();
        $request->image_1->storeAs('footer', $imageName, 'public');
        $formFields['image_1'] = '/storage/footer/' . $imageName;

        $imageName2 = time() . '.' . $request->image_2->extension();
        $request->image_2->storeAs('footer', $imageName2, 'public');
        $formFields['image_2'] = '/storage/footer/' . $imageName2;

        $count = Footer::count();
        if ($count == 0) {
            Footer::create($formFields);
        } else {
            return redirect()->back()->with('danger', 'Multiple entries not allowed');
        }
        return redirect(route('backend.footer.index'))->with('success', 'footer created successfully');
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
    public function edit(footer $footer)
    {
        return view('backend.footer.edit', compact('footer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, footer $footer)
    {
        $formFields = $request->validate([
            'title' => 'required|string|max:255',
            'image_1' => 'mimes:png,jpg,jpeg|max:8096',
            'image_2' => 'mimes:png,jpg,jpeg|max:8096',
        ]);

        if ($request->image_1) {

            $imageName = time() . '.' . $request->image_1->extension();
            $request->image_1->storeAs('footer', $imageName, 'public');
            $formFields['image_1'] = '/storage/footer/' . $imageName;

            $trimmedPath = trim(str_replace("/storage/", "", $footer->image_1));

            if (Storage::disk('public')->exists($trimmedPath)) {

                Storage::disk('public')->delete($trimmedPath);
            }
        }
        if ($request->image_2) {

            $imageName = time() . '.' . $request->image_2->extension();
            $request->image_2->storeAs('footer', $imageName, 'public');
            $formFields['image_2'] = '/storage/footer/' . $imageName;

            $trimmedPath = trim(str_replace("/storage/", "", $footer->image_2));

            if (Storage::disk('public')->exists($trimmedPath)) {

                Storage::disk('public')->delete($trimmedPath);
            }
        }


        $footer->update($formFields);
        return redirect(route('backend.footer.index'))->with('success', "footer updated successfully");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(footer $footer)
    {

        $trimmedPath = trim(str_replace("/storage/", "", $footer->image_1));

        if (Storage::disk('public')->exists($trimmedPath)) {

            Storage::disk('public')->delete($trimmedPath);
        }
        $trimmedPath2 = trim(str_replace("/storage/", "", $footer->image_2));

        if (Storage::disk('public')->exists($trimmedPath2)) {

            Storage::disk('public')->delete($trimmedPath2);
        }

        $footer->delete();
        return redirect()->back()->with('success', "footer deleted successfully");
    }
}
