<?php

namespace App\View\Composers;

use App\Models\Footer;
use App\Models\Location;
use App\Models\Menu;
use App\Models\Social;
use Illuminate\View\View;

class FooterComposer
{
    public function compose(View $view)
    {
        $location = Location::first();
        $footer = Footer::first();
        $footmenu =Menu::where('menu_location', 1)->get();
        $socials = Social::get();
        
        $view->with('location', $location)
        ->with('footer', $footer)
        ->with('socials', $socials)
        ->with('footmenu', $footmenu);
    }

}
