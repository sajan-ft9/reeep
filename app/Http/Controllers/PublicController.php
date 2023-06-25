<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\News;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        $banners = Banner::get();
        $about = About::take(1)->first();
        $news = News::take(3)->get();
        return view('public.index', compact('banners', 'about', 'news'));
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

}
