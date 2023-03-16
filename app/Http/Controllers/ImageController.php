<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Image;
class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function display()
    {
        $images = Image::all();
        return view('gallerie', compact('images'));
    }
    public function index()
    {
        $images = Image::orderBy('created_at', 'desc')->paginate(4);
        return view('dashboard', compact('images'));
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
    public function upload(Request $request)
    {
        $rules = [
            'description' => 'required|string|max:255',
            'plat_picture' => 'required|image|max:1024',
        ];
        $validatedData = $request->validate($rules);
        $data['description'] = $request->input('description');
        if($request->hasFile('plat_picture')){
            $image=$request->file('plat_picture');
            $fileimage=time().$image->getClientOriginalName();
            $image->move(public_path('/myimages/'),$fileimage);
            $data['plat_picture']   = $fileimage;
        }
        Image::create($data);
        return redirect()->route('dashboard')->with('message','Image has been added successfuly');
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
    public function edit($id)
    {
        $image=Image::where('id',$id)->first();
        return view('edit',compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'plat_descreption' => 'required|string|max:255',
        ];
        $validatedData = $request->validate($rules);
        $image=Image::find($id);
        if($request->hasFile('myplat_picture')){
            $image= $request->file('myplat_picture');
            $filename= time().$image->getClientOriginalName();
            $image->move(public_path('/myimages/'),$filename);
            $image->plat_picture=$filename;
        }
        $image->description=$request->input('plat_descreption');
        $image->update();
        return redirect()->route('dashboard')->with('message','Image has been updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Image::where('id', $id)->delete();
        return redirect()->route('dashboard')->with('message', 'Image has been deleted successfully');
    }
}
