<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Subadmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function profile()
    {
        $id = auth()->user()->id;

        $userdata = User::with(['counselor', 'teamleader'])->where('id', $id)->first();
        // return $userdata;
        // $user =  User::with(['counselor', 'teamleader'])->where('id', auth()->user()->id)->first();
        // return $user;
        $referRoute = route('register', ['ref' => $userdata->referral_code]);
        return view('backend.profile', compact(['userdata', 'referRoute']));

    }


    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();

        $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'whats_app' => ['nullable', 'max:15', Rule::unique(User::class)->ignore($user->id)],
            'old_password' => ['nullable', 'min:8'],
            'password' => ['nullable'], // Removed Rules\Password::defaults()
            'image' => ['nullable', 'mimes:jpg,jpeg,png,webp'],
        ]);

        if ($request->filled('old_password') && !Hash::check($request->old_password, $user->password)) {
            return redirect()->route('profile')->with('error', 'The old password is incorrect.');
        }
        $user->update([
            'name' => $request->name,
            'whats_app' => $request->whats_app,
        ]);

        // Update password only if the password field is filled
        if ($request->filled('password')) {
            $password = Hash::make($request->password); // Ensure password is hashed using Hash::make
            $user->update(['password' => $password]);
        }

        $old_image = User::find($user->id);
        if ($request->hasFile('image')) {
            if ($old_image->image && file_exists(public_path($old_image->image))) {
                unlink(public_path($old_image->image));
            }
            $image = Upload($request->file('image'), 'uploads/members/', 400, 400);
            $user->update(['image' => $image]);
        }

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }



    public function adminupdateProfile(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();

        $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'whats_app' => ['nullable', 'max:15', Rule::unique(User::class)->ignore($user->id)],
            'old_password' => ['nullable', 'min:8'],
            'password' => ['nullable'], // Removed Rules\Password::defaults()
            'image' => ['nullable', 'mimes:jpg,jpeg,png,webp'],
        ]);

        if ($request->filled('old_password') && !Hash::check($request->old_password, $user->password)) {
            return redirect()->route('profile')->with('error', 'The old password is incorrect.');
        }
        $user->update([
            'name' => $request->name,
            'whats_app' => $request->whats_app,
        ]);

        // Update password only if the password field is filled
        if ($request->filled('password')) {
            $password = Hash::make($request->password); // Ensure password is hashed using Hash::make
            $user->update(['password' => $password]);
        }

        $old_image = User::find($user->id);
        if ($request->image) {
            if ($old_image->image && file_exists($old_image->image)) {
                unlink($old_image->image);
            }
            $image = upload_image($request->image, public_path('uploads/members/'), 400, 400);
            $user->update(['image' => $image]);
        }

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }



}
