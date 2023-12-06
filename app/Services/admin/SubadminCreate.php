<?php

namespace App\Services\admin;

use App\Jobs\SendWelcomeEmail;
use App\Mail\WelcomeMail;
use App\Models\Subadmin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;


/**
 * Class AamarPayService.
 */
class SubadminCreate
{
    public static function subadminSave($data){

        $user = new User();
        $user->name = $data['name'];
        $user->email  = $data['email'];
        $user->number = $data['number'];
        $user->role_as = 'sub_admin';
        $user->password = Hash::make($data['password']);
        $user->status = 'active';

        if(request()->hasFile('image')){
            $image = upload_image(request('image'), 'uploads/sub-admin/', 400, 400);
            $user->image = $image;
        }
        $user->save();

        $subadmin = new Subadmin();
        $subadmin->user_id = $user->id;
        $subadmin->member_id = $data['member_id'];
        $subadmin->gender = $data['gender'];
        $subadmin->whats_app = $data['whats_app'];
        $subadmin->subadmintype_id = $data['subadmintype_id'];
        $subadmin->managment_id = $data['managment_id'];
        $subadmin->country_id = $data['country_id'];
        $subadmin->language = $data['language'];
        $subadmin->save();


        $userdata = [];
        $userdata['name'] = $data['name'];
        $userdata['email'] = $data['email'];
        $userdata['password'] = $data['password'];

        Mail::send('backend.admin.emails.welcome', $userdata, function($message) use ($data){
            $message->to($data['email']);
            $message->subject('Welcome Mail from Touch and Earn');
        });




        return true;


    }
}
