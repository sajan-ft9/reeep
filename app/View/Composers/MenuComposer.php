<?php
 
namespace App\View\Composers;
 
use App\Models\Menu;
use Illuminate\View\View;
 
class MenuComposer
{
    public function compose(View $view)
    {
        // $menus = Menu::whereNull('parent_id')
        // ->where('status', 1)
        // ->get();
        // $submenus = Menu::whereNotNull('parent_id')
        // ->where('status',1)->get();
    
        $allmenus = Menu::get();

        $rootmenus = Menu::whereNull('parent_id')->get();
        $result = [];
        foreach ($rootmenus as $rootmenu) {
            $rootmenu->children = $this->getChildren($allmenus, $rootmenu->id);
            $result[] = $rootmenu;
        }

        $view->with('result', $result);
    }

    private function getChildren($menus, $parentId){
        {
            $children = $menus->where('parent_id', $parentId)->values();
            
            foreach ($children as $child) {
                $child->children = $this->getChildren($menus, $child->id);
            }
            
            return $children;
        }
    }
}