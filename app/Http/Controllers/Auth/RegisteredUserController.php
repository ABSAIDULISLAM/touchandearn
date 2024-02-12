<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Enums\Status;
use App\Events\UserRegistered;
use App\Models\Earning;
use App\Models\Network;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;




class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request)
    {
        $referralCode = $request->query('referral_code');

        return view('auth.register', compact('referralCode'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request)
    {

        $request->validate([
            'referral_code' => ['nullable'],
            'name' => ['required', 'string', 'max:255'],
            'country' => ['required'],
            'language' => ['required'],
            'gender' => ['required'],
            'image' => ['nullable', 'mimes:png,jpg,webp,jpeg'],
            'email' => [ 'required', 'string', 'lowercase', 'email', 'max:255',
                Rule::unique('users')->where(function ($query) {
                    return $query->where('email', 'LIKE', '%@gmail.com');
                }),
                'ends_with:gmail.com',
            ],
            'password' => ['required', 'confirmed', Password::defaults()],

            'countryCodeFormNumber' => ['required'],
            'number' => [ 'required', 'max:15', 'min:5',
                Rule::unique('users')->where(function ($query) use ($request) {
                    return $query->where('number', $request->countryCodeFormNumber.$request->number);
                }),
            ],
            'countryCodeFormWP' => ['required'],
            'whats_app' => [ 'required', 'max:15', 'min:5',
                Rule::unique('users')->where(function ($query) use ($request) {
                    return $query->where('whats_app', $request->countryCodeFormWP.$request->whats_app);
                }),
            ],
            'student_id' => ['unique:users,student_id'],
        ]);


        $number = $request->countryCodeFormNumber . $request->number;
        $whatsApp = $request->countryCodeFormWP . $request->whats_app;

        $users =  User::all();
        foreach($users as $user){
                if($user->number == $number){
                    return redirect()->back()->with('error', 'Number Already Exist');
                }

                if($user->whats_app == $whatsApp){
                    return redirect()->back()->with('error', 'Whats App Number Already Exist');
                }
        }


        $user = new User();
        $referral_code = rand(100000, 10000000);
        $userId = User::orderBy('id', 'desc')->value('student_id');
        $studentId = $userId ? $userId + 1 : 100001;

        $referrer = $request->has('referral_code') ? User::where('referral_code', $request->referral_code)->first() : null;

        if ($request->has('referral_code') && !$referrer) {
            return redirect()->back()->with('error', 'Your Refer Code is Invalid!! Please Try Again with a Valid refer Code');
        }

        $user->fill([
            'name' => $request->name,
            'country' => $request->country,
            'language' => $request->language,
            'number' => $number,
            'whats_app' => $whatsApp,
            'gender' => $request->gender,
            'email' => $request->email,
            'role_as' => Status::Member->value,
            'referral_code' => $referral_code,
            'referrer_id' => $referrer ? $referrer->id : 1,
            'student_id' => $studentId,
            'management_type' => 'controller',
            'password' => Hash::make($request->password),
        ]);

        if ($request->hasFile('image')) {
            $image = Upload($request->file('image'), 'uploads/members', 400, 400);
            $user->image = $image;
        }

        $user->save();

        $network = new Network();
        $network->fill([
            'user_id' => $user->id,
            'referral_code' => $request->has('referral_code') ? $request->referral_code : 100,
            'parent_id' => $referrer ? $referrer->id : null,
        ]);
        $network->save();

        event(new Registered($user));

        Auth::login($user);

        $userdata = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];

        Mail::send('backend.admin.emails.welcome', ['user' => $userdata], function ($message) use ($userdata) {
            $message->to($userdata['email']);
            $message->subject('Welcome Mail from Touch and Earn');
        });

        return redirect(RouteServiceProvider::HOME);
    }

}
