<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class LangController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function create()
    {
        return view('backend.lang.create');
    }
  
    public function store(Request $request){
        $validatedData = $request->validate([
            'title.en' => 'required',
            'title.ne' => 'required',
            'description.en' => 'required',
            'description.ne' => 'required',
        ]);

        Lang::create([
            'title' => json_encode([
                'en' => $request->input('title')['en'],
                'ne' => $request->input('title')['ne'],
            ], JSON_UNESCAPED_UNICODE),
            'description' => json_encode([
                'en' => $request->input('description')['en'],
                'ne' => $request->input('description')['ne'],
            ], JSON_UNESCAPED_UNICODE)
        ]);
        

        return redirect()->route('backend.lang.index')->with('success', 'language created successfully.');
    }


    public function change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
  
        return redirect()->back();
    }

    public function get(){
        Lang::get();
    }

}
