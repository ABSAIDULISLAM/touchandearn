@extends('backend.layouts.master')

@section('active')
    active
@endsection

@section('title')
    Dashboard
@endsection

@section('toproute')
    <div class="row mb-2" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 5px">
        <div class="col-sm-6">
            <h1 class="m-0">Profile</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
        </div>
    </div>
@endsection

@section('homesection')
    <div class="row">
        @if(auth()->user()->role_as == 'admin')
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('frontend/assets/img/logo.png') }}"
                            alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ $userdata->name }}</h3>

                    <ul class="list-group list-group-unbordered mb-3">

                        <li class="list-group-item">
                            <b>Points</b> <a class="float-right">13,287</a>
                        </li>
                        <li class="list-group-item">
                            <b class="text-success">Ballance</b> <a class="float-right">{{$userdata->ballance}}</a>
                        </li>
                    </ul>

                    <div class="d-flex">
                        <a href="#" class="btn btn-primary btn-sm mr-2"><b>Share Points</b></a>
                        <a href="#" class="btn btn-success btn-sm"><b> Withdrow</b></a>
                    </div>

                    <ul class="list-group list-group-unbordered mb-3">
                        <hr>
                        <li class="list-group-item">
                            <a class="">xsak4353xcoirtyo</a>
                        </li>
                    </ul>

                    <div class="d-flex">
                        <a href="#" class="btn btn-primary btn-sm btn-block"><b>Copy Refer Link</b></a>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card card-primary card-outline">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#overView" data-toggle="tab">OverView</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Update</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="overView">

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $userdata->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>number</th>
                                        <td>{{ $userdata->number }}</td>
                                    </tr>
                                    <tr>
                                        <th>role_as</th>
                                        <td>{{ $userdata->role_as }}</td>
                                    </tr>
                                    <tr>
                                        <th>status</th>
                                        <td>{{ $userdata->status }}</td>
                                    </tr>
                                    <tr>
                                        <th>last_seen</th>
                                        <td>{{ $userdata->last_seen }}</td>
                                    </tr>

                                    <tr>
                                        <th>created_at</th>
                                        <td>{{ $userdata->created_at }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" value="{{$userdata->name}}" class="form-control" id="inputName" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" value="{{$userdata->email}}" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="old_password" class="form-control" id="inputEmail" placeholder="old Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" id="inputEmail" placeholder="New Password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="password" class="form-control" id="inputEmail" placeholder=" Password">
                                        <img src="{{ asset($userdata->image) }}" class="my-2" alt="" height="80px" width="80px">
                                    </div>

                                </div>

                                <div class="form-group row my-3 ml-auto" >
                                    <div class="offset-sm-2 col-sm-10 ">
                                        <button type="submit" class="btn btn-success ">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

        {{-- for senior Accountant  --}}
        @elseif(auth()->user()->role_as == 'senior_accountant')
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('frontend/assets/img/logo.png') }}"
                            alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ $userdata->name }}</h3>

                    <ul class="list-group list-group-unbordered mb-3">

                        <li class="list-group-item">
                            <b>Points</b> <a class="float-right">13,287</a>
                        </li>
                        <li class="list-group-item">
                            <b class="text-success">Ballance</b> <a class="float-right">{{ $userdata->ballance }}</a>
                        </li>
                    </ul>

                    <div class="d-flex">
                        <a href="#" class="btn btn-primary btn-sm mr-2"><b>Share Points</b></a>
                        <a href="#" class="btn btn-success btn-sm"><b> Withdrow</b></a>
                    </div>

                    <ul class="list-group list-group-unbordered mb-3">
                        <hr>
                        <li class="list-group-item">
                            <a class="">xsak4353xcoirtyo</a>
                        </li>
                    </ul>

                    <div class="d-flex">
                        <a href="#" class="btn btn-primary btn-sm btn-block"><b>Copy Refer Link</b></a>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card card-primary card-outline">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#overView" data-toggle="tab">OverView</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Update</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="overView">

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $userdata->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>number</th>
                                        <td>{{ $userdata->number }}</td>
                                    </tr>
                                    <tr>
                                        <th>role_as</th>
                                        <td>{{ $userdata->role_as }}</td>
                                    </tr>
                                    <tr>
                                        <th>status</th>
                                        <td>{{ $userdata->status }}</td>
                                    </tr>
                                    <tr>
                                        <th>last_seen</th>
                                        <td>{{ $userdata->last_seen }}</td>
                                    </tr>

                                    <tr>
                                        <th>created_at</th>
                                        <td>{{ $userdata->created_at }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" value="{{$userdata->name}}" class="form-control" id="inputName" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" value="{{$userdata->email}}" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="old_password" class="form-control" id="inputEmail" placeholder="old Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" id="inputEmail" placeholder="New Password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="password" class="form-control" id="inputEmail" placeholder=" Password">
                                        <img src="{{ asset($userdata->image) }}" class="my-2" alt="" height="80px" width="80px">
                                    </div>

                                </div>

                                <div class="form-group row my-3 ml-auto" >
                                    <div class="offset-sm-2 col-sm-10 ">
                                        <button type="submit" class="btn btn-success ">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>


        {{-- for support_team_leader  --}}
        @elseif(auth()->user()->role_as == 'support_team_leader')
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset($userdata->image ) }}"
                            alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ $userdata->name }}</h3>

                    <ul class="list-group list-group-unbordered mb-3">

                        <li class="list-group-item">
                            <b>Points</b> <a class="float-right">13,287</a>
                        </li>
                        <li class="list-group-item">
                            <b class="text-success">Ballance</b> <a class="float-right">{{ $userdata->ballance }}</a>
                        </li>
                    </ul>

                    <div class="d-flex">
                        <a href="#" class="btn btn-primary btn-sm mr-2"><b>Share Points</b></a>
                        <a href="#" class="btn btn-success btn-sm"><b> Withdrow</b></a>
                    </div>

                    <ul class="list-group list-group-unbordered mb-3">
                        <hr>
                        <li class="list-group-item">
                            <a class="">xsak4353xcoirtyo</a>
                        </li>
                    </ul>

                    <div class="d-flex">
                        <a href="#" class="btn btn-primary btn-sm btn-block"><b>Copy Refer Link</b></a>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card card-primary card-outline">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#overView" data-toggle="tab">OverView</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Update</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="overView">

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $userdata->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>number</th>
                                        <td>{{ $userdata->number }}</td>
                                    </tr>
                                    <tr>
                                        <th>role_as</th>
                                        <td>{{ $userdata->role_as }}</td>
                                    </tr>
                                    <tr>
                                        <th>status</th>
                                        <td>{{ $userdata->status }}</td>
                                    </tr>
                                    <tr>
                                        <th>last_seen</th>
                                        <td>{{ $userdata->last_seen }}</td>
                                    </tr>

                                    <tr>
                                        <th>created_at</th>
                                        <td>{{ $userdata->created_at }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" value="{{$userdata->name}}" class="form-control" id="inputName" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" value="{{$userdata->email}}" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="old_password" class="form-control" id="inputEmail" placeholder="old Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" id="inputEmail" placeholder="New Password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="password" class="form-control" id="inputEmail" placeholder=" Password">
                                        <img src="{{ asset($userdata->image) }}" class="my-2" alt="" height="80px" width="80px">
                                    </div>

                                </div>

                                <div class="form-group row my-3 ml-auto" >
                                    <div class="offset-sm-2 col-sm-10 ">
                                        <button type="submit" class="btn btn-success ">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>


        {{-- for Controller  --}}
        @elseif(auth()->user()->role_as == 'controller')
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset($userdata->image) }}"
                            alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ $userdata->name }}</h3>

                    <ul class="list-group list-group-unbordered mb-3">

                        <li class="list-group-item">
                            <b>Points</b> <a class="float-right">13,287</a>
                        </li>
                        <li class="list-group-item">
                            <b class="text-success">Ballance</b> <a class="float-right">{{ $userdata->ballance }}</a>
                        </li>
                    </ul>

                    <div class="d-flex">
                        <a href="#" class="btn btn-primary btn-sm mr-2"><b>Share Points</b></a>
                        <a href="#" class="btn btn-success btn-sm"><b> Withdrow</b></a>
                    </div>

                    <ul class="list-group list-group-unbordered mb-3">
                        <hr>
                        <li class="list-group-item">
                            <a class="">xsak4353xcoirtyo</a>
                        </li>
                    </ul>

                    <div class="d-flex">
                        <a href="#" class="btn btn-primary btn-sm btn-block"><b>Copy Refer Link</b></a>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card card-primary card-outline">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#overView" data-toggle="tab">OverView</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Update</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="overView">

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $userdata->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>number</th>
                                        <td>{{ $userdata->number }}</td>
                                    </tr>
                                    <tr>
                                        <th>role_as</th>
                                        <td>{{ $userdata->role_as }}</td>
                                    </tr>
                                    <tr>
                                        <th>status</th>
                                        <td>{{ $userdata->status }}</td>
                                    </tr>
                                    <tr>
                                        <th>last_seen</th>
                                        <td>{{ $userdata->last_seen }}</td>
                                    </tr>

                                    <tr>
                                        <th>created_at</th>
                                        <td>{{ $userdata->created_at }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" value="{{$userdata->name}}" class="form-control" id="inputName" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" value="{{$userdata->email}}" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="old_password" class="form-control" id="inputEmail" placeholder="old Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" id="inputEmail" placeholder="New Password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="password" class="form-control" id="inputEmail" placeholder=" Password">
                                        <img src="{{ asset($userdata->image) }}" class="my-2" alt="" height="80px" width="80px">
                                    </div>

                                </div>

                                <div class="form-group row my-3 ml-auto" >
                                    <div class="offset-sm-2 col-sm-10 ">
                                        <button type="submit" class="btn btn-success ">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

        {{-- for Sub-admin  --}}
        @elseif(auth()->user()->role_as == 'sub_admin')
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset( $userdata->image) }}"
                            alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ $userdata->name }}</h3>

                    <p class="text-muted text-center">{{ $userdata->subadmin->subadmintype->subadmin_type }}</p>

                    <ul class="list-group list-group-unbordered mb-3">

                        <li class="list-group-item">
                            <b>Points</b> <a class="float-right">13,287</a>
                        </li>
                        <li class="list-group-item">
                            <b class="text-success">Ballance</b> <a class="float-right">{{ $userdata->ballance }}</a>
                        </li>
                    </ul>

                    <div class="d-flex">
                        <a href="#" class="btn btn-primary btn-sm mr-2"><b>Share Points</b></a>
                        <a href="#" class="btn btn-success btn-sm"><b> Withdrow</b></a>
                    </div>

                    <ul class="list-group list-group-unbordered mb-3">
                        <hr>
                        <li class="list-group-item">
                            <a class="">xsak4353xcoirtyo</a>
                        </li>
                    </ul>

                    <div class="d-flex">
                        <a href="#" class="btn btn-primary btn-sm btn-block"><b>Copy Refer Link</b></a>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card card-primary card-outline">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#overView" data-toggle="tab">OverView</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Update</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="overView">

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $userdata->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>number</th>
                                        <td>{{ $userdata->number }}</td>
                                    </tr>
                                    <tr>
                                        <th>member_id</th>
                                        <td>{{ $userdata->subadmin->whats_app }}</td>
                                    </tr>
                                    <tr>
                                        <th>Account Type</th>
                                        <td>{{ $userdata->role_as }}</td>
                                    </tr>
                                    <tr>
                                        <th>status</th>
                                        <td>{{ $userdata->status }}</td>
                                    </tr>
                                    <tr>
                                        <th>last_seen</th>
                                        <td>{{ $userdata->last_seen }}</td>
                                    </tr>

                                    @if ($userdata->subadmin->member_id == null)
                                    <tr>
                                        <th>Member Type</th>
                                        <td>n/a</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <th>Member Type</th>
                                        <td>{{ $userdata->subadmin->member_id }}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <th>gender</th>
                                        <td>{{ $userdata->subadmin->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th>country_id</th>
                                        <td>{{ $userdata->subadmin->country_id }}</td>
                                    </tr>
                                    <tr>
                                        <th>language</th>
                                        <td>{{ $userdata->subadmin->language }}</td>
                                    </tr>
                                    <tr>
                                        <th>created_at</th>
                                        <td>{{ $userdata->created_at->isoFormat('Do MMM YYYY') }}</td>
                                        {{-- <td>{{ $userdata->created_at }}</td> --}}
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" value="{{$userdata->name}}" class="form-control" id="inputName" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" value="{{$userdata->email}}" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="old_password" class="form-control" id="inputEmail" placeholder="old Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" id="inputEmail" placeholder="New Password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="password" class="form-control" id="inputEmail" placeholder=" Password">
                                        <img src="{{ asset($userdata->image) }}" class="my-2" alt="" height="80px" width="80px">
                                    </div>

                                </div>

                                <div class="form-group row my-3 ml-auto" >
                                    <div class="offset-sm-2 col-sm-10 ">
                                        <button type="submit" class="btn btn-success ">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

        @elseif(auth()->user()->role_as == 'member')
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset($userdata->image) }}"
                            alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ $userdata->name }}</h3>

                    <p class="text-muted text-center">{{ $userdata->subadmin->subadmintype->subadmin_type }}</p>

                    <ul class="list-group list-group-unbordered mb-3">

                        <li class="list-group-item">
                            <b>Points</b> <a class="float-right">13,287</a>
                        </li>
                        <li class="list-group-item">
                            <b class="text-success">Ballance</b> <a class="float-right">{{ $userdata->ballance}}</a>
                        </li>
                    </ul>

                    <div class="d-flex">
                        <a href="#" class="btn btn-primary btn-sm mr-2"><b>Share Points</b></a>
                        <a href="#" class="btn btn-success btn-sm"><b> Withdrow</b></a>
                    </div>

                    <ul class="list-group list-group-unbordered mb-3">
                        <hr>
                        <li class="list-group-item">
                            <a class="">xsak4353xcoirtyo</a>
                        </li>
                    </ul>

                    <div class="d-flex">
                        <a href="#" class="btn btn-primary btn-sm btn-block"><b>Copy Refer Link</b></a>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card card-primary card-outline">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#overView" data-toggle="tab">OverView</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Update</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="overView">

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $userdata->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>number</th>
                                        <td>{{ $userdata->number }}</td>
                                    </tr>
                                    <tr>
                                        <th>member_id</th>
                                        <td>{{ $userdata->subadmin->whats_app }}</td>
                                    </tr>
                                    <tr>
                                        <th>role_as</th>
                                        <td>{{ $userdata->role_as }}</td>
                                    </tr>
                                    <tr>
                                        <th>status</th>
                                        <td>{{ $userdata->status }}</td>
                                    </tr>
                                    <tr>
                                        <th>last_seen</th>
                                        <td>{{ $userdata->last_seen }}</td>
                                    </tr>

                                    @if ($userdata->subadmin->member_id == null)
                                    <tr>
                                        <th>Member Type</th>
                                        <td>n/a</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <th>Member Type</th>
                                        <td>{{ $userdata->subadmin->member_id }}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <th>gender</th>
                                        <td>{{ $userdata->subadmin->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th>country_id</th>
                                        <td>{{ $userdata->subadmin->country_id }}</td>
                                    </tr>
                                    <tr>
                                        <th>language</th>
                                        <td>{{ $userdata->subadmin->language }}</td>
                                    </tr>
                                    <tr>
                                        <th>created_at</th>
                                        <td>{{ $userdata->created_at->isoFormat('Do MMM YYYY') }}</td>
                                        {{-- <td>{{ $userdata->created_at }}</td> --}}
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" value="{{$userdata->name}}" class="form-control" id="inputName" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" value="{{$userdata->email}}" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="old_password" class="form-control" id="inputEmail" placeholder="old Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" id="inputEmail" placeholder="New Password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="password" class="form-control" id="inputEmail" placeholder=" Password">
                                        <img src="{{ asset($userdata->image) }}" class="my-2" alt="" height="80px" width="80px">
                                    </div>

                                </div>

                                <div class="form-group row my-3 ml-auto" >
                                    <div class="offset-sm-2 col-sm-10 ">
                                        <button type="submit" class="btn btn-success ">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        @endif

    </div>

@endsection
