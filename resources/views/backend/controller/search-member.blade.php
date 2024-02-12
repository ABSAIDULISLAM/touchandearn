@extends('backend.layouts.master')

@section('active')
    active
@endsection
@section('title')
    search-student
@endsection

@section('toproute')
    <div class="row mb-2" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
        <div class="col-md-12 d-flex justify-content-between">
            <h4 class="m-0">All Students</h4>
            {{-- <a href="{{route('admin.send-activation-points-to-subadmin')}}" class="btn btn-primary">Send Activation Points</a> --}}
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
                    <div class="table-responsive">

                        <form action="{{ route('student-search') }}" method="post">
                            @csrf
                            <div class="card">
                                <div class="col-md-8 m-auto">
                                    <div class="form-group row">
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="id_or_wp"
                                                placeholder="Enter Student ID or What's App number">
                                        </div>

                                        <div class="col-md-2 mt-1">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="card">
                            <div class="card-header text-center">
                                <h4>Student Info By Search</h4>
                            </div>
                            <div class="table-responsive">

                                <table class="table table-bordered table-striped table-hover">

                                    @if (isset($student))
                                        <tr>
                                            <th>ID</th>
                                            <td>{{ $student->student_id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td>{{ $student->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone Number:</th>
                                            <td><a class="btn btn-primary"
                                                    href="tel:{{ $student->number }}">{{ $student->number }}</a></td>
                                        </tr>
                                        <tr>
                                            <th>Whstsapp Number:</th>
                                            <td><a class="btn btn-primary" href="https://wa.me/{{ $student->whats_app }}"
                                                    target="_blank">{{ $student->whats_app }}</a></td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Gmail:</th>
                                            <td>{{ $student->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Country:</th>
                                            <td>{{ $student->country }}</td>
                                        </tr>
                                        <tr>
                                            <th>Language:</th>
                                            <td>{{ $student->language }}</td>
                                        </tr>
                                        <tr>
                                            <th>Gender:</th>
                                            <td>{{ $student->gender }}</td>
                                        </tr>
                                        <tr>
                                            <th>My Team Leader (ID)</th>
                                            @if (empty($student->teamleader))
                                                <td>Null</td>
                                            @else
                                                <td>{{ $student->teamleader->name }}-({{ $student->teamleader->student_id }})
                                                </td>
                                            @endif

                                        </tr>
                                        <tr>
                                            <th>Counselor (ID)</th>
                                            @if (empty($student->counselor))
                                                <td>Null</td>
                                            @else
                                                <td>{{ $student->counselor->name }}-({{ $student->counselor->student_id }})
                                                </td>
                                            @endif

                                        </tr>
                                        <tr>
                                            <th>created_at</th>
                                            <td>{{ $student->created_at->isoFormat('Do MMM YYYY') }}</td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
