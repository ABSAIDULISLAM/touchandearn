@extends('backend.layouts.master')

@section('active')
    active
@endsection
@section('title')
    Sponsor-edit
@endsection

@section('toproute')
<div class="row mb-4" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
    <div class="col-md-12 d-flex justify-content-between">
        <h4 class="m-0">Sponsor Edit</h4>
        {{-- <a class="btn btn-primary"> Create</a> --}}
    </div>
</div>
@endsection

@section('homesection')
    <div class="row">

        <div class="col-md-12 ">
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

                    <form action="{{route('sponsor.studnet.update')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6 my-2">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" value="{{$user->name}}" readonly>
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="name">ID</label>
                                <input type="number" class="form-control" value="{{$user->student_id}}" readonly>
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="name">Country</label>
                                <input type="text my-2" class="form-control" value="{{$user->country}}" readonly>
                            </div>


                            <div class="col-md-6 my-2">
                                <label for="name">Gender</label>
                                <input type="text my-2" class="form-control" value="{{$user->gender}}" readonly>
                            </div>


                            <div class="col-md-6 my-5">
                                <label for="name">Call</label>
                                <input type="hidden" class="form-control" name="id" value="{{$user->id}}">
                                <input type="text" class="form-control" name="number" value="{{$user->number}}">
                            </div>
                            <div class="col-md-6 my-5">
                                <label for="name">What App</label>
                                <input type="text" class="form-control" name="whats_app" value="{{$user->whats_app}}">
                            </div>

                            <div class="col-md-12 text-right">
                                <button class="btn btn-primary px-5">Update</button>
                           </div>


                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>


@endsection
