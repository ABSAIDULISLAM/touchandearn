<?php

namespace App\Http\Controllers\sa;

use App\Http\Controllers\Controller;
use App\Models\TeamLeader;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TlmapingController extends Controller
{
    public function index()
    {

        $teamleaders = TeamLeader::with('user')->get();

        $users = User::where('status', 'active')->Where('role_as', 'member')->where('teamlead_status', null)->where('wp_message', 'done')->Orwhere('myleads_response', 'right_wp')->get();

        return view('backend.sa.index', compact(['users', 'teamleaders']));
    }


    public function transferMemberToTeamleader(Request $request)
    {
        $request->validate([
            'names' => 'required',
            'teamleader_id' => 'required',
        ]);

        $userIds = $request->names;
        $affectedRows = 0;

        foreach ($userIds as $userId) {
            $result = DB::table('users')->where('id', $userId)
            ->update([
                'teamlead_status' => 'teamleader',
                'teamleader_id' => $request->teamleader_id,
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
}
