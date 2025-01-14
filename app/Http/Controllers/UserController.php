<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Update the profile image for the authenticated user.
     */
    public function updateProfileImage(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $user = Auth::user();
    
        // Delete old profile image if it exists
        if ($user->profile_image && Storage::exists($user->profile_image)) {
            Storage::delete($user->profile_image);
        }
    
        // Store the new profile image
        $filePath = $request->file('profile_image')->store('profile_images', 'public');
        $user->profile_image = 'storage/' . $filePath;
    
        // Update related student's image if applicable
        if ($user->student) {
            $user->student->image = 'storage/' . $filePath;
            $user->student->save();
        }
        if ($user->lecturer) {
            $user->lecturer->profile_image = 'storage/' . $filePath;
            $user->lecturer->save();
        }

    
        $user->save();
    
        return redirect()->back()->with('success', 'Profile image updated successfully!');
    }
    
}
