@extends('backend.layouts.master')

@section('active')
    active
@endsection
@section('title')
    Withdraw history
@endsection

@section('toproute')
    <div class="row mb-4" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
        <div class="col-md-12 d-flex justify-content-between">
            <h4 class="m-0">Withdraw history</h4>
            <a href="{{route('withdraw-request')}}" class="btn btn-primary">Send a Withdraw Request</a>
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
                                <th scope="col" class="col-md-2">Number</th>
                                <th scope="col" class="col-md-2">Method</th>
                                <th scope="col" class="col-md-2">Status</th>
                                <th scope="col" class="col-md-2">Amont</th>
                                <th scope="col" class="col-md-2">request date</th>
                                <th scope="col" class="col-md-1">active date</th>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($withdraws as $withdraw)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $withdraw->payment_number }}</td>
                                        <td>{{ $withdraw->payment_method }}</td>
                                        <td>{{ $withdraw->status }}</td>
                                        <td>{{ $withdraw->withdrawal_amount }}</td>
                                        <td>{{ $withdraw->created_at->isoFormat('Do MMM YYYY') }}</td>
                                        <td>{{ $withdraw->updated_at->isoFormat('Do MMM YYYY') }}</td>
                                    </tr>
                                    @php
                                    $total = $withdraw->withdrawal_amount+ $total;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="text-center">
                        <h4>Your Total Withdraw:  <span class="text-success">{{$total}}</span> Points</h4>
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
