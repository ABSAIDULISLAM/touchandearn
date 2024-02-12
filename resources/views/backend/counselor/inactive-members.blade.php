@extends('backend.layouts.master')

@section('active')
    active
@endsection
@section('title')
    My Leads
@endsection

@section('toproute')
    <div class="row mb-4" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
        <div class="col-md-12 d-flex justify-content-between">
            <h4 class="m-0">My Leads</h4>
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
                                    <th scope="col" class="col-md-1">#</th>
                                    <th scope="col" class="col-md-2">STUDENT ID</th>
                                    <th scope="col" class="col-md-2">NAME</th>
                                    <th scope="col" class="col-md-1">WHATSAPP</th>
                                    <th scope="col" class="col-md-1">Call</th>
                                    <th scope="col" class="col-md-1">WP-Meaage</th>
                                    <th scope="col" class="col-md-2">RESPONSE</th>
                                    <th scope="col" class="col-md-1">LANGUAGE</th>
                                    <th scope="col" class="col-md-2">JOINING DATE</th>
                                    <th scope="col" class="col-md-2">VERIFICATION</th>
                                    <th scope="col" class="col-md-2">COUNTRY</th>
                                    <th scope="col" class="col-md-2">GENDER</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $user->student_id }}</td>
                                        <td>{{ $user->name }}</td>
                                        @if ($user->name)
                                        <td>
                                            <a id="whatsappButton" href="{{ route('send-whatsapp', ['number' => $user->whats_app, 'applicant_id' => $user->student_id]) }}" class="btn btn-primary btn-sm">WhatsApp</a></td>
                                        <td>
                                        @endif
                                            <a href="tel:{{$user->number}}" class="btn btn-secondary btn-sm px-3">Call</a>
                                        </td>
                                        <td>
                                            @if ($user->message == 'done')
                                                <a href="{{route('counselor.wp-ms-done', ['id' => $user->student_id])}}" onclick="return confirm('are you sure to done this wp message !')" class="btn btn-success btn-sm px-3">done</a>
                                            @else
                                                <p class="" style="font-size: 11px;">Please click WhatsApp before update WP-Message</p>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->message == 'done')
                                                <a href="{{route('counselor.wrong-whatsapp', ['stid' => $user->student_id])}}" class="btn btn-danger btn-sm px-3" onclick="return confirm('are you sure want to Wrong Wp listed this user !')">Wrong WP</a>
                                            @else
                                                <p class="" style="font-size: 11px;">Please click WhatsApp before update response</p>
                                            @endif
                                        </td>
                                        <td>{{ $user->language }}</td>
                                        <td>{{ date('d M Y H:i', strtotime($user->created_at)) }}</td>
                                        <td>{{ $user->email_verified_at == null ? 'Unverified' : 'verified' }}</td>
                                        <td>{{ $user->country }}</td>
                                        <td>{{ $user->gender }}</td>
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
@endsection
