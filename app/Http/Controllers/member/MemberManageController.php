<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use App\Models\Network;
use App\Models\User;
use Illuminate\Http\Request;

class MemberManageController extends Controller
{

    public function sponsorList()
    {
        $networkDatas = Network::with('usertwo')->where('parent_id', auth()->user()->id)->get();
        // return $networkDatas;
        return view('backend.member.sponsor-list', compact('networkDatas'));
    }


    // public function activemember()
    // {

    //     $users = User::where('status', 'active')->where('role_as', 'member')->get();
    //      return $users;

    //     return view('backend.admin.member-manage.active-member');
    // }

    // public function inactivemember()
    // {

    //     $users = User::where('status', 'deactivate')->where('role_as', 'member')->get();


    //     return view('backend.admin.member-manage.inactive-member', compact('users'));
    // }


}
