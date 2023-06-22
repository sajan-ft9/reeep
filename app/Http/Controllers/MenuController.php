<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnCallback;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::whereNull('parent_id')->get();
        // dd($menus, $submenus);
        return view('backend.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $menus = Menu::pluck('name', 'id');

        // $menuData = Menu::all()->groupBy('parent_id')->mapWithKeys(function ($items, $parent_id) {
        //     return [$parent_id => $items->pluck('name', 'id')];
        // })->toArray();
        // $menuOptions = [];
        // $childMenuOptions = [];

        // foreach ($menuData as $parentKey => $items) {
        //     if ($parentKey === "") {
        //         $menuOptions = $items;
        //     } else {
        //         $childMenuOptions[$parentKey] = $items;
        //     }
        // }

        // return view("backend.menu.create", compact('menuOptions', 'childMenuOptions'));

        $allmenus = Menu::get();

        $rootmenus = Menu::whereNull('parent_id')->get();
        $result = [];
        foreach ($rootmenus as $rootmenu) {
            $rootmenu->children = $this->getChildren($allmenus, $rootmenu->id);
            $result[] = $rootmenu;
        }
        // return $result;
       return view('backend.menu.create', compact('result'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $formFields = $request->validate([
            'name' => 'required|string|unique:menus,name',
            'status' => 'required|boolean',
            'order' => 'required|numeric'
        ]);
        if ($request->parent_id) {

            $formFields['parent_id'] = $request->parent_id;
        }
        $formFields['slug'] = Str::slug($request->name);
        Menu::create($formFields);
        return redirect(route('backend.menu.index'))->with('success', 'Menu created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->back()->with('success', 'Menu deleted successfully');
    }

    public function toggleStatus(Menu $menu)
    {
        $menu->status = !$menu->status;
        $menu->save();
        return redirect()->back()->with('success', 'Menu status changed');
    }

    // public function menuPartial()
    // {
    //     $menus = Menu::whereNull('parent_id')
    //         ->where('status', 1)
    //         ->get();
    //     $submenus = Menu::whereNotNull('parent_id')
    //         ->where('status', 1)->get();
    //     return view('partials.homemenu', compact('menus', 'submenus'));
    // }
}
