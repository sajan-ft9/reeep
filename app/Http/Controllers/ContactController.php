<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::get();
        return view('backend.contact.index', compact('contacts')); 
    }
    
    public function replyMail(Request $request){
        $form=$request->validate([
            "email"=> "required|email",
            "message"=> "required|string|max:255"
        ]);

        Mail::to($request->email)->send(new \App\Mail\NewMail($request->message));

        return redirect()->back()->with('success', 'Reply sent successfully');
    }

}
