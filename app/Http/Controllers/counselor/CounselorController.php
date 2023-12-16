<?php

namespace App\Http\Controllers\counselor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CounselorController extends Controller
{
    public function inactiveMembers()
    {
        $users = User::where('status', 'deactivate')->Where('role_as', 'member')->Where('management_type', 'counsellor')->get();

        return view('backend.counselor.inactive-members', compact('users'));
    }
}
