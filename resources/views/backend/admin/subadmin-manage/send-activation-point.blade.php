@extends('backend.layouts.master')

@section('active')
    active
@endsection
@section('title')
    Activation points send
@endsection

@section('toproute')
    <div class="row mb-2" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
        <div class="col-sm-6">
            <h4 class="m-0">Activation points send</h4>
        </div>
        <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">
                {{-- <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Station</a></li> --}}
                <a href="" class="btn btn-outline-primary">Create Teacher</a>
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

        <div class="col-md-8 m-auto order-2 order-md-1">
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

                        <form id="searchForm" action="{{route('admin.student-id.check')}}" method="post" >
                            @csrf
                            <div class="card">
                                <div class="col-md-8 m-auto">
                                    <div class="form-group row">
                                        <div class="col-md-9">
                                            <input type="number" name="student_id" class="form-control @error('student_id') is-invalid border border-danger @enderror" value="{{old('student_id')}}" placeholder="Enter Here Student Id" required>
                                                <span id="error" class="error text-danger ms-5"></span>
                                        </div>
                                        <div class="col-md-2 mt-1">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('subadmin.send-activation-point')}}" method="post">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-md-6 my-2">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control"  id="name" readonly>
                                        </div>
                                        <div class="col-md-6 my-2">
                                            <label for="name">ID</label>
                                            <input type="number" class="form-control" id="student_id"  readonly>
                                        </div>
                                        <div class="col-md-6 my-2">
                                            <label for="name">Call</label>
                                            <input type="number" class="form-control" id="call" readonly>
                                        </div>
                                        <div class="col-md-6 my-2">
                                            <label for="name">What App</label>
                                            <input type="number" class="form-control" id="whatsApp" readonly>
                                        </div>
                                        <div class="col-md-6 my-2">
                                            <label for="name">Country</label>
                                            <input type="text my-2" class="form-control" id="country" readonly>
                                        </div>
                                        <div class="col-md-6 my-2">
                                            <label for="name">Gender</label>
                                            <input type="text my-2" class="form-control" id="gender" readonly>
                                        </div>
                                        <div class="col-md-6 my-2">
                                            <label for="name">Available Activation Points</label>
                                            <input type="text my-2" class="form-control" id="activationPoint" readonly>
                                        </div>


                                        <div class="col-md-12 my-2">
                                            <label for="name">Activation Point <span class="text-danger h5">*</span></label>
                                            <input type="number" name="activation_points" class="form-control" placeholder="Enter Send able Activation points" required>
                                            <input type="hidden" name="id" id="id" class="form-control" >
                                            @if ($errors->has('activation_point'))
                                            <span class="error text-danger ms-5">{{ $errors->first('activation_point') }}</span>
                                        @endif
                                        </div>
                                        <div class="col-md-12 my-2">
                                            <label for="name">Description </label>
                                            <textarea name="description" id="" cols="10" rows="4" placeholder="Enter Here Your Description" class="form-control @error('student_id') is-invalid border border-danger @enderror"></textarea>
                                            @if ($errors->has('description'))
                                                <span class="error text-danger ms-5">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>

                                        <div class="col-md-12 my-4">
                                                <button class="btn btn-primary ">Send Activation Ponts</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>


    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    @include('ajax.ajax')



@endsection
