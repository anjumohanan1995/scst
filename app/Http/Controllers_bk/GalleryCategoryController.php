<?php

namespace App\Http\Controllers;

use App\Models\GalleryCategory;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = GalleryCategory::all();
        return view('gallery.index', compact('galleries'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'gallery_name' => 'required',
            'gallery_status' => 'required',
        ]);
        $gal = new GalleryCategory();
        $gal->name = $request->gallery_name;
        $gal->status = $request->gallery_status;
        if ($gal->save()) {
            return redirect()->route('gallery_category.index')->with('success', 'Gallery saved successfully');
        }
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
        $gallery_category = GalleryCategory::find($id);
        //$gallery=getCategoryGallery($id);
        $gallery = Gallery::where('gallery_category_id', $id)->get();
        return view('gallery.edit', compact('gallery_category', 'gallery'));
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
        $gal = GalleryCategory::find($id);
        $gal->name = $request->gallery_name;
        $gal->status = $request->gallery_status;
        $gal->update();
        return redirect()->route('gallery_category.edit', $id)->with('success', 'gallery saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function galleryCategoryList(Request $request)
    {
        $gallery_cat_list = GalleryCategory::orderBy('id', 'DESC')->get();
        return view('gallery_category', compact('gallery_cat_list'));
    }

}
