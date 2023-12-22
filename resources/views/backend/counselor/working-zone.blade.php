@extends('backend.layouts.master')

@section('active')
    active
@endsection
@section('title')
    Working zone
@endsection

@section('toproute')
    <div class="row mb-2" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
        <div class="col-sm-6">
            <h4 class="m-0">Working Zone</h4>
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
                                    <th scope="col" class="col-md-2">COUNSELLING</th>
                                    <th scope="col" class="col-md-2">RESPONSE</th>
                                    <th scope="col" class="col-md-2">CL RESP</th>
                                    <th scope="col" class="col-md-2">MESSAGE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $user->student_id }}</td>
                                        <td>{{ date('d M Y H:i', strtotime($user->created_at)) }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td><a target="blank" href="{{ route('send-whatsapp', ['number' => $user->whats_app, 'applicant_id' => $user->student_id]) }}" class="btn btn-primary btn-sm">
                                            WhatsApp 
                                        </a></td>
                                        <td>{{ $user->gender }}</td>
                                        <td>{{ $user->country }}</td>
                                        <td><a target="blank" href="" class="btn btn-success btn-sm">
                                            Pending For Approval 
                                        </a></td>
                                        <td>Meeting_fixed</td>
                                        <td>interested</td>
                                        <td>Noting</td>
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
