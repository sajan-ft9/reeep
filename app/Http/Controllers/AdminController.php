<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Contact;
use App\Models\News;
use App\Models\Partner;
use App\Models\User;
use App\Models\Working;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['news'] = News::count();  
        $data['partner'] = Partner::count(); 
        $data['album'] = Album::count(); 
        $data['contact'] = Contact::count(); 
        return view('backend.admin.index',compact('data'));
    }

    public function profile(){
        $user = auth()->user();
        return view('backend.admin.profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 

     public function update(Request $request, User $admin)
     {
        $formFields = $request->validate([
             'email'  => ["required", "email", 'unique:users,email,' . $admin->id],
             'name'  => "required|string|max:50",
             'image_path' => ['image', 'mimes:png,jpg,jpeg', 'max:4096'],
         ]);
         if ($request->image_path) {

            $imageName = time() . '.' . $request->image_path->extension();
            $request->image_path->storeAs('admin', $imageName, 'public');
            $formFields['image_path'] = '/storage/admin/' . $imageName;

            $trimmedPath = trim(str_replace("/storage/", "", $admin->image_path));

            if (Storage::disk('public')->exists($trimmedPath)) {

                Storage::disk('public')->delete($trimmedPath);
            }
        }
      
 
         $admin->update($formFields);
 
         return redirect(route('backend.profile'))->with('success', "Profile updated successfully");
     }

     public function passwordUpdate(Request $request, User $admin){
        $request->validate([
            'old_password'=>["required"],
            'password'=>['required','min:8','confirmed'],
        ]);
       
        $oldPassword = $request->old_password;

        if (Hash::check($oldPassword, $admin->password)) {
            
            $admin->update(['password'=>Hash::make($request->password)]);
            return redirect()->back()->with("success", "Password updated successfully");    
        } else {
            return redirect()->back()->with('danger',"Old password is incorrect");
        }
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logout()
    {   
        Auth::logout();
        return redirect('/');
    }


}
