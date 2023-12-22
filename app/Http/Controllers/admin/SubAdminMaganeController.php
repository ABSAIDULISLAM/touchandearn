<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\SubadminCreateRequest;
use App\Models\Management;
use App\Models\SubadminType;
use App\Models\Subadmin;
use App\Models\User;
use App\Services\admin\SubadminCreate;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\Ticket;

class SubAdminMaganeController extends Controller
{
    public function managesubadmin()
    {
        $subadmins = Subadmin::with(['user', 'subadmintype', 'managementType'])->get();
        // return $subadmins;

        return view('backend.admin.subadmin-manage.subadmin-manage', compact('subadmins'));
    }


    public function createSubadmin()
    {
        $subadminTypes = SubadminType::all();
        $managements = Management::all();

        return view('backend.admin.subadmin-manage.create-subadmin', compact(['subadminTypes', 'managements']));
    }

    public function subadminStore(SubadminCreateRequest $request)
    {
        $validatedData = $request->all();
        SubadminCreate::subadminSave($validatedData);

        return redirect()->back()->with('success', 'Sub Admin Created Successfully !');

    }



}
