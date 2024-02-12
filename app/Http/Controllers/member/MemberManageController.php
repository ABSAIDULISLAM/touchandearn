<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use App\Models\Earning;
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


    public function sponsorEdit($id, $name)
    {
        $user = User::find($id);
        return view('backend.member.sponsor-edit', compact('user'));
    }

    public function sponsorupdate(Request $request)
    {
        $request->validate([
            'number' => ['required', 'max:13', 'min:11'],
            'whats_app' => ['required', 'max:13', 'min:11'],
        ]);

        User::where('id', $request->id)->update([
            'number' => $request->number,
            'whats_app' => $request->whats_app,
        ]);

        return redirect()->route('student.sponsor-list')->with('success', 'Student Info Updated Succesfuly');
    }

    public function StudnentIncomeHistory()
    {
        $earnings = Earning::with('user')->where('user_id', auth()->user()->id)->get();
        // return $earnings;

        return view('backend.member.income-history', compact('earnings'));
    }




}
