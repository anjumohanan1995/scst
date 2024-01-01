<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\SliderCategory;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->paginate(5);
        return view('sliders.index', compact('sliders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function createSlider($id)
    {
        //  dd($id);
        $slide = SliderCategory::get();
        return view('sliders.create', compact('id', 'slide'));
    }

    public function store(Request $request)
    {
     //dd($request->sid);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $image = $request->file('image');
        $input['image'] = time() . '.' . $image->extension();
        $destinationPath = public_path('/admin/uploads/thumbnails');

        /*$img = Img::make($image->path());
        if($request->cposition=="testimonial")
        {
        $width=65;
        $height=65;
        }
        else if($request->cposition=="photos-and-videos")
        {
        $width=360;
        $height=282;
        }
        else if($request->cposition=="initiative")
        {
        $width=386;
        $height=261;
        }
        else
        {
        $width=1500;
        $height=720;

        }

        $img->resize($width,$height, function ($constraint) {

        //$constraint->aspectRatio();

        })->save($destinationPath.'/'.$input['image']);*/

        // $destinationPath = public_path('/admin/uploads/images');

        if ($image->move($destinationPath, $input['image'])) {
            if ($request->button_text && $request->button_url) {
                $bstatus = 1;
            } else {
                $bstatus = 0;
            }
            $slider = new Slider();
            $slider->slider_category_id = $request->sid;
            $slider->title = $request->title;
            $slider->description = $request->description;
            $slider->image = $input['image'];
            $slider->button_text = $request->button_text;
            $slider->button_url = $request->button_url;
            $slider->button_one_text = $request->button_one_text;
            $slider->button_one_url = $request->button_one_url;
            $slider->button_status = $bstatus;
            $slider->slider_style = $request->slider_style;
            $slider->color = $request->color ?? '45b2fb';
            $slider->slider_status = $request->slider_status;

            if ($slider->save()) {
                //  return redirect()->route('slidercategories.edit',$request->cid)

                //    ->with('success','Slider saved successfully');
                return redirect()->back()->with('success', 'Slider saved successfully');
            }
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Slider $slider)
    {
        $categories = SliderCategory::all();
        return view('sliders.edit', compact('slider', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $categories = SliderCategory::all();
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        if ($request->file('image') != '') {
            $image = $request->file('image');

            $input['image'] = time() . '.' . $image->extension();

            $destinationPath = public_path('/admin/uploads/thumbnails');

            /*$img = Img::make($image->path());
            if($request->cposition=="testimonial")
            {
            $width=65;
            $height=65;
            }
            else if($request->cposition=="photos-and-videos")
            {
            $width=360;
            $height=282;
            }
            else if($request->cposition=="initiative")
            {
            $width=386;
            $height=261;
            }
            else
            {
            $width=1500;
            $height=720;

            }

            $img->resize($width,$height, function ($constraint) {

            //$constraint->aspectRatio();

            })->save($destinationPath.'/'.$input['image']);*/

            //$destinationPath = public_path('/admin/uploads/images');
            $image->move($destinationPath, $input['image']);
        } else {
            $input['image'] = $request->imgs;
        }

        if ($request->button_text && $request->button_url) {
            $bstatus = 1;
        } else {
            $bstatus = 0;
        }
        $slider = Slider::find($id);
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->slider_type = $request->slider_type ?? '';
        $slider->image = $input['image'];
        $slider->button_text = $request->button_text;
        $slider->button_url = $request->button_url;
        $slider->button_one_text = $request->button_one_text;
        $slider->button_one_url = $request->button_one_url;
        $slider->button_status = $bstatus;
        $slider->slider_style = $request->slider_style;
        $slider->slider_status = $request->slider_status;
        $slider->color = $request->color ?? '45b2fb';
        $slider->slider_category_id = $request->slider_category_id;

        if ($slider->update()) {
            return redirect()->route('slidercategories.edit', $request->slider_category_id)

                ->with('success', 'Slider updated successfully');
        }
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('slidercategories.edit', $slider->slider_category_id) -> with('success', 'Slider deleted successfully');
    }
    public function codeofethics()
    {
        return view('reports.codeofethics');
    }

}
