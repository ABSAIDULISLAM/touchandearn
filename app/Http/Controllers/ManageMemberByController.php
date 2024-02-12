<?php

namespace App\Http\Controllers;

use App\Models\Counselor;
use App\Models\Earning;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;
use function Ramsey\Uuid\v1;

class ManageMemberByController extends Controller
{
    public function inactiveMembers()
    {
        $counselors = Counselor::with('user')->get();

        // return $counselors;

        $users = User::where('status', 'deactivate')->Where('role_as', 'member')->Where('management_type', 'controller')->latest()->get();


        return view('backend.controller.inactive-members', compact(['users', 'counselors']));
    }


    public function transferMember(Request $request)
    {
        $request->validate([
            'languages' => 'required',
            'counselor_id' => 'required',
        ]);

        $userIds = $request->languages;
        $affectedRows = 0;

        foreach ($userIds as $userId) {
            $result = DB::table('users')->where('id', $userId)->where('status', 'deactivate')
            ->update([
                'management_type' => 'counselor',
                'counselor_id' => $request->counselor_id,
            ]);

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


    public function AllInactiveLeads()
    {
        $counselors = Counselor::with('user')->get();


        // $users = User::with(['counselor', 'teamleader'])->where('status', 'deactivate')->Where('role_as', 'member')->get();
        $users = User::with(['counselor', 'teamleader'])->where('status', 'deactivate')->where('role_as', 'member')->get();        // return $users;

        return view('backend.controller.all-inactive-members', compact(['users', 'counselors']));
    }





}
