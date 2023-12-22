<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class AdminDashController extends Controller
{
    public function dashboard()
    {


        // $user = auth()->user(); // Assuming the user is logged in
        // // Today's earnings
        // $todayEarnings = $user->earnings()
        //     ->whereDate('created_at', Carbon::today())
        //     ->sum('amount');
        // // Total earnings
        // $totalEarnings = $user->earnings()->sum('amount');
        // // for user info
        // $user =  User::where('id', auth()->user()->id)->first();
        // //  for referrared info
        // $referredUsers = $user->referredUsers;

        // $referRoute = route('register', ['referral_code' => $user->referral_code]);
        // // return $referRoute;




        return view('backend.index');
    }


    public function dashboardTest(){
        $email = 'absaidul2@gmail.com';
        $name = 'Saidul';

        // dispatch()
        return 'ok';
    }




}
