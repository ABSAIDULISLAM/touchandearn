@extends('backend.layouts.master')

@section('active')
    active
@endsection
@section('title')
    re-scedule
@endsection

@section('toproute')
    <div class="row mb-2" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
        <div class="col-sm-6">
            <h4 class="m-0">Re-Scedule</h4>
        </div>
        <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">
                {{-- <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Station</a></li> --}}
                <a href="" class="btn btn-outline-primary">Create</a>
            </ol>
        </div>
    </div>
@endsection

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('homesection')
    <div class="row">

        <div class="col-md-12 order-2 order-md-1">
            <div class="card card-outline card-primary">
                <div class="card-body">

                    <div class="card">
                        <div class="card-header text-center bg-gray"><h5>Student ID {{$userData->student_id}} Counselling Schedule</h5></div>

                        <div class="col-md-8 m-auto">


                            <form action="{{route('schedule-save')}}" method="post" class="mt-3">
                                @csrf

                                <input type="hidden" name="student_id" value="{{$userData->student_id}}">

                                <div class="form-group row">

                                    <div class="col-md-6 my-2">
                                        <label for="">Student Id  :</label>
                                        <input type="text" readonly value="{{$userData->student_id}}"  class="form-control">
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <label for="">Gender  :</label>
                                        <input type="text" readonly value="{{$userData->gender}}"  class="form-control">
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <label for="">Student Name  :</label>
                                        <input type="text" readonly value="{{$userData->name}}"  class="form-control">
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <label for="">Country  :</label>
                                        <input type="text" readonly value="{{$userData->country}}"  class="form-control">
                                    </div>

                                    @php
                                        $now = date('Y-m-d');
                                    @endphp
                                    <div class="col-md-12 mt-4">
                                        <label for="">Select Date of Schedule :</label>
                                        <input type="date" name="schedule_date" id="schedule_date" value="{{ $now }}" class="form-control">
                                    </div>
                                    @php
                                        $time = date('H:i');
                                    @endphp
                                    <div class="col-md-12 my-3">
                                        <label for="">Select Time of Schedule :</label>
                                        <input type="time" name="schedule_time" id="schedule_time" value="{{$time}}" class="form-control">
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <button class="btn btn-primary px-5">Save Schedule</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @push('js')
        <!-- DataTables  & Plugins -->
        <script src="{{ asset('backend/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <script>
            $(document).ready(function () {
                // Function to disable dates before today and after the next three days
                function setAvailableDates() {
                    var currentDate = new Date();
                    var nextThreeDays = new Date(currentDate);
                    nextThreeDays.setDate(nextThreeDays.getDate() + 2);

                    var formattedCurrentDate = currentDate.toISOString().split('T')[0];
                    var formattedNextThreeDays = nextThreeDays.toISOString().split('T')[0];

                    $('#schedule_date').attr('min', formattedCurrentDate);
                    $('#schedule_date').attr('max', formattedNextThreeDays);
                }

                // Function to set the available time options
                // function setAvailableTimes() {
                //     var currentTime = new Date();
                //     var hours = currentTime.getHours();
                //     var minutes = currentTime.getMinutes();

                //     // Set the minimum time to the current time
                //     $('#schedule_time').attr('min', ('0' + hours).slice(-2) + ':' + ('0' + minutes).slice(-2));
                // }

                // Call the functions on page load
                setAvailableDates();
                // setAvailableTimes();

                // Bind the functions to the change event of the date input field
                $('#schedule_date').change(function () {
                    setAvailableTimes();
                });
            });
        </script>
    @endpush
@endsection
