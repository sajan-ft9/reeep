<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class MenuController extends Controller
{
    public function index()
    {


        $menus = Menu::with('children')->whereNull('parent_id')->orderBy('order')->get();


        return view('backend.menu.index', compact('menus'));
    }

    public function create()
    {

        $result = Menu::with('children')->whereNull('parent_id')->get();

        return view('backend.menu.create', compact('result'));
    }

    public function store(Request $request)
    {

        $formFields = $request->validate([
            'name' => 'required|string|unique:menus,name',
            'status' => 'required|boolean',
            'order' => 'required|numeric',
            'menu_location' => 'required|numeric'
        ]);

        if ($request->parent_id) {

            $formFields['parent_id'] = $request->parent_id;
            Menu::find($request->parent_id)->update(
                [
                    'menu_location' => 0
                ]
                );
        }

        $formFields['slug'] = Str::slug($request->name);
        Menu::create($formFields);

        return redirect(route('backend.menu.index'))->with('success', 'Menu created successfully');
    }

    public function show(Menu $menu)
    {
        $menus = Menu::with('children')->where('parent_id', $menu->id)->orderBy('order')->get();

        return view('backend.menu.index', compact('menus'));
    }

    public function edit(Menu $menu)
    {
        $result = Menu::with('children')->whereNull('parent_id')->get();

        return (view('backend.menu.edit', compact('menu', 'result')));
    }

    public function update(Request $request, Menu $menu)
    {
        $formFields = $request->validate([
            'name' => 'required|string|unique:menus,name,' . $menu->id . ',id',
            'status' => 'required|boolean',
            'order' => 'required|numeric',
            'menu_location' =>'required|numeric'
        ]);

        if(count($menu->children)> 0 && $request->menu_location == 1){
            return redirect()->back()->with('danger', 'Menu with children cannot be kept at footer');
        }
        if ($request->parent_id) {
            $formFields['parent_id'] = $request->parent_id;
        }
        // if($request->parent_id == $menu->id){
        //     return redirect()->back()->with('danger', 'Menu cannot be its own child');
        // }
        $formFields['slug'] = Str::slug($request->name);
        $menu->update($formFields);
        if($menu->parent_id){

            return redirect(route('backend.menu.show', $menu->parent->id))->with('success', 'Menu updated successfully');
        }
        return redirect(route('backend.menu.index'))->with('success', 'Menu updated successfully');

    }

    public function destroy(Menu $menu)
    {
        Menu::where('parent_id', "$menu->id")->update(
            [
                'parent_id' => $menu->parent_id
            ]
        );
        $menu->delete();
        return redirect()->back()->with('success', 'Menu deleted successfully');
    }

    public function toggleStatus(Menu $menu)
    {
        $menu->status = !$menu->status;
        $menu->save();
        return redirect()->back()->with('success', 'Menu status changed');
    }
}
