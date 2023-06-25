<?php

namespace App\View\Composers;

use App\Models\Menu;
use Illuminate\View\View;

class MenuComposer
{
    public function compose(View $view)
    {
        $result = $this->getMenuItems();
        
        $view->with('result', $result);
    }

    private function getMenuItems($parentId = null) {
        $menuItems = Menu::where('status', 1)
            ->where('parent_id', $parentId)
            ->get();
    
        foreach ($menuItems as $menuItem) {
            $menuItem->children = $this->getMenuItems($menuItem->id);
        }
    
        return $menuItems;
    }
}
