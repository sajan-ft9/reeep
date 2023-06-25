<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        $banners = Banner::get();
        $about = About::take(1)->first();
        return view('public.index', compact('banners', 'about'));
    }
    
    public function about(){
        $abouts = About::get();

        return view('public.about', compact('abouts'));
    }

}
