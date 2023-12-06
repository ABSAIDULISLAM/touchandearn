<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberManageController extends Controller
{
    public function memberManage()
    {
        return view('backend.admin.member-manage.member-manage');
    }
}
