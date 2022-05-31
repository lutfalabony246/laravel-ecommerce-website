<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
// use Image;
use Carbon\Carbon;
use App\Models\Slider;


class SliderController extends Controller
{
    // Slider View
    public function SliderView()
    {
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_all', compact('sliders'));
    } // end method

    public function showdata()
    {
        $sliders = Slider::latest()->get();

        return response()->json([
            'data' => $sliders
        ], 200);
    }

    public function SliderStore(Request $request, $role)
    {

        $validator = Validator::make($request->all(), [
            // 'title' => 'required',
            // 'description' => 'required',
            'slider_img' => 'required|image',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            if ($request->slider_img) {
                // for image
                $file = $request->file('slider_img');
                $extension = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
                Image::make($file)->resize(933, 236)->save('upload/slider/' . $extension);
                $save_url = 'upload/slider/' . $extension;
                $slider = new Slider;
                $slider->title = $request->input('title');
                $slider->description = $request->input('description');
                $slider->slider_img = $save_url;
                $slider->save();

                return response()->json([
                    'status' => 200,
                    'message' => 'Slider  Added Successfully.'
                ]);
            } else {
                $slider = new Slider;
                $slider->title = $request->input('title');
                $slider->description = $request->input('description');
                $slider->save();

                return response()->json([
                    'status' => 200,
                    'message' => 'Slider  Added Successfully.'
                ]);
            }
        }
    }

    // slider  edit
    public function SliderEdit($role, $id)
    {

        $sliders = Slider::findOrFail($id);

        return response()->json($sliders);
    }

    // slider Update
    public function SliderUpdate(Request $request, $role, $id)
    {

        $slider_update = Slider::findOrFail($id);
        if ($request->file('slider_img')) {

            $destination = public_path($slider_update->slider_img);

            if (file_exists($destination)) {
                unlink($destination);
            }

            $image = $request->file('slider_img');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(955, 470)->save('upload/slider/' . $name_gen);
            $save_url = 'upload/slider/' . $name_gen;

            $slider_update =  Slider::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'slider_img' => $save_url,
            ]);
        } else {
            $slider_update =  Slider::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
        }

        return response()->json(
            [
                'message' => 'Slider Updated Successfully.',
                'alert-type' => 'info'
            ]
        );
    } // end method


    // Delete Slider
    public function SliderDelete(Request $request, $role, $id)
    {
        $slider_update = Slider::find($id)->delete();

        return response()->json($slider_update);
    } // end method




    // Deactive Slider
    public function SliderDeactive($role, $id)
    {
        Slider::findOrFail($id)->update(['status' => 0,]);

        // pass the sms
        $notification = array(
            'message' => 'Slider Deactive Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end mathod


    // Active Slider
    public function SliderActive($role, $id)
    {
        Slider::findOrFail($id)->update(['status' => 1,]);

        // pass the sms
        $notification = array(
            'message' => 'Slider Active Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end mathod


}
