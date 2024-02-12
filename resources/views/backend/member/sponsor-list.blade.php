@extends('backend.layouts.master')

@section('active')
    active
@endsection
@section('title')
    Sponsor list
@endsection

@section('toproute')
    <div class="row mb-4" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
        <div class="col-md-12 d-flex justify-content-between">
            <h4 class="m-0">Sponsor List</h4>
            {{-- <a class="btn btn-primary"> Create</a> --}}
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
                                <th scope="col" class="col-md-1">#</th>
                                <th scope="col" class="col-md-2">Name</th>
                                <th scope="col" class="col-md-2">whats app</th>
                                <th scope="col" class="col-md-1">Status</th>
                                <th scope="col" class="col-md-2">Joing date</th>
                                <th scope="col" class="col-md-1">Last seen</th>
                                <th scope="col" class="col-md-1"></th>
                            </thead>
                            <tbody>
                                @foreach ($networkDatas as $user)
                                    @if ($user->usertwo)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $user->usertwo->name ?? 'Null' }}</td>
                                        <td>{{ $user->usertwo->whats_app ?? 'Null' }}</td>
                                        <td>{{ $user->usertwo->status ?? 'Null' }}</td>
                                        <td>{{ $user->usertwo->created_at ?? 'Null' }}</td>
                                        <td>{{ $user->usertwo->last_seen ?? 'Null' }}</td>
                                        <td>
                                            <a href="{{route('sponsor.edit', ['stid'=>$user->usertwo->id, 'name' =>$user->usertwo->name])}}" class="btn-sm btn-success">Edit</a>
                                        </td>
                                    </tr>
                                    @endif
                                    
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
