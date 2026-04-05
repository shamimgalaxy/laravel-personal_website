<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ReviewController extends Controller
{
    public function AllReview(){
        $review = Review::latest()->get();
        return view('admin.backend.review.all_review', compact('review'));
    }

    public function AddReview(){
        return view('admin.backend.review.add_review');
    }
   public function StoreReview(Request $request)
{
    // 1. Check if the image exists
    if ($request->file('image')) {
        $image = $request->file('image');
        $manager = new ImageManager(new Driver());
        
        // Generate Name
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        
        // Process & Save Image
        $img = $manager->read($image);
        $img->resize(60, 60)->save(public_path('upload/review/' . $name_gen));
        
        $save_url = 'upload/review/' . $name_gen;

        // 2. Create the Database Record
        Review::create([
            'name' => $request->name,
            'position' => $request->position,
            'message' => $request->message,
            'image' => $save_url,
        ]);

        // 3. Success Notification
        $notification = array(
            'message' => 'Review Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.review')->with($notification);
    }

    // 4. Fallback: If no image was uploaded, send them back with an error
    return redirect()->back()->with([
        'message' => 'Image upload is required!',
        'alert-type' => 'error'
    ]);
}
   public function EditReview($id){
    $review = Review::find($id);
    return view('admin.backend.review.edit_review', compact('review'));
   } 


  public function DeleteReview($id) {
    $review = Review::find($id);
    $img = $review->image;
    unlink($img);
    Review::find($id)->delete();
    $notification = array(
        'message' => 'Review Deleted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
}
}
