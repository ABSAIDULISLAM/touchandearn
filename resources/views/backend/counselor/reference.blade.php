@extends('backend.layouts.master')

@section('active')
active
@endsection
@section('title')
reference
@endsection

@section('toproute')
<div class="row mb-2" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
    <div class="col-md-12 d-flex justify-content-between">
        <h4 class="m-0">Reference Count</h4>
    </div>
</div>
@endsection

@section('homesection')
    <div class="row">
        <div class="col-md-12 order-2 order-md-1">
            <div class="card card-outline card-primary">
                <div class="card-body">
                    @php
                        $date = date('Y-m-d')
                    @endphp
                    <form action="{{route('counselor.reference-check')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-4 col-4">
                                <input type="date" name="from_date" value="{{$date}}" class="form-control">
                            </div>
                            <div class="col-md-1 col-1 mt-1 text-center">
                                <span>TO</span>
                            </div>
                            <div class="col-md-4 col-4">
                                <input type="date" name="to_date" value="{{$date}}" class="form-control">
                            </div>

                            <div class="col-md-2 col-2">
                                <button class="btn btn-primary mt-1">Search</button>
                            </div>
                        </div>
                    </form>

                    <div id="loading" class="text-center" style="display: none;">
                        <i class="fas fa-spinner fa-spin"></i> Loading...
                    </div>

                    <div id="userCounts">
                        <div class="card">
                            <div class="card-body text-center">
                                <h4>Active - <span class="badge badge-success circle" id="activeCount">{{$user['active'] ?? 0}}</span></h4>
                                <h4>Deactive - <span class="badge badge-danger" id="deactiveCount">{{$user['deactivate'] ?? 0}}</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('form').submit(function (event) {
                event.preventDefault();

                // Show loading spinner
                $('#loading').show();

                // Perform AJAX request
                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: $(this).serialize(),
                    success: function (data) {
                        // Update user counts
                        $('#activeCount').text(data.active);
                        $('#deactiveCount').text(data.deactive);
                    },
                    complete: function () {
                        // Hide loading spinner after the request is complete
                        $('#loading').hide();
                    },
                    error: function () {
                        alert('An error occurred during the AJAX request.');
                    }
                });
            });
        });
    </script>


@endsection




