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
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

        if ($user && $user->activation_points >= $activationPoint) {

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
        } else {

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


    public function ManageSubadmin()
    {

        $users = User::whereIn('role_as', ['counselor', 'senior_accountant', 'suport_teamleader', 'controller'])->get();

        return view('backend.admin.subadmin-manage.manage-subadmin', compact('users'));
    }


    public function SubadminEdit($id, $name)
    {
        $subadminTypes = SubadminType::all();

        $user = User::find($id);

        return view('backend.admin.subadmin-manage.edit-subadmin', compact(['user', 'subadminTypes']));
    }



    public function SubadminUpdate(Request $request)
    {
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
        $user->subadmintype_id = $request->subadmintype_id;
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

        return redirect()->route('subadmin.manage')->with('success',  'Updated Successfuly');

    }


    public function SubadminDelete($id)
    {
        $data = User::find($id);

        if ($data) {
            if ($data->image && file_exists($data->image)) {
                unlink($data->image);
            }

            $data->delete();

            return redirect()
                ->route('subadmin.manage')
                ->with('success', 'Deleted Successfully!!');
        } else {
            return redirect()
                ->route('subadmin.manage')
                ->with('error', 'User not found');
        }
    }
}
