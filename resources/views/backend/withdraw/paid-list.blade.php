@extends('backend.layouts.master')

@section('active')
    active
@endsection
@section('title')
    Withdraw Paid
@endsection

@section('toproute')
    <div class="row mb-4" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
        <div class="col-md-12 d-flex justify-content-between">
            <h4 class="m-0">Withdraw Paid history</h4>
            {{-- <a href="{{route('withdraw-request')}}" class="btn btn-primary">Send a Withdraw Request</a> --}}
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
                                    <th scope="col" class="col-md-2">Name</th>
                                    <th scope="col" class="col-md-2">std id</th>
                                    <th scope="col" class="col-md-2">Phone</th>
                                    <th scope="col" class="col-md-2">Whats app</th>
                                    <th scope="col" class="col-md-2">Country</th>
                                    <th scope="col" class="col-md-2">Role</th>
                                    <th scope="col" class="col-md-2">Gender</th>
                                    <th scope="col" class="col-md-2">Withdrawal Point</th>
                                    <th scope="col" class="col-md-2">Withdrawal coast</th>
                                    <th scope="col" class="col-md-2">payment method</th>
                                    <th scope="col" class="col-md-2">payment number</th>
                                    <th scope="col" class="col-md-1">Request date</th>
                                    <th scope="col" class="col-md-1">status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($members as $member)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $member->user->name ?? 'Null' }}</td>
                                        <td>{{ $member->user->student_id ?? 'Null' }}</td>
                                        <td>{{ $member->user->number ?? 'Null' }}</td>
                                        <td>{{ $member->user->whats_app ?? 'Null' }}</td>
                                        <td>{{ $member->user->country ?? 'Null' }}</td>
                                        <td>{{ $member->user->role_as ?? 'Null' }}</td>
                                        <td>{{ $member->user->gender ?? 'Null' }}</td>
                                        <td>{{ $member->withdrawal_amount ?? 'Nll' }}</td>
                                        <td>100.00</td>
                                        <td>{{ $member->payment_method ?? 'Null' }}</td>
                                        <td>{{ $member->payment_number ?? 'Null' }}</td>
                                        <td>{{ $member->created_at ?? 'Null'}}</td>
                                        <td>
                                            @if ($member->status =='paid')
                                                <button type="button" class="btn btn-success btn-sm">Paid</button>
                                            @endif
                                        </td>
                                    </tr>
                                    @php
                                        $total = $member->withdrawal_amount+ $total;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="text-center">
                        <h4>Paid Total Withdraw:  <span class="text-success">{{$total}}</span> Points</h4>
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
