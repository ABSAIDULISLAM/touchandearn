@extends('backend.layouts.master')

@section('active')
active
@endsection
@section('title')
subadmin create
@endsection

@section('toproute')
    <div class="row mb-2" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
        <div class="col-sm-6">
            <h4 class="m-0">Sub admin Create</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Station</a></li>
            </ol>
        </div>
    </div>
@endsection

@push('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('backend/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

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
                    <form action="{{route('subadmin.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6 my-2">
                                <label for="">Sub admin Name</label>
                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter Sub-admin name" >
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" name="email" placeholder="Enter Email">
                            </div>
                            <div class="col-md-4 my-2">
                                <label for="">Phone No.</label>
                                <input type="number" class="form-control @error('number') is-invalid @enderror"  value="{{ old('number') }}" name="number" placeholder="Enter Phone Number">
                            </div>
                            <div class="col-md-4 my-2">
                                <label for="">what's App No.</label>
                                <input type="number" class="form-control @error('whats_app') is-invalid @enderror" name="whats_app" value="{{ old('whats_app') }}" placeholder="Enter What's Aapp  Number">
                            </div>
                            <div class="col-md-4 my-2">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="col-md-3 my-3">
                                <label for="">Gender</label>
                                <select name="gender" class="form-control" id="">
                                    <option value="male">Male</option>
                                    <option value="famale">Famale</option>
                                </select>
                            </div>
                            <div class="col-md-3 my-3">
                                <label for="">Sub admin Type</label>
                                <select name="subadmintype_id" class="form-control" id="">
                                    @foreach ($subadminTypes as $subadminType)
                                        <option value="{{$subadminType->id}}">{{$subadminType->subadmin_type}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-md-3 my-3">
                                <label for="">Management Type</label>
                                <select name="managment_id" class="form-control" id="">
                                    @foreach ($managements as $management)
                                        <option value="{{$management->id}}">{{$management->role_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            @php

                            @endphp
                            <div class="col-md-3 my-3">
                                <label for="">Member Id</label>
                                <input type="text"  id="member_id" class="form-control @error('member_id') is-invalid @enderror" name="member_id" value="{{ old('member_id') }}" placeholder="Enter Member Id">
                            </div>
                            <div class="col-md-3 my-2">
                                <label for="">Coutry</label>
                                <select name="country_id" class="form-control" id="">
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="India">India</option>
                                </select>
                            </div>
                            <div class="col-md-3 my-2">
                                <label for="">Language</label>
                                <select name="language" class="form-control" id="">
                                    <option value="Bangla">Bangla</option>
                                    <option value="English">English</option>
                                    <option value="Hindi">Hindi</option>
                                </select>
                            </div>
                            <div class="col-md-3 my-2">
                                <label for="">New Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password">
                            </div>
                            <div class="col-md-3 my-2">
                                <label for="">Confirm Password</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Enter same as Password">
                            </div>

                            <div class="ml-auto mt-4 me-1">
                                <button type="submit" class="d-block btn btn-primary px-5">Save</button>
                            </div>

                        </div>
                    </form>
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

        <script src="{{ asset('backend/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <!-- AdminLTE App -->

        <script>
        $(function () {
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });
        });
        </script>
        {{-- <script>
            $(document).ready(function(){
               let name $('#name').val();
               $('#member_id').val(name);
            });
        </script> --}}
    @endpush
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}

@endsection




