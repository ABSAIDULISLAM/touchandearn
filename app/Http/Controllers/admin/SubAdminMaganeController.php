<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\SubadminCreateRequest;
use App\Models\Management;
use App\Models\SendActivationPointDetails;
use App\Models\SubadminType;
use App\Models\Subadmin;
use App\Models\User;
use App\Services\admin\SubadminCreate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Attributes\Ticket;

class SubAdminMaganeController extends Controller
{
    public function controllerandseniorAccountant()
    {
        $subadmins = User::whereIn('role_as', ['controller', 'senior_accountant', 'support_team_leader'])->get();

        return view('backend.admin.subadmin-manage.controller-and-senior-accountant', compact('subadmins'));
    }


    public function teamLeader()
    {
        $subadmins = User::where('role_as', 'teamleader')->get();

        return view('backend.admin.subadmin-manage.team-leader', compact('subadmins'));
    }

    public function counselor()
    {
        $subadmins = User::where('role_as', 'counselor')->get();

        return view('backend.admin.subadmin-manage.counselor', compact('subadmins'));
    }


    public function createSubadmin()
    {
        $subadminTypes = SubadminType::all();
        // $managements = Management::all();

        return view('backend.admin.subadmin-manage.create-subadmin', compact(['subadminTypes']));
    }


    public function subadminStore(SubadminCreateRequest $request)
    {
        $validatedData = $request->all();
        SubadminCreate::subadminSave($validatedData);

        return redirect()->back()->with('success', 'Sub Admin Created Successfully !');

    }




    // activation point manage send to student by sub-admins

    public function ManageActivationPoint()
    {
        $historys = SendActivationPointDetails::with('user')->where('sender_id', auth()->user()->id)->get();

        // return $historys;

        return view('backend.admin.subadmin-manage.manage-activation-point-to-students', compact('historys'));
    }
    public function SendActivationPoint()
    {
        return view('backend.admin.subadmin-manage.send-activation-point');
    }



    public function ActivationPointSend(Request $request)
    {
        $request->validate([
            'activation_points' => ['required', 'max:10', 'min:0'],
            'description' => ['nullable', 'string'],
        ]);


        $activationPoint = $request->activation_points;

        $user =  User::where('id', auth()->user()->id)->first();

        if($user && $user->activation_points >= $activationPoint){

            User::where('id', $request->id)->update([
                'activation_points' => DB::raw('activation_points + ' . $request->activation_points),
            ]);

            $remainPoints = $user->activation_points - $activationPoint;

            User::where('id', auth()->user()->id)->update([
                'activation_points' => $remainPoints,
            ]);

            SendActivationPointDetails::create([
                'sender_id' => auth()->user()->id,
                'user_id' => $request->id,
                'activation_points' => $request->activation_points,
                'description' => $request->description,
            ]);

            return redirect()->back()->with('success', 'Activation Pont send Successfuly');

        }else{

            return redirect()->back()->with('error', 'Opps ! Your have not enough activation points for send');
        }

    }



    // activation poinnt manage send to subadmins by admin

    public function manageActivationPointToSubadmin()
    {
        $historys = SendActivationPointDetails::with('user')->where('sender_id', auth()->user()->id)->get();

        return view('backend.admin.subadmin-manage.manage-activation-point-to-subadmin', compact('historys'));
    }

    public function SendActivationPointToSubadmin()
    {
        return view('backend.admin.subadmin-manage.send-activation-point-to-subadmin');
    }


    public function ActivationPointSendToSubadmin(Request $request)
    {
        // return $request->all();
        $request->validate([
            'activation_points' => ['required', 'max:10', 'min:0'],
            'description' => ['nullable', 'string'],
        ]);

        User::where('id', $request->id)->update([
            'activation_points' => DB::raw('activation_points + ' . $request->activation_points),
        ]);

        SendActivationPointDetails::create([
            'sender_id' => auth()->user()->id,
            'user_id' => $request->id,
            'activation_points' => $request->activation_points,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Activation Pont send Successfuly');

    }




}
