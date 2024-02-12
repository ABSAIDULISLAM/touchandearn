@extends('backend.layouts.master')

@section('active')
    active
@endsection
@section('title')
    Member Edit
@endsection

@section('toproute')
    <div class="row mb-2" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
        <div class="col-md-12 d-flex justify-content-between">
            <h4 class="m-0">Edit Member </h4>
            <a href="{{route('member.manage')}}" class="btn btn-outline-primary">Manage Member </a>
        </div>
    </div>
@endsection

@section('homesection')
    <div class="row">

        <div class="col-md-12 order-2 order-md-1">
            <div class="card card-outline card-primary">
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
                    <form action="{{ route('admin.update.member') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-4 my-2">
                                <label for="">Sub admin Name</label>
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <input type="text" id="name"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ $user->name }}" placeholder="Enter Sub-admin name">
                                    @if ($errors->has('name'))
                                        <span class="error text-danger ms-5">{{ $errors->first('name') }}</span>
                                    @endif
                            </div>

                            <div class="col-md-4 my-2">
                                <label for="">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ $user->email }}" name="email" placeholder="Enter Email">
                                    @if ($errors->has('email'))
                                        <span class="error text-danger ms-5">{{ $errors->first('email') }}</span>
                                    @endif
                            </div>

                            <div class="col-md-4 my-2">
                                <label for="" class="mb-2">Country</label>
                                <select id="country"
                                    class="form-control @error('country') is-invalid border border-danger @enderror"
                                    name="country">
                                    <option disabled>Select your Country</option>
                                    <option value="bangladesh" {{ $user->country === 'bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                                    <option value="india" {{ $user->country === 'india' ? 'selected' : '' }}>India</option>
                                    <option value="pakistan" {{ $user->country === 'pakistan' ? 'selected' : '' }}>Pakistan</option>
                                    <option value="soudiarab" {{ $user->country === 'soudiarab' ? 'selected' : '' }}>Soudi Arab</option>
                                    <option value="singapore" {{ $user->country === 'singapore' ? 'selected' : '' }}>Singapore</option>
                                    <option value="oman" {{ $user->country === 'oman' ? 'selected' : '' }}>Oman</option>
                                    <option value="nepal" {{ $user->country === 'nepal' ? 'selected' : '' }}>Nepal</option>
                                    <option value="malaysia" {{ $user->country === 'malaysia' ? 'selected' : '' }}>Malaysia</option>
                                    <option value="uae" {{ $user->country === 'uae' ? 'selected' : '' }}>United Arab Emirates (UAE)</option>
                                </select>
                            </div>

                            <div class="col-md-4 my-2">
                                <label for="" class="mb-2">Contact Number</label>
                                <div class="input-group">
                                    <input id="countryCode" required name="countryCodeFormNumber" class="input-group-text col-md-2 col-2 @error('countryCodeFormNumber') is-invalid border border-danger @enderror"
                                        readonly>
                                    <input type="text"
                                        class="col-md-10 col-10 form-control @error('number') is-invalid border border-danger @enderror"
                                        name="number" value="{{ $user->number }}">
                                </div>
                            </div>
                            <div class="col-md-4 my-2 ">
                                <label for="" class="mb-2">What's app </label>
                                <div class="input-group">
                                    <input id="countryCodeForWp" required name="countryCodeFormWP" class="input-group-text col-md-2 col-2 @error('countryCodeFormWP') is-invalid border border-danger @enderror"
                                        readonly>
                                    <input type="text"
                                        class="col-md-10 col-10 form-control @error('whats_app') is-invalid border border-danger @enderror"
                                        name="whats_app" value="{{ $user->whats_app }}">
                                </div>
                            </div>

                            <div class="col-md-4 my-2">
                                <label for="" class="mb-2">Language</label>
                                <select id=""
                                    class="form-control @error('language') is-invalid border border-danger @enderror"
                                    name="language" value="{{ $user->language }}" required>
                                    <option disabled>Select your Language</option>
                                    <option value="bangla" {{ $user->language === 'bangla' ? 'selected' : '' }}>Bangla</option>
                                    <option value="english" {{ $user->language === 'english' ? 'selected' : '' }}>English</option>
                                    <option value="hindi" {{ $user->language === 'hindi' ? 'selected' : '' }}>Hindi</option>
                                    <option value="urdu" {{ $user->language === 'urdu' ? 'selected' : '' }}>Urdu</option>
                                </select>
                            </div>


                            <div class="col-md-4 my-2">
                                <label for="">Gender</label>
                                <select name="gender" class="form-control" id="gender" required>
                                    <option disabled>Select Gender</option>
                                    <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="famale" {{ $user->gender === 'famale' ? 'selected' : '' }}>Famale</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="error text-danger ms-5">{{ $errors->first('gender') }}</span>
                                @endif
                            </div>

                            <div class="col-md-4 my-2">
                                <label for="">Password</label>
                                <input type="text" class="form-control @error('password') is-invalid @enderror"
                                    name="password" placeholder="Enter Password">
                                    @if ($errors->has('password'))
                                        <span class="error text-danger ms-5">{{ $errors->first('password') }}</span>
                                    @endif
                            </div>

                            <div class="col-md-4 my-2">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" id="status">
                                    <option selected disabled>Select Status</option>
                                    <option value="active" {{ $user->status === 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="deactivate" {{ $user->status === 'deactivate' ? 'selected' : '' }}>Deactivate</option>
                                </select>
                                @if ($errors->has('status'))
                                    <span class="error text-danger ms-5">{{ $errors->first('status') }}</span>
                                @endif
                            </div>


                            <div class="ml-auto mt-4 me-1">
                                <button type="submit" class="d-block btn btn-primary px-5">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#country').change(function() {
                var country = $(this).val();
                var countryCode = '';

                switch (country) {
                    case 'bangladesh':
                        countryCode = '+88';
                        break;
                    case 'india':
                        countryCode = '+91';
                        break;
                    case 'pakistan':
                        countryCode = '+92';
                        break;
                    case 'soudiarab':
                        countryCode = '+966';
                        break;
                    case 'singapore':
                        countryCode = '+65';
                        break;
                    case 'oman':
                        countryCode = '+968';
                        break;
                    case 'nepal':
                        countryCode = '+977';
                        break;
                    case 'malaysia':
                        countryCode = '+60';
                        break;
                    case 'uae':
                        countryCode = '+971';
                        break;
                    default:
                        countryCode = '';
                }
                $('#countryCode').val(countryCode);
            });
            $('#country').change(function() {
                var country = $(this).val();
                var countryCode = '';

                switch (country) {
                    case 'bangladesh':
                        countryCode = '+88';
                        break;
                    case 'india':
                        countryCode = '+91';
                        break;
                    case 'pakistan':
                        countryCode = '+92';
                        break;
                    case 'soudiarab':
                        countryCode = '+966';
                        break;
                    case 'singapore':
                        countryCode = '+65';
                        break;
                    case 'oman':
                        countryCode = '+968';
                        break;
                    case 'nepal':
                        countryCode = '+977';
                        break;
                    case 'malaysia':
                        countryCode = '+60';
                        break;
                    case 'uae':
                        countryCode = '+971';
                        break;
                    default:
                        countryCode = '';
                }
                $('#countryCodeForWp').val(countryCode);
            });
        });
    </script>
    <script>
        document.forms['subadminEdit'].elements['country'].value = {{$user->country}};
        document.forms['subadminEdit'].elements['language'].value = {{$user->language}};
        document.forms['subadminEdit'].elements['gender'].value = {{$user->gender}};
  </script>
@endsection
