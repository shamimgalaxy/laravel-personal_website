<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\BlogPost;
Use App\Http\Controllers\Backend\Str;

class BlogController extends Controller
{
    //
    public function BlogCategory(){

    $category= BlogCategory::latest()->get();
    return view('admin.backend.blogcategory.blog_category',compact('category'));

    }

  public function StoreBlogCategory(Request $request) {
    $category_id = $request->cat_id;

    if ($category_id) {
        // Update Logic
        BlogCategory::find($category_id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
        ]);
        $notification = array('message' => 'Category Updated Successfully', 'alert-type' => 'success');
    } else {
        // Insert Logic
        BlogCategory::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
        ]);
        $notification = array('message' => 'Category Inserted Successfully', 'alert-type' => 'success');
    }

    return redirect()->back()->with($notification);
}

  public function EditBlogCategory($id){

    $categories=BlogCategory::find($id);
    return response()->json($categories);
  }

   public function UpdateBlogCategory(Request $request){
    $cat_id = $request->cat_id;

    BlogCategory::find($cat_id)->update([
        'category_name' => $request->category_name,
        'category_slug' => strtolower(str_replace(' ', '-',
        $request->category_name)),
    ]);

    $notification = array(
        'message' => 'BlogCategory Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
}

public function DeleteBlogCategory($id){
    BlogCategory::findOrFail($id)->delete();

    $notification = array(
        'message' => 'BlogCategory Deleted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

}

 public function AllBlogPost(){
    $post= BlogPost::latest()->get();
    return view('admin.backend.post.all_post',compact('post'));


 }

 public function AddBlogPost(){
 $blogcat= BlogCategory::latest()->get();
 return view('admin.backend.post.add_post',compact('blogcat'));

 }


   public function StoreBlogPost(Request $request)
{
    // 1. Check if the image exists
    if ($request->file('image')) {
        $image = $request->file('image');
        $manager = new ImageManager(new Driver());
        
        // Generate Name
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        
        // Process & Save Image
        $img = $manager->read($image);
        $img->resize(746, 500)->save(public_path('upload/post/' . $name_gen));
        
        $save_url = 'upload/post/' . $name_gen;

        // 2. Create the Database Record
       BlogPost::create([
    'blogcat_id' => $request->blogcat_id,
    'post_title' => $request->post_title,
    'post_slug' => strtolower(str_replace(' ', '-',
    $request->post_title)),
    'long_descp' => $request->long_descp,
    'image' => $save_url,
]);

        // 3. Success Notification
        $notification = array(
            'message' => 'Blog PstInserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.post')->with($notification);
    }

    // 4. Fallback: If no image was uploaded, send them back with an error
    return redirect()->back()->with([
        'message' => 'Image upload is required!',
        'alert-type' => 'error'
    ]);
}

public function EditBlogPost($id){

$blogcat= BlogCategory::latest()->get();
$post=BlogPost::find($id);
return view('admin.backend.post.edit_post',compact('post','blogcat'));
}


public function UpdateBlogPost(Request $request){

    $post_id = $request->id;

    if ($request->file('image')) {
        $image = $request->file('image');
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()).'.'.
        $image->getClientOriginalExtension();
        $img = $manager->read($image);
        $img->resize(746,500)->save(public_path('upload/post/').
        $name_gen);
        $save_url = 'upload/post/'.$name_gen;

        BlogPost::find($post_id)->update([
            'blogcat_id' => $request->blogcat_id,
    'post_title' => $request->post_title,
    'post_slug' => strtolower(str_replace(' ', '-',
    $request->post_title)),
    'long_descp' => $request->long_descp,
    'image' => $save_url,
        ]);

         // 3. Success Notification
        $notification = array(
            'message' => 'Blog post Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.post')->with($notification);
    }

    // 4. Fallback: If no image was uploaded, send them back with an error
    return redirect()->back()->with([
        'message' => 'Image upload is required!',
        'alert-type' => 'error'
    ]);
}

    




public function DeleteBlogPost($id){
    $post = BlogPost::findOrFail($id);
    $img = $post->post_image;

    if ($img && file_exists(public_path($img))) {
        unlink(public_path($img));
    }

    $post->delete();

    $notification = array(
        'message' => 'Blog Post Deleted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
}

 



//end method
}



