<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\About;
use App\Models\Album;
use App\Models\Banner;
use App\Models\Gallery;
use App\Models\Partner;
use App\Models\Working;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        $data['banners'] = Banner::get();
        $about = About::take(1)->first();
        $data['news'] = News::take(3)->get();
        $data['workings'] = Working::take(5)->get();
        $data['partners'] = Partner::take(3)->get();
        $data['albums'] = Album::take(3)->get();
        return view('public.index', compact('data','about'));
    }
    
    public function about(){
        $abouts = About::get();

        return view('public.about', compact('abouts'));
    }

    public function news(Request $request){
        $news = News::Where('category', 'LIKE', '%'.$request->search. '%')
        ->get();
       
        return view('public.news.index', compact('news'));
    }

    public function newsDetail(News $news){

        $recent_news = News::where('id', '!=', $news->id)
        ->take(3)
        ->latest()
        ->get();
    
        return view('public.news.detail', compact('news', 'recent_news'));
    }

    public function working(){
        $workings = Working::get();
       
        return view('public.working.index', compact('workings'));
    }

    public function workingDetail(Working $working){

        return view('public.working.detail', compact('working'));
    }

    public function partner(){
        $partners = Partner::get();
       
        return view('public.partner.index', compact('partners'));
    }

    public function partnerDetail(Partner $partner){

        return view('public.partner.detail', compact('partner'));
    }

    public function gallery(){
        $albums = Album::get();
       
        return view('public.gallery.index', compact('albums'));
    }

    public function galleryDetail(Album $gallery){

        return view('public.gallery.detail', compact('gallery'));
    }



}
