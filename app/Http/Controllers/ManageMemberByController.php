<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class ManageMemberByController extends Controller
{
    public function inactiveMembers()
    {
        $users = User::where('status', 'deactivate')->Where('role_as', 'member')->Where('management_type', 'controller')->get();

        return view('backend.controller.inactive-members', compact('users'));
    }


    public function transferMember(Request $request)
    {

        $userIds = $request->languages;
        // dd($userIds);
        $affectedRows = 0;

        if($request->languages > 0){
            foreach ($userIds as $userId) {

                $result = DB::table('users')->where('id', $userId)->update(['management_type' => $request->management_type]);

                if ($result) {
                    $affectedRows++;
                    return redirect()->back()->with('success', 'Member Treansfered Successflly');
                }else{
                    return redirect()->back()->with('error', ' Opps !! Something Went Wrong');
                }
            }
        }else{
            return redirect()->back()->with('error', ' Opps !! Something Went Wrong');
        }

    }
}
