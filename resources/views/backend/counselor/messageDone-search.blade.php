@extends('backend.layouts.master')

@section('active')
    active
@endsection
@section('title')
    ms-done-search
@endsection

@section('toproute')
    <div class="row mb-2" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
        <div class="col-sm-6">
            <h4 class="m-0">Searched Student</h4>
        </div>
        <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">
                <a href="{{route('counselor.message-done')}}" class="btn btn-outline-primary">Done Message</a>
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

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col-md-2">name</th>
                                        <th scope="col" class="col-md-2">ID</th>
                                        <th scope="col" class="col-md-2">WhatsApp</th>
                                        <th scope="col" class="col-md-2">Call</th>
                                        <th scope="col" class="col-md-2">Counselor</th>
                                        <th scope="col" class="col-md-2">Team Leader</th>
                                        <th scope="col" class="col-md-2">status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($searchResult))
                                        <tr>
                                            <td>{{$searchResult->name}}</td>
                                            <td>{{$searchResult->student_id}}</td>
                                            <td>{{$searchResult->whats_app}}</td>
                                            <td>{{$searchResult->number}}</td>
                                            <td>{{$searchResult->counselor_id}}</td>
                                            <td>{{$searchResult->teamleader_id}}</td>
                                            <td>{{$searchResult->status}}</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </form>
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
