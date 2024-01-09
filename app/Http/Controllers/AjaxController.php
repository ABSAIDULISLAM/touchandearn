<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function StudentIdCheck(Request $request)
    {
        $request->validate([
            'student_id' => ['required'],
        ]);

        $student = DB::table('users')
        ->where('student_id', $request->student_id)
        ->get();

        if (count($student) > 0) {
            return response()->json($student);
        }else{
            $error = ['message' => 'No Record Found'];
            return response()->json($error);
        }
    }

    public function SubadmintIdCheck(Request $request)
    {
        $request->validate([
            'subadmin_id' => ['required'],
        ]);

        $student = DB::table('users')
        ->where('student_id', $request->subadmin_id)
        ->get();

        if (count($student) > 0) {
            return response()->json($student);
        }else{
            $error = ['message' => 'No Record Found'];
            return response()->json($error);
        }
    }
}
