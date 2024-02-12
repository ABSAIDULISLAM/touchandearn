<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Earning;
use App\Models\Network;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class AdminDashController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $totalEarnings = $user->earnings()->where('processed', false)->sum('amount');

        $earnings = $user->earnings()->where('processed', false)->get();

        foreach ($earnings as $earning) {
            $user->ballance += $earning->amount;
            $user->save();
            $earning->processed = true;
            $earning->save();
        }

        // Today's earnings
        $todayEarnings = $user->earnings()->where('user_id', auth()->user()->id)->whereDate('created_at', Carbon::today())->sum('amount');

        // for update user status when ballance >= 5000
        User::where('role_as', 'member')->where('activation_points', '>=', 5000)->update(['status' => 'active',]);

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
            Earning::create([
                'user_id' => $user->counselor_id,
                'amount' => 500, // Referrer gets 500 points
            ]);
            $user->distributePoints();
        }
    }





    public function AdminWithdrawalIncome()
    {
        $earnings  =Earning::with('user')->where('user_id', auth()->user()->id)->get();

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



    // public function showStatistics()
    // {
    //     $totalVisitors = Visitor::count();
    //     $todayVisitors = Visitor::whereDate('visited_at', today())->count();
    //     $currentMonthVisitors = Visitor::whereMonth('visited_at', today())->count();
    //     $lastMonthVisitors = Visitor::whereMonth('visited_at', today()->subMonth())->count();

    //     return view('statistics', compact('totalVisitors', 'todayVisitors', 'currentMonthVisitors', 'lastMonthVisitors'));
    // }




    public function Reference()
    {
        return view('backend.admin.reference.reference');
    }


    public function ReferencecheckBYDate(Request $request)
    {
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');

        $query = User::where('role_as', 'member');

        if ($fromDate) {
            $query->whereYear('created_at', '=', Carbon::parse($fromDate)->year)
                ->whereMonth('created_at', '=', Carbon::parse($fromDate)->month);

        }elseif($toDate) {
            $query->whereDate('created_at', '=', $toDate);

        }else{

        }

        $user = $query
            ->selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        return response()->json([
            'active' => $user['active'] ?? 0,
            'deactive' => $user['deactivate'] ?? 0,
            'total' => ($user['deactivate'] ?? 0) + ($user['active'] ?? 0),
        ]);
    }





    public function dashboardTest() {
        $password = decrypt('plain-text-password');
        return $password;
    }


}
