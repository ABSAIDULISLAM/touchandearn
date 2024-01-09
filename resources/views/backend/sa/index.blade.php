@extends('backend.layouts.master')

@section('active')
    active
@endsection
@section('title')
    TL maping   
@endsection

@section('toproute')
    <div class="row mb-2" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
        <div class="col-sm-6">
            <h4 class="m-0">Team leader maping</h4>
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
                    <form action="" method="post">
                            <div class="card my-5">
                                <div class="col-md-8 m-auto">
                                    <div class="my-3 text-center"><h5>TL Transfer to TL</h5></div>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <select name="management_type" id="" class="form-control" required>
                                                <option disabled selected>Select Team Leader</option>
                                                <option value="counsellor">Counsellor</option>
                                                {{-- <option value="team_leader">Team Leader</option> --}}
                                            </select>
                                        </div>
                                        <h5 class="mt-2">To</h5>
                                        <div class="col-md-4">
                                            <select name="management_type" id="" class="form-control" required>
                                                <option disabled selected>Select Team Leader</option>
                                                <option value="counsellor">Counsellor</option>
                                                {{-- <option value="team_leader">Team Leader</option> --}}
                                            </select>
                                        </div>

                                        <div class="col-md-2 mt-1">
                                            <button type="submit" class="btn btn-primary">Transfer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>

                    <div class="table-responsive">
                        <form action="{{route('sa.transfer')}}" method="post">
                            @csrf
                            <div class="card">
                                <div class="col-md-8 m-auto">
                                    <div class="form-group row">
                                        <div class="col-md-9">
                                            <select name="teamleader_id" id="" class="form-control" required>
                                                <option disabled selected>Select Team Leader</option>
                                                @foreach ($teamleaders as $teamleader)
                                                <option value="{{$teamleader->user->id}}" >{{$teamleader->user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-2 mt-1">
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
                                        <th scope="col" class="col-md-2">email</th>
                                        <th scope="col" class="col-md-1">country</th>
                                        <th scope="col" class="col-md-1">Gender</th>
                                        <th scope="col" class="col-md-1">email_verified_at</th>
                                        <th scope="col" class="col-md-1">created_at</th>
                                        <th scope="col" class="col-md-2">Action</th>
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
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->country }}</td>
                                            <td>{{ $user->gender }}</td>
                                            <td>{{ $user->email_verified_at == null ? 'Unverified' : 'verified' }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>
                                                <a href="" class="btn-sm btn-success">Edit</a>
                                                <a href="" class="btn-sm btn-primary">view</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>




    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-OgVRXrjzMl/8M+5/yr8ymtSUpH2i0PJK3e/BktSAIT4D7iJKd5R2h/EMuL7eQE8pX" crossorigin="anonymous"></script> --}}
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
