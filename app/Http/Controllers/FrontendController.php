<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\About;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Contact; 

class FrontendController extends Controller
{
    //
    public function OurTeam(){
        return view('home.team.team_page');
    }

    public function AboutUs(){
        return view('home.about.about_us'); 
    }

    public function ContactUs(){
        return view('home.contact.contact_us');
    }
    public function ContactMessage(Request $request){

    Contact::create([
        'name' => $request->name,
        'email' => $request->email,
        'message' => $request->message,
    ]);

    $notification = array(
        'message' => 'Your Message Sent Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

}

public function ContactAllMessage(){
    $message=Contact::latest()->get();
    return view('admin.backend.contact.all_message',compact('message'));
}

public function GetAboutUs(){
    $about= About::find(1);
    return view('admin.backend.about.get_about',compact('about'));
}

 public function UpdateAbout(Request $request)
    {
        $about_id = $request->id;
        $about = About::findOrFail($about_id);

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            
            // Process & Save Image
            $img = $manager->read($image);
            $img->resize(526, 550)->save(public_path('upload/about/' . $name_gen));
            $save_url = 'upload/about/' . $name_gen;

            // Delete the old image from the server if it exists
            if ($about->image && file_exists(public_path($about->image))) {
                @unlink(public_path($about->image));
            }

            $about->update([
                'title' => $request->title,
                
                'description' => $request->description,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'About Page Updated with Image Successfully',
                'alert-type' => 'success'
            );

        } else {
            $about->update([
                'title' => $request->title,
                
                'description' => $request->description,
            ]);

            $notification = array(
                'message' => 'About Page Updated without Image Successfully',
                'alert-type' => 'success'
            );
        }

        return redirect()->back()->with($notification);
    }

    public function BlogPage(){
    $post=BlogPost::latest()->limit(5)->get();
    $recentpost=BlogPost::latest()->limit(3)->get();
    $blogcat= BlogCategory::latest()->withCount('posts')->get();
    return view('home.blog.list_blog',compact('blogcat','post','recentpost'));
      


    }

  public function BlogDetails($slug) {
    // This will throw a 404 error if the slug is wrong/missing
    $blog = BlogPost::where('post_slug', $slug)->firstOrFail(); 
    
    $blogcat = BlogCategory::latest()->withCount('posts')->get();
    $recentpost = BlogPost::latest()->limit(3)->get();
    
    return view('home.blog.blog_details', compact('blog', 'blogcat', 'recentpost'));
}


public function BlogCategory($id){
    $blog = BlogPost::where('blogcat_id',$id)->get();
    $categoryname = BlogCategory::where('id',$id)->first();
    $blogcat = BlogCategory::latest()->withCount('posts')->get();
    $recentpost = BlogPost::latest()->limit(3)->get();
    return view('home.blog.blog_category',compact('blog','blogcat',
    'recentpost','categoryname'));
}

public function Home(){
    return view('home.index');
}

// End Method
}
