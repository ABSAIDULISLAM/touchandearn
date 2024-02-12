@extends('backend.layouts.master')

@section('active')
active
@endsection
@section('title')
Trashed-member
@endsection

@section('toproute')
<div class="row mb-2" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
    <div class="col-md-12 d-flex justify-content-between">
        <h4 class="m-0">Trashed Members</h4>
        {{-- <a href="" class="btn btn-primary">Manage Student</a> --}}
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
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" class="col-md-1">#</th>
                                    <th scope="col" class="col-md-2">Role</th>
                                    <th scope="col" class="col-md-2">Id</th>
                                    <th scope="col" class="col-md-2">Name</th>
                                    <th scope="col" class="col-md-2">Number</th>
                                    <th scope="col" class="col-md-2">Whats App</th>
                                    <th scope="col" class="col-md-2">Gmail</th>
                                    <th scope="col" class="col-md-2">gender</th>
                                    <th scope="col" class="col-md-2">language</th>
                                    <th scope="col" class="col-md-2">country</th>
                                    <th scope="col" class="col-md-1">Status</th>
                                    <th scope="col" class="col-md-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$user->role_as}}</td>
                                    <td>{{$user->student_id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->number}}</td>
                                    <td>{{$user->whats_app}}</td>
                                    <td>{{$user->gmail}}</td>
                                    <td>{{$user->gender}}</td>
                                    <td>{{$user->language}}</td>
                                    <td>{{$user->country}}</td>
                                    @if ($user->status=='active')
                                    <td class="text-success">{{$user->status}}</td>
                                    @else
                                    <td class="text-danger">{{$user->status}}</td>
                                    @endif
                                    <td>
                                        <a href="{{route('admin.restor.member', ['id'=>$user->id, 'name'=>$user->name])}}" class="btn btn-sm btn-primary"  onclick="return confirm('are you sure to Restore this User   !!')">Restor</a>
                                        <a href="{{route('admin.delete.member', ['id'=>$user->id ])}}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure to delete this item !!')">Permanently Delte</a>
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
    @endpush
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}

@endsection




