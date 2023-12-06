<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashController extends Controller
{
    public function dashboard()
    {
        return view('backend.index');
    }


    public function dashboardTest(){
        $email = 'absaidul2@gmail.com';
        $name = 'Saidul';

        // dispatch()
        return 'ok';
    }




}
