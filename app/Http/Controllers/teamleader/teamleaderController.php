<?php

namespace App\Http\Controllers\teamleader;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class teamleaderController extends Controller
{
    public function members()
    {
        $users = User::where('status', 'deactivate')->Where('role_as', 'member')->where('teamlead_status', 'teamleader')->where('wp_message', 'done')->where('teamleader_id', auth()->user()->id)->Orwhere('myleads_response', 'right_wp')->get();
        
        return view('backend.teamleader.member', compact('users'));
    }
}
