
@extends('backend.layouts.master')

@section('active')
    active
@endsection
@section('title')
    active member
@endsection

@section('toproute')
    <div class="row mb-2" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
        <div class="col-sm-6">
            <h4 class="m-0">Withdawal request list</h4>
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

        <div class="col-md-12 order-2 order-md-1">
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Id</th>
                                    <th>name</th>
                                    <th>joining Date</th>
                                    <th>verification</th>
                                    <th>email</th>
                                    <th>phone</th>
                                    <th>What' app</th>
                                    <th>Gender</th>
                                    <th>Language</th>
                                    <th>country</th>
                                    <th>Referral Code</th>
                                    <th>RefferTL(Id)</th>
                                    <th>Reffer TL(whatsapp)</th>
                                    <th>Counsellor (Id)</th>
                                    <th>Counsellorwhatsapp</th>
                                    <th>Message(Date/Time)</th>
                                    <th>Message Response</th>
                                    <th>Status</th>
                                    <th>Active date/Time</th>e
                                    <th>Team leader</th>
                                    <th>Team Leader (whatsapp)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{$user->student_id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>{{$user->email_verified_at==null? 'Unverified':'Verified'}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->number}}</td>
                                    <td>{{$user->whats_app}}</td>
                                    <td>{{$user->gender}}</td>
                                    <td>{{$user->language}}</td>
                                    <td>{{$user->country}}</td>
                                    <td>{{$user->referral_code}}</td>
                                    <td>Reffer(whatsapp)</td>
                                    <td>RefferTL(Id)</td>
                                    <td>Reffer TL(whatsapp)</td>
                                    <td>Counsellor (Id)</td>
                                    <td>Counsellorwhatsapp</td>
                                    <td>Message(Date/Time)</td>
                                    <td>Message Response</td>
                                    <td>ab</td>
                                    <td>an</td>
                                    <td>{{$user->status=='active'?'Active':'Inactiv'}}</td>
                                    <td>
                                        <a href="" class="btn-sm btn-primary">Edit</a>
                                        <a href="" onclick="confirm('are you sure to delete this item')"
                                            class="btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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

        <script src="{{ asset('backend/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <!-- AdminLTE App -->

        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
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
    @endpush
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}
@endsection
