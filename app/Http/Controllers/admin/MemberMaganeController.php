<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MemberMaganeController extends Controller
{
    
    

    public function inactivemember()
    {
        $users = User::where('status', 'deactivate')->where('role_as', 'member')->get();

        return view('backend.admin.member-manage.inactive-member', compact('users'));
    }
}
