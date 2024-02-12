<?php

namespace App\Http\Controllers\admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Earning;
use App\Models\SubadminType;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class MemberMaganeController extends Controller
{

    public function inactivemember()
    {
        $users = User::where('status', 'deactivate')
        ->where('role_as', 'member')
        ->with(['teamleader', 'counselor', 'referrar'])
        ->get();
        return view('backend.admin.member-manage.inactive-member', compact('users'));
    }

    public function activemember()
    {
        $users = User::where('status', 'active')
                ->where('role_as', 'member')
                ->with(['teamleader', 'counselor', 'referrar'])
                ->get();
                // return $users ;

        return view('backend.admin.member-manage.active-member', compact('users'));
    }



    public function WithdrawRequestMember()
    {

        $members = Withdraw::with('user')->where('role_as', 'member')->where('status', 'unpaid')->latest()->get();

        return view('backend.admin.member.withdraw-request-list', compact('members'));
    }



    public function SubadminWithdwalStatusUnpaidToPaiForMember($wId, $id)
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



    public function WithdrawRequestSubadmin()
    {
        $subadmins = Withdraw::with('user')->whereIn('role_as', ['counselor', 'teamleader'])->where('status', 'unpaid')->latest()->get();

        return view('backend.admin.subadmin-manage.withdraw-request-list', compact('subadmins'));
    }


    public function WithdrawPaidList()
    {
        $members = Withdraw::with('user')->whereIn('role_as', ['counselor', 'teamleader', 'member'])->where('status', 'paid')->latest()->get();

        return view('backend.withdraw.paid-list', compact('members'));
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



    public function ManageMember()
    {

        $users = User::where('role_as', 'member')->get();


        $totalUsers = User::where('role_as', 'member')
            ->selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        $todayUsers = User::where('role_as', 'member')
            ->whereDate('created_at', today())
            ->selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        $thisWeekUsers = User::where('role_as', 'member')
            ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        $thisMonthUsers = User::where('role_as', 'member')
            ->whereMonth('created_at', today())
            ->selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        $previousMonthUsers = User::where('role_as', 'member')
            ->whereMonth('created_at', today()->subMonth())
            ->selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');


        return view('backend.admin.member.member-manage', compact([
            'users',
            'totalUsers',
            'todayUsers',
            'thisWeekUsers',
            'thisMonthUsers',
            'previousMonthUsers',
        ]));
    }


    public function MemberEdit($id, $name)
    {
        $subadminTypes = SubadminType::all();
        $user = User::find($id);
        return view('backend.admin.member.edit-member', compact(['user', 'subadminTypes']));
    }



    public function MemberUpdate(Request $request)
    {
        // return $request->all();
        $request->validate([
            'id' => ['exists:users,id'],
            'name' => ['required', 'string', 'max:255'],
            'country' => ['required'],
            'language' => ['required'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255','ends_with:gmail.com'],
            'password' => ['nullable'],

            'countryCodeFormNumber' => ['required'],
            'number' => [
                'required', 'max:15', 'min:5',
                Rule::unique('users')->ignore($request->id)->where(function ($query) use ($request) {
                    return $query->where('number', $request->countryCodeFormNumber . $request->number);
                }),
            ],
            'countryCodeFormWP' => ['required'],
            'whats_app' => [
                'required', 'max:15', 'min:5',
                Rule::unique('users')->ignore($request->id)->where(function ($query) use ($request) {
                    return $query->where('whats_app', $request->countryCodeFormWP . $request->whats_app);
                }),
            ],
        ]);

        $number = $request->countryCodeFormNumber . $request->number;
        $whatsApp = $request->countryCodeFormWP . $request->whats_app;

        // $users =  User::all();
        // foreach ($users as $user) {
        //     if ($user->number == $number) {
        //         return redirect()->back()->with('error', 'Number Already Exist');
        //     }

        //     if ($user->whats_app == $whatsApp) {
        //         return redirect()->back()->with('error', 'Whats App Number Already Exist');
        //     }
        // }
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->country = $request->country;
        $user->number = $number;
        $user->whats_app = $whatsApp;
        $user->language = $request->language;
        $user->gender = $request->gender;
        $user->status = $request->status;
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        if(!$request->email == null && !$request->password == null){
            $userdata = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ];

            Mail::send('backend.admin.emails.welcome', ['user' => $userdata], function ($message) use ($userdata) {
                $message->to($userdata['email']);
                $message->subject('Welcome Mail from Touch and Earn. Your Updated Infos');
            });
        }

        return redirect()->route('member.manage')->with('success',  'Updated Successfuly');
    }


    public function MemberDelete($id)
    {
        $data = User::find($id);

        if ($data) {
            if ($data->image && file_exists($data->image)) {
                unlink($data->image);
            }

            $data->delete();

            return redirect()
                ->route('member.manage')
                ->with('success', 'Deleted Successfully!!');
        } else {
            return redirect()
                ->route('member.manage')
                ->with('error', 'User not found');
        }
    }


    public function MemberTrashed()
    {
        $users = User::where('role_as', 'member')->onlyTrashed()->get();

        return view('backend.admin.member.trashed-member-manage', compact('users'));
    }


    public function MemberRestor($id, $name)
    {
        $user = User::withTrashed()->findOrFail($id);

        $user->restore();

        return redirect()->back()->with('success', 'User Restored Successfully');

        return redirect()->back()->with('success', 'User Restored Successfully');
    }


    public function Reference()
    {
        return view('backend.admin.reference.reference');
    }



}
