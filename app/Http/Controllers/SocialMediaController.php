<?php

namespace App\Http\Controllers;

use App\Models\SocialMediaAccount;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    //
    public function admin_social_links()
    {
        $social_links=SocialMediaAccount::all();
        return view('admin.social-links',compact('social_links'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'platform' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);

        SocialMediaAccount::create([
            'user_id' => auth()->id(),  // Assuming user is logged in
            'platform' => $request->platform,
            'url' => $request->url,
        ]);

        return redirect()->back()->with('success', 'Social media account saved successfully.');
    }
    public function delete_social_link($id)
    {
        SocialMediaAccount::findOrFail($id)->delete();
        return redirect()->back()->with('Delete_success', 'Social media account Deleted successfully.');
    }


}
