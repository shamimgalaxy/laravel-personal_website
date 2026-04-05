<?php

namespace App\Http\Controllers\Backend;
use App\Models\Team;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    //
    public function AllTeam(){
        $team = Team::latest()->get();
        return view('admin.backend.team.all_team', compact('team'));
    }
    public function AddTeam(){
        return view('admin.backend.team.add_team');
    }

       public function StoreTeam(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'name' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($request->file('image')) {
        $image = $request->file('image');
        $manager = new ImageManager(new Driver());
        
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        
        // It's good practice to ensure the directory exists
        $img = $manager->read($image);
        $img->resize(306, 400)->save(public_path('upload/team/' . $name_gen));
        
        $save_url = 'upload/team/' . $name_gen;

        Team::insert([
            'name' => $request->name,
            'position' => $request->position,
            'image' => $save_url,
            'created_at' => now(), // insert() doesn't auto-fill timestamps
        ]);

        $notification = [
            'message' => 'Team Member Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.team')->with($notification);
    }

} 

}