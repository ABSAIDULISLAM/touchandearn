@extends('backend.layouts.master')

@section('active')
    active
@endsection
@section('title')
    subadmin create
@endsection

@section('toproute')
    <div class="row mb-2" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
        <div class="col-sm-6">
            <h4 class="m-0">Sub admin Create</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
        </div>
    </div>
@endsection


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
                    <form action="{{ route('account.update-bafw') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6 my-2">
                                <label for="ballance">Balance</label>
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <input type="number" id="ballance"
                                    class="form-control @error('ballance') is-invalid @enderror" name="ballance"
                                    value="{{ $user->ballance }}" placeholder="Enter Balance">
                                    @if ($errors->has('ballance'))
                                        <span class="error text-danger ms-5">{{ $errors->first('ballance') }}</span>
                                    @endif
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="activation_points">Activation Point</label>
                                <input type="number" id="activation_points"
                                    class="form-control @error('activation_points') is-invalid @enderror" name="activation_points"
                                    value="{{ $user->activation_points }}" placeholder="Enter activation_points">
                                    @if ($errors->has('activation_points'))
                                        <span class="error text-danger ms-5">{{ $errors->first('activation_points') }}</span>
                                    @endif
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="freeze_points">Freeze Points</label>
                                <input type="number" id="freeze_points"
                                    class="form-control @error('freeze_points') is-invalid @enderror" name="freeze_points"
                                    value="{{ $user->activation_points }}" placeholder="Enter activation_points">
                                    @if ($errors->has('freeze_points'))
                                        <span class="error text-danger ms-5">{{ $errors->first('freeze_points') }}</span>
                                    @endif
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="activation_points">Withdraw</label>
                                <input type="number" id="withdraw"
                                    class="form-control @error('withdraw') is-invalid @enderror" name="withdraw"
                                    value="{{ $user->activation_points }}" placeholder="Enter withdraw">
                                    @if ($errors->has('withdraw'))
                                        <span class="error text-danger ms-5">{{ $errors->first('withdraw') }}</span>
                                    @endif
                            </div>

                            <div class="ml-auto mt-4 mr-2">
                                <button type="submit" class="d-block btn btn-primary px-5">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
