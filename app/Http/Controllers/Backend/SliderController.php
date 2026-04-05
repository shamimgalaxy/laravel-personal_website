<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SliderController extends Controller
{
    public function GetSlider(){
        $slider=Slider::find(1);
        return view('admin.backend.slider.get_slider', compact('slider'));
    }


    /**
     * Update an existing slider
     */
    public function UpdateSlider(Request $request)
    {
        $slider_id = $request->id;
        $slider = Slider::findOrFail($slider_id);

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            
            // Process & Save Image
            $img = $manager->read($image);
            $img->resize(306, 618)->save(public_path('upload/slider/' . $name_gen));
            $save_url = 'upload/slider/' . $name_gen;

            // Delete the old image from the server if it exists
            if ($slider->image && file_exists(public_path($slider->image))) {
                @unlink(public_path($slider->image));
            }

            $slider->update([
                'title' => $request->title,
                'link' => $request->link,
                'description' => $request->description,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Slider Updated with Image Successfully',
                'alert-type' => 'success'
            );

        } else {
            $slider->update([
                'title' => $request->title,
                'link' => $request->link,
                'description' => $request->description,
            ]);

            $notification = array(
                'message' => 'Slider Updated without Image Successfully',
                'alert-type' => 'success'
            );
        }

        return redirect()->back()->with($notification);
    }

    /**
     * Delete a slider (Fixed safety logic)
     */
    public function DeleteSlider($id) 
    {
        $slider = Slider::findOrFail($id);
        $img = $slider->image;

        // Ensure the file exists before attempting to delete it
        if ($img && file_exists(public_path($img))) {
            unlink(public_path($img));
        }

        $slider->delete();

        $notification = array(
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}