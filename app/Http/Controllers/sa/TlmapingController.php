<?php

namespace App\Http\Controllers\sa;

use App\Http\Controllers\Controller;
use App\Models\Earning;
use App\Models\TeamLeader;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TlmapingController extends Controller
{
    public function index()
    {
        $teamleaders = TeamLeader::with('user')->get();

        $users = User::where('status', 'active')
                ->where('role_as', 'member')
                ->whereNull('teamlead_status')
                ->where('wp_message', 'done')
                ->orWhere('myleads_response', 'right_wp')
                ->with(['teamleader', 'counselor'])
                ->get();

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
            }
        }

        if ($affectedRows > 0) {
            return redirect()->back()->with('success', 'Members Transferred Successfully');
        } else {
            return redirect()->back()->with('error', 'Oops!! Something Went Wrong');
        }

    }


    public function AllActiveStudent()
    {
        $teamleaders = TeamLeader::with('user')->get();

        $users = User::where('status', 'active')
            ->where('role_as', 'member')
            // ->whereNotNull('teamlead_status') // Corrected this line
            // ->where('wp_message', 'done')
            // ->orWhere('myleads_response', 'right_wp')
            ->with(['teamleader', 'counselor'])
            ->get();
        // return $users;


        return view('backend.sa.all-active-student', compact([
            'users',
            'teamleaders',
        ]));
    }


    public function AllDeactiveStudent()
    {
        $teamleaders = TeamLeader::with('user')->get();

        $users = User::where('status', 'deactivate')
            ->where('role_as', 'member')
            ->get();
        // return $users;
        return view('backend.sa.all-deactive-student', compact(['teamleaders', 'users']));
    }


    public function ActivateStudentFromInactive($id, $name)
    {
        $user = User::findOrFail($id);
        // return $user;

        $user->update(['status' => 'active']);

        // Check if the user has a referrer
        $referrer = $user->referrer;
        if ($referrer && $referrer->status == 'active') {
            Earning::create([
                'user_id' => $referrer->id,
                'amount' => 250,
            ]);
        }

        if($user->counselor_id !== null){
            Earning::create([
                'user_id' => $user->counselor_id,
                'amount' => 200,
            ]);
        }

        if($user->teamleader_id !== null){
            Earning::create([
                'user_id' => $user->teamleader_id,
                'amount' => 100,
            ]);
        }
        return redirect()->back()->with('success', 'Student Activated Successfully');
    }



    public function Reference()
    {
        return view('backend.sa.reference');
    }


    public function ReferencecheckBYDate(Request $request)
    {
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');

        $user = User::where('role_as', 'member')
            ->whereBetween('created_at', [$fromDate, $toDate])
            ->selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        return response()->json([
            'active' => $user['active'] ?? 0,
            'deactive' => $user['deactivate'] ?? 0,
        ]);
    }


}
