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
use App\Models\Network;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'referral_code' => ['nullable', 'max:15'],
            'name' => ['required', 'string', 'max:255'],
            'country' => ['required'],
            'language' => ['required'],
            'number' => ['required','max:15', 'min:11', 'unique:'.User::class],
            'whats_app' => ['required','max:15', 'min:11', 'unique:'.User::class],
            'gender' => ['required'],
            'image'   => ['nullable'],//,'mimes:png,jpg,webp,jpeg'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class], // ,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = new User();

        $referral_code = Str::random(8);

        if(isset($request->referral_code)){

            $referrer = User::where('referral_code', $request->referral_code)->first();

            if($referrer->count() > 0){

                $user->name = $request->name;
                $user->country = $request->country;
                $user->language = $request->language;
                $user->number = $request->number;
                $user->whats_app = $request->whats_app;
                $user->gender = $request->gender;
                $user->email = $request->email;
                $user->role_as = Status::Member->value;
                $user->referral_code = $referral_code;
                $user->password = Hash::make($request->password);
                if(request()->hasFile('image')){
                    $image = upload_image(request('image'), 'uploads/members/', 400, 400);
                    $user->image = $image;
                }
                $user->save();


                $network = new Network();
                $network->user_id = $user->id;
                $network->referral_code = $request->referral_code;
                $network->parent_id = $referrer->id;
                $network->save();

                event(new Registered($user));

                Auth::login($user);

                return redirect(RouteServiceProvider::HOME);

            }else{
                return redirect()->back()->with('error', 'Your Refer Code is Invalid !! Please Try Again with Valid refer Code');
            }

        }else{

            $user->name = $request->name;
            $user->country = $request->country;
            $user->language = $request->language;
            $user->number = $request->number;
            $user->whats_app = $request->whats_app;
            $user->gender = $request->gender;
            $user->email = $request->email;
            $user->role_as = Status::Member->value;
            $user->referral_code = $referral_code;
            $user->password = Hash::make($request->password);
            if(request()->hasFile('image')){
                $image = upload_image(request('image'), 'uploads/members/', 400, 400);
                $user->image = $image;
            }
            $user->save();

            event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        }

    }
}
