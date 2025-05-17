<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $profile = $user->profile;

        return view('auth.overview', [
            'user' => $user,
            'profile' => $profile,
            'hideFooter' => true,
        ]);
    }

    public function edit()
    {
        $user = Auth::user();
        $profile = $user->profile;

       return view('auth.settings', [
            'user' => $user,
            'profile' => $profile,
            'hideFooter' => true,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'nullable|integer',
            'address' => 'nullable|string',
            'password' => 'nullable|confirmed|min:8',
        ]);

        $user = Auth::user();

        $userData = [
            'name' => $request->name,
        ];

        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        // Update user tanpa ->save()
        User::where('id', $user->id)->update($userData);

        // Update or create profile
        Profile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'age' => $request->age,
                'address' => $request->address,
            ]
        );

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
}
