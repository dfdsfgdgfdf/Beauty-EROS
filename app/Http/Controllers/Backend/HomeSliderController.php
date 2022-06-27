<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\SliderRequest;
use App\Models\HomePage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomeSliderController extends Controller
{

    public function index()
    {
        if (!\auth()->user()->ability('superAdmin', 'manage_home,show_sliders')) {
            return redirect('admin/index');
        }

        $sliders = HomePage::whereType('Slider')->latest()->paginate(10);
        return view('backend.sliders.index', compact('sliders'));
    }


    public function create()
    {
        if (!\auth()->user()->ability('superAdmin', 'manage_home,show_sliders')) {
            return redirect('admin/index');
        }
        return view('backend.sliders.create');
    }


    public function store(SliderRequest $request)
    {
        if (!\auth()->user()->ability('superAdmin', 'manage_home,show_sliders')) {
            return redirect('admin/index');
        }

        $input['title']         = $request->title;
        $input['text']          = $request->text;
        $input['button_text']   = $request->button_text;
        $input['button_link']   = $request->button_link;
        $input['video']         = $request->video;
        $input['type']          = 'Slider';
        $input['status']        = $request->status;

        if ($image = $request->file('image')) {
            $filename = time() . md5(uniqid()) .'.'.$image->getClientOriginalExtension();
            $path = ('images/home_slider/' . $filename);
            $path_data = ('images/home_slider/' . $filename);
            // Image::make($image->getRealPath())->resize(600, 450, function ($constraint) {
            //     $constraint->aspectRatio();
            //     $constraint->upsize();
            // })->save($path, 100);

            // Image::make($image->getRealPath())->resize(800, 550)->save($path, 100);
            // $input['image']  = $path_data;
            Image::make($image->getRealPath())->save($path, 100);
            $input['image']  = $path_data;
        }

        HomePage::create($input);
        Alert::success('Home Slider Created Successfully', 'Success Message');
        return redirect()->route('admin.sliders.index');

    }


    public function show($id)
    {
        //
    }

    public function edit(HomePage $slider)
    {
        if (!\auth()->user()->ability('superAdmin', 'manage_home,show_sliders')) {
            return redirect('admin/index');
        }
        return view('backend.sliders.edit', compact('slider'));
    }


    public function update(SliderRequest $request, HomePage $slider)
    {
        if (!\auth()->user()->ability('superAdmin', 'manage_home,show_sliders')) {
            return redirect('admin/index');
        }

        $input['title']     = $request->title;
        $input['text']      = $request->text;
        $input['button_text']     = $request->button_text;
        $input['button_link']      = $request->button_link;
        $input['video']      = $request->video;
        $input['status']    = $request->status;

        if ($image = $request->file('image')) {

            if ($slider->image != null && is_file($slider->image)) {
                unlink($slider->image);
            }

            $filename = time() . md5(uniqid()) .'.'.$image->getClientOriginalExtension();
            $path = ('images/home_slider/' . $filename);
            $path_data = ('images/home_slider/' . $filename);
            Image::make($image->getRealPath())->save($path, 100);
            $input['image']  = $path_data;

            // Image::make($image->getRealPath())->resize(800, 550)->save($path, 100);
            // $input['image']  = $path_data;
        }

        $slider->update($input);
        Alert::success('Home Slider Updated Successfully', 'Success Message');
        return redirect()->route('admin.sliders.index');
    }


    public function destroy(HomePage $slider)
    {
        if (!\auth()->user()->ability('superAdmin', 'manage_home,show_sliders')) {
            return redirect('admin/index');
        }

        if ($slider->image != null && is_file($slider->image)) {
            unlink($slider->image);
        }
        $slider->delete();
        Alert::success('Home Slider Deleted Successfully', 'Success Message');
        return redirect()->route('admin.sliders.index');

    }


    public function removeImage(Request $request)
    {

        if (!\auth()->user()->ability('superAdmin', 'manage_home,show_sliders')) {
            return redirect('admin/index');
        }

        $slider = HomePage::whereId($request->slider_id)->first();
        if ($slider) {
            if (is_file($slider->image)) {
                unlink($slider->image);

                $slider->image = null;
                $slider->save();
            }
        }
        return true;
    }

    public function massDestroy(Request $request)
    {
        $ids = $request->ids;
        foreach ($ids as $id) {
            $slider = HomePage::findorfail($id);
            $image   = $slider->media()->whereId($request->image_id)->first();
            if ($image) {
                if (File::exists($image->file_name)) {
                    unlink($image->file_name);
                }
            }
            $slider->delete();
        }
        return response()->json([
            'error' => false,
        ], 200);

    }

    public function changeStatus(Request $request)
    {
        $slider = HomePage::find($request->cat_id);
        $slider->status = $request->status;
        $slider->save();
        return response()->json(['success'=>'Status Change Successfully.']);
    }

}

