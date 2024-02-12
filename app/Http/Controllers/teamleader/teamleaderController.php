<?php

namespace App\Http\Controllers\teamleader;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class teamleaderController extends Controller
{
    public function members()
    {
        $users = User::where('status', 'active')
            ->where('role_as', 'member')
            ->where('teamlead_status', 'teamleader')
            ->where('tl_wp_done', 'done')
            ->where('teamleader_id', auth()->user()->id)
            ->get();

        return view('backend.teamleader.member', compact([
            'users',
        ]));
    }


    public function TlwpUndonemembers()
    {
        $users = User::where('status', 'active')
        ->where('role_as', 'member')
        ->where('teamlead_status', 'teamleader')
        ->where('tl_wp_done', null)
        ->where('teamleader_id', auth()->user()->id)
        ->get();

        return view('backend.teamleader.tl-wp-undone', compact('users'));
    }

    public function Tlwpdonemembers($nb, $stId, $name)
    {

        $message = "Hi, Mr/Mrs. $name, Touch And earn Digital Platform থেকে আপনার টিম লিডার বলছি. আমার নাম্বারটা সেভ করুন";

        $redirectUrl = "https://wa.me/$nb?text=" . urlencode($message);

        $update = User::where('student_id', $stId)->update(['tl_wp_done' => 'done']);

        if($update){
            return redirect($redirectUrl);
        }else{
            return redirect()->back()->with('error', 'Whats App Message Not Done');
        }

    }



    public function Reference()
    {
        return view('backend.teamleader.reference');
    }


    public function ReferencecheckBYDate(Request $request)
    {
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');

        $user = User::where('role_as', 'member')
            ->where('teamleader_id', auth()->user()->id)
            ->whereBetween('created_at', [$fromDate, $toDate])
            ->selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        return response()->json([
            'active' => $user['active'] ?? 0,
            'deactive' => $user['deactive'] ?? 0,
        ]);
    }


}
