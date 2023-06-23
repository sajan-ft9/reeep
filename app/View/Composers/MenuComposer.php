<?php

namespace App\View\Composers;

use App\Models\Menu;
use Illuminate\View\View;

class MenuComposer
{
    public function compose(View $view)
    {
        $result = Menu::with('children')->whereNull('parent_id')->orderBy('order')->get();

        $view->with('result', $result);
    }
}
