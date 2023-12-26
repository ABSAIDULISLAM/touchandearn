@extends('frontend.layouts.master')

@section('body')
    @push('css')
        <link rel="stylesheet" href="{{ asset('backend/assets/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/custom.css') }}">
        @endpush

        <div class="col-md-8 m-auto mt-5">
            <div class="card">
                <div class="card-header ">
                    <h3>Register</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="">
                        <ul>
                            @foreach ($errors->all() as $error)
                            @php
                            toastr()->error($error);
                            @endphp
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('member.register')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12 my-3">
                                <label for="" class="mb-2">Referral Code</label>
                                <input type="text" class="form-control @error('referral_code') is-invalid border border-danger @enderror" name="referral_code"
                                value="{{ isset($referralCode) ? $referralCode : old('referral_code') }}" >
                            </div>
                            <div class="col-md-12 my-3">
                                <label for="" class="mb-2">Full Name</label>
                                <input type="text" class="form-control @error('name') is-invalid border border-danger @enderror" name="name"
                                value="{{ old('name') }}">
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="" class="mb-2">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid border border-danger @enderror" name="email"
                                 value="{{ old('email') }}">
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="" class="mb-2">Country</label>
                                <select id="country" class="form-control @error('country') is-invalid border border-danger @enderror" name="country"
                                value="{{ old('country') }}">
                                    <option disabled selected>Select your Country</option>
                                    <option value="bangladesh">Bangladesh</option>
                                    <option value="india">India</option>
                                    <option value="pakistan">Pakistan</option>
                                    <option value="soudiarab">Soudi Arab</option>
                                    <option value="singapore">Singapore</option>
                                </select>
                            </div>
                            <div class="col-md-6 my-3 ">
                                <label for="" class="mb-2">Contact Number</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="phone">+88</span>
                                    <input type="text" aria-label="phone" class="form-control @error('number') is-invalid border border-danger @enderror" name="number"
                                    value="{{ old('number') }}">
                                   </div>
                            </div>
                            <div class="col-md-6 my-3 ">
                                <label for="" class="mb-2">What's app </label>
                                <div class="input-group">
                                    <span class="input-group-text" id="phone">+88</span>
                                    <input type="text" aria-label="phone" class="form-control @error('whats_app') is-invalid border border-danger @enderror" name="whats_app"
                                    value="{{ old('whats_app') }}">
                                   </div>
                            </div>
                            <div class="col-md-4 my-3">
                                <label for="" class="mb-2">Language</label>
                                <select id="" class="form-control @error('language') is-invalid border border-danger @enderror" name="language"
                                value="{{ old('language') }}">
                                    <option disabled selected>Select your Country</option>
                                    <option value="bangla">Bangla</option>
                                    <option value="english">English</option>
                                    <option value="hindi">Hindi</option>
                                    <option value="urdu">Urdu</option>
                                </select>
                            </div>
                            <div class="col-md-4 my-3">
                                <label for="" class="mb-2">Gender</label>
                                <select  class="form-control @error('gender') is-invalid border border-danger @enderror" name="gender"
                                value="{{ old('gender') }}">
                                    <option disabled selected>Select your Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-4 my-3">
                                <label for="" class="mb-2">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid border border-danger @enderror" name="image"
                                 value="{{ old('image') }}">
                            </div>

                            <div class="col-md-6 my-3">
                                <label for="" class="mb-2">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid border border-danger @enderror" name="password"
                                 value="{{ old('password') }}">
                            </div>

                            <div class="col-md-6 my-3">
                                <label for="" class="mb-2">Confirm password</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid border border-danger @enderror" name="password_confirmation"
                                >
                            </div>

                            <div class="col-md-12 text-left">
                                <button class="btn btn-primary text-left my-3" id="btn">Sign Up</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>




    </main>


    @push('js')
        <!-- jQuery -->
        <script src="{{ asset('backend/assets/plugins/jquery/jquery.min.js') }}"></script>

        <script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <script src="{{ asset('backend/assets/dist/js/adminlte.min.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>

        // Initial phone code update
        updatePhoneCode();
        // Country dial codes
        const countryCodes = {
            bangladesh: '+880',
            india: '+91'
            pakistan: '+91'
            soudiarab: '+91'
            // Add more countries and dial codes as needed
        };

        // Function to update the phone input based on the selected country
        function updatePhoneCode() {
            var selectedCountry = $('#country').val();
            console.log(selectedCountry);
            var dialCode = countryCodes[selectedCountry];
            $('#phone').val(dialCode);
        }

        // Function to copy the phone code to the clipboard
        function copyPhoneCode() {
            var phoneInput = document.getElementById('phone');
            phoneInput.select();
            document.execCommand('copy');
            alert('Phone code copied to clipboard!');
        }

    </script>
    @endpush





@endsection
