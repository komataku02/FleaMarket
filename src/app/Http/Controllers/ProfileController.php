<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();

        if (!$user->profile) {
            $user->profile()->create([
                'postal_code' => '',
                'address' => '',
                'building_name' => '',
                'profile_image_path' => '',
            ]);
        }

        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'postal_code' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:255',
            'building_name' => 'nullable|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {

            if ($user->profile && $user->profile->profile_image_path) {
                Storage::disk('public')->delete($user->profile->profile_image_path);
            }

            $path = $request->file('profile_image')->store('profile-images', 'public');
            $user->profile->profile_image_path = $path;
        }


        $user->name = $request->input('name');
        $user->save();

        $user->profile->update([
            'postal_code' => $request->input('postal_code'),
            'address' => $request->input('address'),
            'building_name' => $request->input('building_name'),
        ]);

        return redirect()->route('profile.edit')->with('success', 'プロフィールを更新しました');
    }

    public function deleteImage()
    {
        $user = Auth::user();

        if ($user->profile && $user->profile->profile_image_path) {
            Storage::disk('public')->delete($user->profile->profile_image_path);
            $user->profile->profile_image_path = null;
            $user->profile->save();
        }

        return redirect()->route('profile.edit')->with('success', 'プロフィール画像を削除しました');
    }
}