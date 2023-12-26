<?php

namespace App\Http\Controllers\counselor;

use App\Http\Controllers\Controller;
use App\Models\Reschedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use function Laravel\Prompts\alert;

class CounselorController extends Controller
{

    public function myleads()
    {
        $users = User::where('status', 'deactivate')->Where('role_as', 'member')->Where('management_type', 'counsellor')->where('myleads_response', null)->where('wp_message', null)->get();

        return view('backend.counselor.inactive-members', compact('users'));
    }


    public function sendWhatsAppMessage($number, $applicantId)
    {
        $message = "Dear Applicant,\n\nApplicant user id $applicantId\nI GOT YOUR APPLICATION FORM REGARDING COUNSELLING MEETING\n\nTell me when you free for counselling\n\nINDIAN COUNSELING TIME\n9:30 AM to 8:30 PM\n\nBANGLADESH COUNSELING TIME\n10:00 AM to 9.00 PM\n\nI am your Counsellor\nFrom\nTouch And Earn Digital E-Learning Platform";

        // Redirect to WhatsApp with the message
        $redirectUrl = "https://wa.me/$number?text=" . urlencode($message);

        try {
            $update = User::where('student_id', $applicantId)->update(['message' => 'done']);
            if ($update) {
                return redirect($redirectUrl);
            } else {
                return 'Update unsuccessful';
            }
        } catch (\Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function wpmessageDone($id)
    {
        $update = User::where('student_id', $id)->update(['wp_message' => 'done']);
        if ($update) {
            return redirect()->back()->with('success', 'Lead listed in Message Done list');
        } else {
            return redirect()->back()->with('eror', 'Something Went Wrong');
        }
    }


    public function messageDone()
    {
        $users = User::where('status', 'deactivate')->Where('role_as', 'member')->Where('management_type', 'counsellor')->where('wp_message', 'done')->Orwhere('myleads_response', 'right_wp')->get();

        return view('backend.counselor.message-done', compact('users'));
    }


    public function responseUpdate(Request $request)
    {

        $update = User::where('student_id', $request->student_id)->update(['msd_response' => $request->msd_response]);
        if($update){
             return redirect()->back()->with('success', 'Response saved Successfully');
        }else{
             return redirect()->back()->with('error', 'Something Wrong');
        }
    }


    public function reschedule($userId)
    {
        $userData = User::where('student_id', $userId)->first();

        return view('backend.counselor.re-scedule', compact('userData'));
    }

    public function scheduleSave(Request $request)
    {
       $save = Reschedule::create($request->all());
        if($save){
            return redirect()->route('counselor.message-done')->with('success', 'Shedule inserted Successfuly');
       }else{
            return redirect()->back()->with('error', 'Something Wrong');
       }

    }


    public function workingZone()
    {
        $users = User::where('status', 'deactivate')->Where('role_as', 'member')->Where('management_type', 'counsellor')->where('wp_message', 'done')->Orwhere('myleads_response', 'right_wp')->get();

        return view('backend.counselor.working-zone', compact('users'));
    }


    public function wrongWhatsappupdate($stid)
    {
        $update = User::where('student_id', $stid)->update(['myleads_response' => 'wrong_wp']);

       if($update){
            return redirect()->back()->with('success', 'Lead listed in Wrong WhatsApp list');
       }else{
            return redirect()->back()->with('error', 'Something Wrong');
       }
    }



    public function wrongWhatsappList()
    {
        $users = User::where('status', 'deactivate')->Where('role_as', 'member')->Where('management_type', 'counsellor')->where('message', 'done')->where('myleads_response', 'wrong_wp')->get();

        return view('backend.counselor.wrong-whats-app', compact('users'));
    }

    public function RightWPUpdate($id)
    {
        $update = User::where('student_id', $id)->update(['myleads_response' => 'right_wp']);
        if ($update) {
            return redirect()->back()->with('success', 'Lead listed in Message Done list');
        } else {
            return redirect()->back()->with('eror', 'Something Went Wrong');
        }
    }





}
