<?php

namespace App\Http\Controllers\admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Earning;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberMaganeController extends Controller
{

    public function inactivemember()
    {
        $users = User::where('status', 'deactivate')->where('role_as', 'member')->get();

        return view('backend.admin.member-manage.inactive-member', compact('users'));
    }

    public function activemember()
    {
        $users = User::where('status', 'active')->where('role_as', 'member')->get();

        return view('backend.admin.member-manage.active-member', compact('users'));
    }


    public function WithdrawRequestMember()
    {

        $members = Withdraw::with('user')->where('role_as', 'member')->latest()->get();
        return $members;
        return view('backend.admin.member.withdraw-request-list', compact('members'));
    }

    public function WithdrawRequestSubadmin()
    {
        $subadmins = Withdraw::with('user')->whereIn('role_as', ['counselor', 'teamleader'])->latest()->get();


        return view('backend.admin.subadmin-manage.withdraw-request-list', compact('subadmins'));
    }


    public function SubadminWithdwalStatusUnpaidToPai($wId, $id)
    {

        $withdraw = Withdraw::find($wId);

        if ($withdraw) {

            $withdrawAmount = $withdraw->withdrawal_amount;
            $adminAmount = $withdrawAmount - 100;

            User::where('id', $id)->update([
                'freeze_points' => DB::raw('freeze_points - ' . $withdrawAmount),
                'withdraw' => DB::raw('withdraw + ' . $withdrawAmount),
            ]);

            Earning::create([
                'user_id' => 1,
                'amount' => 100,
            ]);

            Withdraw::where('id', $wId)->update([
                'status' => Status::Paid->value,
                'paid_amount' => $adminAmount,
            ]);

            return redirect()->back()->with('success', 'Withdraw Status Get Paid Successfylly');

        } else {
            return redirect()->back()->with('error', 'Something Went Wrong !! Please Do Carefully');
        }
    }

}
