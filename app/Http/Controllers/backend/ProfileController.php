<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Subadmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $id = auth()->user()->id;

        $userdata = User::where('id', $id)->with(['subadmin'])->first();
        // return $userdata;
        $user =  User::where('id', auth()->user()->id)->first();
        $referRoute = route('register', ['ref' => $user->referral_code]);

        return view('backend.profile', compact(['userdata', 'referRoute']));

    }
}
