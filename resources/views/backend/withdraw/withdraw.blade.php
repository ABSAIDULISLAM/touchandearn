@extends('backend.layouts.master')

@section('active')
    active
@endsection
@section('title')
    WithDraw
@endsection

@section('toproute')
    <div class="row mb-2" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
        <div class="col-sm-6">
            <h4 class="m-0">Withdraw Request</h4>
        </div>
        <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">
                {{-- <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Station</a></li> --}}
                <a href="" class="btn btn-outline-primary">Create </a>
            </ol>
        </div>
    </div>
@endsection

@section('homesection')
    <div class="row">

        <div class="col-md-12 ">
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

                    <form action="{{route('withdraw-request.send')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6 my-2">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" value="{{$user->name}}" readonly>
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="name">ID</label>
                                <input type="number" class="form-control" value="{{$user->student_id}}" readonly>
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="name">Call</label>
                                <input type="number" class="form-control" value="{{$user->number}}" readonly>
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="name">What App</label>
                                <input type="number" class="form-control" value="{{$user->whats_app}}" readonly>
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="name">Country</label>
                                <input type="text my-2" class="form-control" value="{{$user->country}}" readonly>
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="name">Gender</label>
                                <input type="text my-2" class="form-control" value="{{$user->gender}}" readonly>
                            </div>


                            <div class="col-md-6 my-2">
                                <label for="name">Withdrawal Points</label>
                                <input type="number" name="withdrawal_amount" class="form-control" placeholder="Enter your withdrawal points" max="{{$user->ballance}}" required>
                                @if ($errors->has('withdrawal_amount'))
                                    <span class="error text-danger ms-5">{{ $errors->first('withdrawal_amount') }}</span>
                                @endif
                                @if ($user->ballance >= 1000.00)
                                    <span>Your Total Balance Points: <b class="text-success my-2">{{$user->ballance}}</b></span>
                                @else
                                    <span>Your Balance Points: <b class="text-danger my-2">{{$user->ballance}}</b>, For Withdraw need ballance minimum<span class="text-primary"> 1000.00</span></span>
                                @endif
                            </div>

                            <div class="col-md-6 my-2">
                                <label for="name">Payment Number</label>
                                <input type="number" name="payment_number" class="form-control" placeholder="Enter here Your Payment receive Number" required>
                                <input type="hidden" name="role_as" class="form-control" value="{{$user->role_as}}" >
                            </div>
                            @if ($errors->has('payment_number'))
                                <span class="error text-danger ms-5">{{ $errors->first('payment_number') }}</span>
                            @endif

                            <div class="col-md-12 my-2">
                                <label for="name">Payment Method</label>
                                <select name="payment_method" id="" class="form-control">
                                    <option selected disabled>Select Payment Method</option>
                                    <option value="bkash">Bkash</option>
                                    <option value="nagod">Nagod</option>
                                </select>
                                @if ($errors->has('payment_method'))
                                    <span class="error text-danger ms-5">{{ $errors->first('payment_method') }}</span>
                                @endif
                            </div>

                            <div class="col-md-12 my-4">
                                @if ($user->ballance >= 1000.00)
                                    <button class="btn btn-primary" onclick="return confirm('বি. দ্র. আপনার প্রত্যেকবার উইথড্র এর সাথে ১০০ পয়েন্ট করে ট্রানজেকশন ফি কাটা হবে, আপনি রাজি থাকলে ওকে বাটনে ক্লিক করে উইথড্রুয়াল রিকোয়েস্ট সেন্ড করুন. ধন্যবাদ')">Send Request</button>
                                @else
                                    <button class="btn btn-primary" disabled>Send Request</button>
                                @endif

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>


@endsection
