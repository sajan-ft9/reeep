<?php
 
namespace App\View\Composers;
 
use App\Models\Menu;
use Illuminate\View\View;
 
class MenuComposer
{
    public function compose(View $view)
    {
        $menus = Menu::whereNull('parent_id')
        ->where('status', 1)
        ->get();
        $submenus = Menu::whereNotNull('parent_id')
        ->where('status',1)->get();
    
        $view->with('menus', $menus);
        $view->with('submenus', $submenus);
    }
}