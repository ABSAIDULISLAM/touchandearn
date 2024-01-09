<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Earning;
use App\Models\Network;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user(); // Assuming the user is logged in
        // $user =  User::where('id', auth()->user()->id)->first();

        // Today's earnings
        $todayEarnings = $user->earnings()
            ->where('user_id', auth()->user()->id)
            ->whereDate('created_at', Carbon::today())
            ->sum('amount');

        // Total earnings
        $totalEarnings = $user->earnings()->where('user_id', auth()->user()->id)->sum('amount');

        User::where('id', auth()->user()->id)->update([
            'ballance' => DB::raw('ballance + ' . $totalEarnings),
        ]);

        // for update user status when ballance >= 5000
        User::where('role_as', 'member')
            ->where('activation_points', '>=', 5000)->update([
                'status' => 'active',
            ]);


        // for user info
        $user =  User::where('id', auth()->user()->id)->first();

        // for $referRoute;
        $referRoute = route('register', ['referral_code' => $user->referral_code]);

        // for call distribute function to user referral point
        $this->distributePoints();

        return view('backend.index', compact([
            'user',
            'referRoute',
            'todayEarnings',
            'totalEarnings'
        ]));

    }


    // distribute function to user referral point
    public function distributePoints()
    {
        $activeUsers = User::where('status', 'active')
            ->where('role_as', 'member')
            ->where('activation_points', '>=', 5000)
            ->where('points_distributed', 'false')
            ->get();

        foreach ($activeUsers as $user) {
            $user->distributePoints();
        }
    }





    public function AdminWithdrawalIncome()
    {
        $earnings  =Earning::with('user')->where('user_id', auth()->user()->id)->get();
        // $earnings = $user->earnings()->where('user_id', auth()->user()->id)->sum('amount');

        return view('backend.admin.income.withdrawal-income', compact('earnings'));

    }


    public function AllAccounts()
    {
       $users = User::whereIn('role_as', ['senior_accountant', 'support_team_leader', 'controller', 'counselor', 'member', 'teamleader'])->latest()->get();

       return view('backend.admin.income.all-account', compact('users'));
    }


    public function accountupdateForm($id, $name)
    {
        $user = User::find($id);
        return view('backend.admin.income.account-edit', compact('user'));
    }



    public function accountupdate(Request $request)
    {
        $request->validate([
            'ballance' => ['nullable', 'numeric'],
            'activation_points' => ['nullable', 'numeric'],
            'freeze_points' => ['nullable', 'numeric'],
            'withdraw' => ['nullable', 'numeric'],
        ]);

        User::where('id', $request->id)->update([
            'ballance' => $request->ballance,
            'activation_points' => $request->activation_points,
            'freeze_points' => $request->freeze_points,
            'withdraw' => $request->withdraw,
        ]);

        return redirect()->route('admin.all.accounts')->with('success', 'User Updateed Successfuly');
    }











    public function dashboardTest(){
        // return User::with('referrer')->get();

        // $email = 'absaidul2@gmail.com';
        // $name = 'Saidul';

        return 'ok';


    }




}
