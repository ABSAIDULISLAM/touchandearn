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
        $users = User::where('status', 'deactivate')->Where('role_as', 'member')->Where('management_type', 'counselor')->where('myleads_response', null)->where('wp_message', null)->where('counselor_id', auth()->user()->id)->get();

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
        $users = User::where('status', 'deactivate')->Where('role_as', 'member')->Where('management_type', 'counselor')->where('wp_message', 'done')->where('msd_response', NULL)->Orwhere('myleads_response', 'right_wp')->where('counselor_id', auth()->user()->id)->get();

        return view('backend.counselor.message-done', compact('users'));
    }


    public function msdonestudentSearch(Request $request)
    {
        $searchQuery = $request->input('search');

        $searchResult = User::where('role_as', 'member')
                                ->where('student_id', $searchQuery)
                                ->orWhere('whats_app', $searchQuery)
                                ->first();
        if(!$searchResult){
            return redirect()->back()->with('error', 'Your Student ID or WhatsApp Not Match With Existing Record');
        }

        return view('backend.counselor.messageDone-search', compact('searchResult'));
    }

    // public function messageDone(Request $request)
    // {
    //     if ($request->isMethod('post')) {
    //         // Handle the form submission and redirect back with the search result.
    //         $searchQuery = $request->input('search');
    //         $searchResult = User::where('role_as', 'member')
    //             ->where('student_id', $searchQuery)
    //             ->orWhere('whats_app', $searchQuery)
    //             ->first();

    //         if (!$searchResult) {
    //             return redirect()->back()->with('error', 'Your Student ID or WhatsApp Not Match With Existing Record');
    //         }

    //         return view('backend.counselor.message-done', compact('searchResult'));
    //     }

    //     // If it's a GET request, fetch the list of users.
    //     $users = User::where('status', 'deactivate')
    //         ->where('role_as', 'member')
    //         ->where('management_type', 'counselor')
    //         ->where('wp_message', 'done')
    //         ->where('msd_response', NULL)
    //         ->orWhere('myleads_response', 'right_wp')
    //         ->where('counselor_id', auth()->user()->id)
    //         ->get();

    //     return view('backend.counselor.message-done', compact('users'));
    // }


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
        $userData = User::where('id', $userId)->first();

        return view('backend.counselor.re-scedule', compact('userData'));
    }


    public function scheduleSave(Request $request)
    {
        $request->validate([
            'student_id' => ['exists:users,student_id'],
            'schedule_date' => ['required'],
            'schedule_time' => ['required'],
        ]);

        // Retrieve the student ID from the request
        $studentId = $request->input('student_id');

        // Create or update the Reschedule record
        Reschedule::updateOrCreate(
            ['student_id' => $studentId],
            [
                'schedule_date' => $request->input('schedule_date'),
                'schedule_time' => $request->input('schedule_time'),
            ]
        );

        return redirect()->route('counselor.message-done')->with('success', 'Schedule inserted successfuly');
    }


    public function workingZone()
    {
        $users = User::where('status', 'deactivate')->Where('role_as', 'member')->Where('management_type', 'counselor')->where('wp_message', 'done')->Orwhere('myleads_response', 'right_wp')->where('counselor_id', auth()->user()->id)->get();

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
        $users = User::where('status', 'deactivate')->Where('role_as', 'member')->Where('management_type', 'counselor')->where('message', 'done')->where('myleads_response', 'wrong_wp')->where('counselor_id', auth()->user()->id)->get();

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




    public function CounselorStudentSearch()
    {
        return view('backend.controller.search-member');
    }

    public function studentSearch(Request $request)
    {
        $searchQuery = $request->input('id_or_wp');

        $searchResult = User::where('role_as', 'member')
                                ->where('student_id', $searchQuery)
                                ->orWhere('whats_app', $searchQuery)
                                ->first();
        if(!$searchResult){
            return redirect()->back()->with('error', 'Your Student ID or WhatsApp Not Match With Existing Record');
        }


        return view('backend.controller.search-member', compact('searchResult'));
    }




}
