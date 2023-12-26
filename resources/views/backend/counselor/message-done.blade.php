@extends('backend.layouts.master')

@section('active')
    active
@endsection
@section('title')
    Done message
@endsection

@section('toproute')
    <div class="row mb-2" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
        <div class="col-sm-6">
            <h4 class="m-0">Done Message</h4>
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
                        <div class="col-md-8 m-auto">
                            <form action="" method="post">
                                <div class="form-group row">
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="search" placeholder="Search here by Student ID or NAME">
                                    </div>

                                    <div class="col-md-2 mt-1">
                                        <button type="submit" class="btn btn-primary">Transfer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" class="col-md-1">#</th>
                                    <th scope="col" class="col-md-2">STUDENT ID</th>
                                    <th scope="col" class="col-md-2">JOINING DATE</th>
                                    <th scope="col" class="col-md-2">NAME</th>
                                    <th scope="col" class="col-md-1">WHATSAPP</th>
                                    <th scope="col" class="col-md-2">GENDER</th>
                                    <th scope="col" class="col-md-2">COUNTRY</th>
                                    <th scope="col" class="col-md-2">MESSAGE</th>
                                    <th scope="col" class="col-md-2">RESPONSE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="open-modal" data-user-id="{{ $user->id }}">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $user->student_id }}</td>
                                        <td>{{ date('d M Y H:i', strtotime($user->created_at)) }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td><a target="blank" class="btn btn-primary btn-sm">
                                            WhatsApp
                                        </a></td>
                                        <td>{{ $user->gender }}</td>
                                        <td>{{ $user->country }}</td>
                                        <td>Noting</td>
                                        <td>
                                            <form action="{{ route('counselor.responseupdate-msdone') }}" method="post" class="msdForm">
                                                @csrf
                                                <input type="hidden" name="student_id" value="{{ $user->student_id }}">
                                                <select name="msd_response" class="msdResponse form-control">
                                                    <option selected disabled>Select Response</option>
                                                    <option value="show_modal">Re Scedule</option>
                                                    <option value="not_replied">Not Replied</option>
                                                    <option value="dont_fillup">Didn't Fill Up The Form</option>
                                                    <option value="meeting_not_join">Meeting Not Join</option>
                                                </select>
                                            </form>
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
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            var $j = jQuery.noConflict();
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <script>
            $(document).ready(function () {
                $('.msdResponse').change(function () {
                    var selectedOption = $(this).val();
                    var parentForm = $(this).closest('form');

                    if (selectedOption === 'not_replied' || selectedOption === 'dont_fillup' || selectedOption === 'meeting_not_join') {
                        var confirmation = confirm("Are you sure you want to save this response?");
                        if (confirmation) {
                            parentForm.submit();
                        } else {
                            $(this).val(null);
                        }
                    } else if (selectedOption === 'show_modal') {
                        var userId = parentForm.find('input[name="student_id"]').val();

                        // Adjust the URL based on your route structure
                        var redirectUrl = '/counselor/re-schedule/' + userId;

                        window.location.href = redirectUrl;
                    }
                });
            });
        </script>

    @endpush
@endsection
