<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Menu;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function displayMenu()
    {
        $menus = Menu::all();
        return view('menu', compact('menus'));
    }
    public function indexMenu()
    {
        $menus = Menu::orderBy('created_at', 'desc')->paginate(4);
        return view('DashboardMenu', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadMenu(Request $request)
    {
        $rules = [
            'menu_name' => 'required|string|max:100',
            'menu_price' => 'required',
            'menu_description' => 'required|string|max:255',
            'menu_picture' => 'required|image|max:1024',
        ];
        $validatedData = $request->validate($rules);
        $data['menu_name'] = $request->input('menu_name');
        $data['menu_price'] = $request->input('menu_price');
        $data['menu_description'] = $request->input('menu_description');
        if($request->hasFile('menu_picture')){
            $image=$request->file('menu_picture');
            $fileimage=time().$image->getClientOriginalName();
            $image->move(public_path('/myimages/'),$fileimage);
            $data['menu_picture']   = $fileimage;
        }
        Menu::create($data);
        return redirect()->route('DashboardMenu')->with('message','Menu has been added successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editMenu($id)
    {
        $menu=Menu::where('id',$id)->first();
        return view('editMenu',compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateMenu(Request $request, $id)
    {
        $rules = [
            'menu_name' => 'required|string|max:100',
            'menu_description' => 'required|string|max:255',
        ];
        $validatedData = $request->validate($rules);
        $menu=Menu::find($id);
        if($request->hasFile('menu_picture')){
            $image= $request->file('menu_picture');
            $filename= time().$image->getClientOriginalName();
            $image->move(public_path('/myimages/'),$filename);
            $plat->menu_picture=$filename;
        }
        $menu->menu_description=$request->input('menu_description');
        $menu->update();
        return redirect()->route('DashboardMenu')->with('message','Menu has been updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyMenu($id)
    {
        Menu::where('id', $id)->delete();
        return redirect()->route('DashboardMenu')->with('message', 'Menu has been deleted successfully');
    }
}
