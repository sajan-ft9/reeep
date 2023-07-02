<?php

namespace App\View\Composers;

use App\Models\Menu;
use App\Models\Footer;
use App\Models\Contact;
use Illuminate\View\View;

class MenuComposer
{
    public function compose(View $view)
    {
        $result = $this->getMenuItems();

        $view->with('result', $result);
    }

    private function getMenuItems($parentId = null)
    {
        $menuItems = Menu::where('status', 1)
            ->where('menu_location', 0)
            ->where('parent_id', $parentId)->orderBy('order')
            ->get();

        foreach ($menuItems as $menuItem) {
            $menuItem->children = $this->getMenuItems($menuItem->id);
        }
        return $menuItems;
    }
}
