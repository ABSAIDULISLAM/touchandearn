@extends('backend.layouts.master')

@section('active')
    active
@endsection

@section('title')
    Dashboard
@endsection

@section('toproute')

    <div class="row mb-2" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 5px">
        <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
        </div>
    </div>
@endsection

@section('homesection')
    <div class="row">
        <div class="container">
            <div class="marquer py-2" style="background-color: #2196F3;">
                <div class="card-header px-3 py-2">
                    <marquee behavior="smoth" onmouseover="stop()" onmouseout="start()" direction="left" class="d-flex"> <b class="text-white" style="font-size: 19px;">Welcome to Touch and earn Empire</b></marquee>
                </div>
            </div>
        </div>

        <div class="container my-2" style="background-color: #ffffff">
            <div class="row">
                <div class="col-md-4">
                    <div class="card my-2 shodow-white"
                        style=" box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; background-color:#fff;">
                        <div class="card-body">
                            <div class="profile text-center">
                                @if (empty($user->image))
                                    <img src="{{ asset('backend/assets/dist/img/avatar3.png') }}" alt="profile-image"
                                         height="120px" width="130px" class="rounded-circle m-auto">
                                         @else
                                         <img src="{{ asset($user->image) }}" alt="profile-image"
                                              height="120px" width="130px" class="rounded-circle m-auto">
                                     @endif
                                <div class="user-info mt-2">
                                    <p style="font-weight: 500; font-size: 22px">{{ $user->name }}
                                    <p>
                                        <span style="font-weight: 100; font-size: 12px"> Joined :
                                            {{ $user->created_at }}</span><br>
                                </div>

                                <div class="card p-2" style=" box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px">
                                    <div class="col-md-12 d-block mt-3">
                                        <button class="btn btn-primary w-100">EARNINGS</button>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-6 mt-2">
                                            <div class="today">
                                                <p style="background-color: #FFA000; color:#fff; font-size:15px" class="p-3">
                                                    @if ($todayEarnings== null)
                                                    TK. 0.00
                                                    @else
                                                    TK. {{$todayEarnings}}
                                                    @endif
                                                </p>
                                                <p style="background-color: #377DFF; color:#fff; font-size:15px" class="p-3">
                                                    Today
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-6 mt-2">
                                            <div class="today">
                                                <p style="background-color: #FFA000; color:#fff; font-size:15px" class="p-3">
                                                    @if ($user->ballance == null)
                                                    Points. 0.00
                                                    @else
                                                    Points. {{$user->ballance}}
                                                    @endif
                                                </p>
                                                <p style="background-color: #377DFF; color:#fff; font-size:15px" class="p-3">
                                                    Total
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <style>
                                    hr {
                                        padding: 0px;
                                        margin: 0px;
                                    }

                                    .navbars a {
                                        font-size: 18px;
                                        padding-top: 5px;

                                    }

                                    .navbars a .active {
                                        background-color: #FF6A00;
                                        color: #fff;
                                    }

                                    .navbars a p {
                                        padding: 5px 20px;
                                        font-size: 18px;
                                        border-radius: 5px;
                                        color: #333;
                                        transition: 0.1s;
                                    }

                                    .navbars a p:hover {
                                        color: #FF5C00;
                                    }
                                </style>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">

                    <div class="card my-2 shodow-white"
                        style=" box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; background-color:rgb(255, 255, 255)">
                        <div class="card-body  p-5">
                            <div class="joing text-center">
                                @if (auth()->user()->status == 'deactivate')
                                <h3 class="text-danger text-center my-3">Your Account is Inactive now.</h3>
                                @endif
                                <img src="{{ asset('backend/assets/telegram.png') }}" alt="profile-image"
                                    height="120px" width="150px" class="rounded-circle m-auto">

                                    <p class="text-center mt-2"  style="font-size: 16px;">আমাদের অফিসিয়াল Telegram গ্রুপ এ নিচের বাটনে ক্লিক করে জয়েন করুন</p>
                                <div class="button text-center">
                                    <a href="" class="btn btn-sm mt-3 text-center px-5"
                                        style="background-color: #FF5C00; color:#fff;">JOIN NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card my-2 shodow-white mt-2"
                        style=" box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; background-color:#E0EDE4">
                        <div class="card-body">
                            <div class="joing">
                                <h4 class="text-success text-center">আপনার রেফার লিংক:</h4>
                                <input type="text" class="form-control text-center mt-2 text-danger"
                                    id="referenceLink" value="{{ $referRoute }}" readonly>
                                <div class="button text-center">
                                    <button type="button" class="btn mt-3 text-center px-3"
                                        style="background-color: #FF5C00; color:#fff;" id="shareBtn">Share
                                    </button>
                                    <button type="button" class="btn mt-3 text-center px-3"
                                        style="background-color: #FF5C00; color:#fff;" id="copyBtn">Copy
                                    </button>
                                </div>
                                <!-- Display a message when link is copied -->
                                <p id="copyMessage" class="text-center mt-2 text-success" style="font-size: 16px;"></p>
                            </div>
                        </div>
                    </div>
                    <div class="card my-2 shodow-white mt-2"
                        style=" box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; background-color:#E0EDE4">
                        <div class="card-body">
                            <div class="joing">
                                <h4 class="text-primary text-center">আপনার একাউন্ট নম্বর ও রেফার আই.ডি:</h4>
                                <input type="text" class="form-control text-center mt-2 text-danger"
                                    id="referenceCode" value="{{ $user->referral_code }}" readonly>
                                <div class="button text-center">
                                    <button id="copyBtn2" class="btn mt-3 text-center px-3"
                                        style="background-color: #FF5C00; color:#fff;">Copy
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6 col-6">

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function() {
                // Share link using Web Share API
                $('#shareBtn').click(function() {
                    if (navigator.share) {
                        navigator.share({
                                title: 'Share Link',
                                text: 'Check out this link:',
                                url: $('#referenceLink').val()
                            })
                            .then(() => console.log('Link shared successfully!'))
                            .catch((error) => console.error('Error sharing link:', error));
                    } else {
                        alert('Web Share API is not supported on this browser.');
                    }
                });

                // Copy link to clipboard
                $('#copyBtn').click(function() {
                    var referenceLink = $('#referenceLink');
                    referenceLink.select();
                    document.execCommand('copy');

                    // Display an alert message on successful copy
                    alert('Link copied to clipboard!');
                });
                $('#copyBtn2').click(function() {
                    var referenceCode = $('#referenceCode');
                    referenceCode.select();
                    document.execCommand('copy');

                    // Display an alert message on successful copy
                    alert('Code copied to clipboard!');
                });
            });
        </script>

    </div>
@endsection
