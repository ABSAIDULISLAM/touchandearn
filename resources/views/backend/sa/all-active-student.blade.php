@extends('backend.layouts.master')

@section('active')
    active
@endsection
@section('title')
    all active student
@endsection

@section('toproute')
    <div class="row mb-4" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
        <div class="col-md-12 d-flex justify-content-between">
            <h4 class="m-0">All Active Students</h4>
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
                        <form action="{{route('sa.transfer')}}" method="post">
                            @csrf
                            <div class="card">
                                <div class="col-md-8 m-auto">
                                    <div class="form-group row">
                                        <div class="col-md-9 col-9">
                                            <select name="teamleader_id" id="" class="form-control" required>
                                                <option disabled selected>Select Team Leader</option>
                                                @foreach ($teamleaders as $teamleader)
                                                <option value="{{$teamleader->user->id}}" >{{$teamleader->user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-3 col-3 mt-1">
                                            <button type="submit" class="btn btn-primary">Transfer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th scope="col" class="col-md-1">#</th>
                                        <th scope="col" class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="selectAll">
                                                <label class="form-check-label" for="selectAll">Select All </label>
                                            </div>
                                        </th>
                                        <th scope="col" class="col-md-1">Activation Point</th>
                                        <th scope="col" class="col-md-2">Country</th>
                                        <th scope="col" class="col-md-2">email</th>
                                        <th scope="col" class="col-md-1">Team Leader</th>
                                        <th scope="col" class="col-md-1">Counselor</th>
                                        <th scope="col" class="col-md-1">Gender</th>
                                        <th scope="col" class="col-md-1">email_verified_at</th>
                                        <th scope="col" class="col-md-1">created_at</th>
                                        {{-- <th scope="col" class="col-md-1">Status</th> --}}
                                        <th scope="col" class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>

                                            <td>{{ $loop->index+1 }}</td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input checkbox" type="checkbox" name="names[]" value="{{ $user->id }}">
                                                    <label class="form-check-label" > {{ $user->name }}</label>
                                                </div>
                                            </td>
                                            <td>{{ $user->activation_points }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->country }}</td>
                                            <td>{{ optional($user->teamleader)->name ?? 'Null' }}</td>
                                            <td>{{ optional($user->counselor)->name ?? 'Null' }}</td>
                                            <td>{{ $user->gender }}</td>
                                            <td>{{ $user->email_verified_at == null ? 'Unverified' : 'verified' }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td class="badge badge-danger p-1 m-0">{{ $user->status }}</td>
                                            {{-- <td>
                                                <a href="{{route('sa.student.activate', ['stId'=>$user->id, 'name'=>$user->name])}}" onclick="return confirm('Are you sure to active this Student')" class="btn btn-warning btn-sm mr-2">Activate</a>
                                            </td> --}}

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <script>
        document.getElementById('selectAll').addEventListener('change', function () {
            var checkboxes = document.getElementsByClassName('checkbox');
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = this.checked;
            }
        });
    </script>

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
