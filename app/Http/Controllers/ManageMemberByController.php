<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class ManageMemberByController extends Controller
{
    public function inactiveMembers()
    {
        $users = User::where('status', 'deactivate')->Where('role_as', 'member')->Where('management_type', 'controller')->get();

        return view('backend.controller.inactive-members', compact('users'));
    }


    public function transferMember(Request $request)
    {
        $request->validate([
            'languages' => 'required',
            'management_type' => 'required',
        ]);

        $userIds = $request->languages;
        $affectedRows = 0;

        foreach ($userIds as $userId) {
            $result = DB::table('users')->where('id', $userId)->where('status', 'deactivate')->update(['management_type' => $request->management_type]);

            if ($result) {
                $affectedRows++;
            } else {
                return redirect()->back()->with('error', 'Only One Members Transferred Successfully');
            }
        }

        if ($affectedRows > 0) {
            return redirect()->back()->with('success', 'Members Transferred Successfully');
        } else {
            return redirect()->back()->with('error', 'Oops!! Something Went Wrong');
        }

    }
}
