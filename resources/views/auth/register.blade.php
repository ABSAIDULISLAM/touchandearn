@extends('frontend.layouts.master')

@section('body')
    @push('css')
        <link rel="stylesheet" href="{{ asset('backend/assets/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/custom.css') }}">
        @endpush


        <div class="col-md-6 m-auto mt-5">
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
                        <div class="col-md-12 my-3">
                            <label for="" class="mb-2">Refer Code</label>
                            <input type="text" class="form-control" name="referral_code" >
                        </div>
                        <p id="text" class="text-success"> <span id="name" class="text-primary"></span> </p>

                        <div class="col-md-12 my-3">
                            <label for="" class="mb-2">Full Name</label>
                            <input type="text" class="form-control @error('name') is-invalid border border-danger @enderror" name="name"
                            value="{{ old('name') }}">
                        </div>

                        <div class="col-md-12 my-3">
                            <label for="" class="mb-2">Mobile Number</label>
                            <input type="number" class="form-control @error('number') is-invalid border border-danger @enderror" name="number"
                             value="{{ old('number') }}">
                        </div>

                        <div class="col-md-12 my-3">
                            <label for="" class="mb-2">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid border border-danger @enderror" name="email"
                             value="{{ old('email') }}">
                        </div>

                        <div class="col-md-12 my-3">
                            <label for="" class="mb-2">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid border border-danger @enderror" name="password"
                             value="{{ old('password') }}">
                        </div>

                        <div class="col-md-12 my-3">
                            <label for="" class="mb-2">Confirm password</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid border border-danger @enderror" name="password_confirmation"
                            >
                        </div>

                        <div class="col-md-12 text-left">
                            <button class="btn btn-primary text-left my-3" id="btn">Sign Up</button>
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
    @endpush

    <script>

        $(document).ready(function() {
            $('#btn').click(function(){
                alert('ok');
            });
        });

    </script>

@endsection
