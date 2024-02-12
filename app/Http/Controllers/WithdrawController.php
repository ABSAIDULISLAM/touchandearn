<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class WithdrawController extends Controller
{
    public Function withdrawHistory()
    {
       $withdraws = Withdraw::where('user_id', auth()->user()->id)
       ->whereIn('role_as', ['member', 'counselor', 'teamleader'])
       ->get();

    //    return $withdraws;

        return view('backend.withdraw.withdraw-list', compact('withdraws'));
    }


    public function withdrawRequest()
    {
        $user= User::find(auth()->user()->id);

        return view('backend.withdraw.withdraw', compact(['user']));
    }


    public function withdrawRequestSend(Request $request)
    {
        $request->validate([
            'withdrawal_amount' => ['required', 'numeric', 'min:1000'],
            'payment_number' => ['required'],
            'payment_method' => ['required'],
        ]);

        $withdrawAmount = $request->withdrawal_amount;
        $userId = auth()->user()->id;
        $user = User::find($userId);

        // Check if the withdrawal amount is greater than the balance
        if ($withdrawAmount > $user->ballance) {
            return redirect()->route('dashboard')->with('error', 'Insufficient balance for withdrawal');
        }

        DB::transaction(function () use ($withdrawAmount, $userId) {
            User::where('id', $userId)->update([
                'ballance' => DB::raw('ballance - ' . $withdrawAmount),
                'freeze_points' => DB::raw('freeze_points + ' . $withdrawAmount),
            ]);
        });

        // Create a withdrawal record
        Withdraw::create([
            'user_id' => $userId,
            'withdrawal_amount' => $withdrawAmount,
            'payment_number' => $request->payment_number,
            'payment_method' => $request->payment_method,
            'role_as' => $request->role_as,
        ]);

        return redirect()->route('dashboard')->with('success', 'Your withdrawal request sent successfully!');
    }




    // public function withdrawRequestSend(Request $request)
    // {
    //     $request->validate([
    //         'withdrawal_amount' => ['required', 'numeric'],
    //         'payment_number' => ['required', 'max:13', 'min:11'],
    //         'payment_method' => ['required'],
    //     ]);

    //     $withdrawAmount = $request->withdrawal_amount;
    //     $userId = auth()->user()->id;
    //     $user = User::find($userId);

    //     // Check if the user is eligible for withdrawal based on withdrawal count
    //     if ($user->withdrawal_count == 0 && $withdrawAmount > 500) {
    //         return redirect()->route('dashboard')->with('error', 'First-time withdrawal must be <= 500 points');
    //     } elseif ($user->withdrawal_count == 1 && $withdrawAmount > 1000) {
    //         return redirect()->route('dashboard')->with('error', 'Second-time withdrawal must be <= 1000 points');
    //     } elseif ($user->withdrawal_count > 1 && $withdrawAmount > 1500) {
    //         return redirect()->route('dashboard')->with('error', 'Subsequent withdrawals must be <= 1500 points');
    //     }

    //     DB::transaction(function () use ($withdrawAmount, $userId, $user) {
    //         User::where('id', $userId)->update([
    //             'balance' => DB::raw('balance - ' . $withdrawAmount),
    //             'freeze_points' => DB::raw('freeze_points + ' . $withdrawAmount),
    //             'withdrawal_count' => $user->withdrawal_count + 1,
    //         ]);
    //     });

    //     // Create a withdrawal record
    //     Withdraw::create([
    //         'user_id' => $userId,
    //         'withdrawal_amount' => $withdrawAmount,
    //         'payment_number' => $request->payment_number,
    //         'payment_method' => $request->payment_method,
    //         'role_as' => $request->role_as,
    //     ]);

    //     return redirect()->route('dashboard')->with('success', 'Your withdrawal request sent successfully!');
    // }



}
