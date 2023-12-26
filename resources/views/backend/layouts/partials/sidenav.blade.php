<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('frontend/assets/img/logo.png') }}" alt="" class="brand-image img-circle elevation-2"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ auth()->user()->name }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                @if (auth()->user()->role_as =='admin')

                <li class="nav-item menu-open">
                    <a href="{{ route('dashboard') }}" class="nav-link @yield('active')">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            Sub-admin Manage
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('subadmin.withtype.manage') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>manage Sub-admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('subadmin.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Sub-admin</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            Member Manage
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('activemember.admin') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Active Member</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('inactivemember.admin') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inactive Member</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Withdraw Manage
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Member
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="pages/examples/register.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Register v1</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Sub-admin (teacher)
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/examples/register.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Register v1</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="pages/examples/pace.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pace</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Login & Register v1
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/examples/login.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Login v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/examples/register.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Register v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/examples/forgot-password.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Forgot Password v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/examples/recover-password.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Recover Password v1</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="pages/examples/pace.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pace</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/blank.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blank Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="starter.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Starter Page</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- sSenior Accountant area  -->
                @elseif(auth()->user()->role_as == 'senior_accountant')
                <span style="color: #c8c9c9; font-size:12px;" class="pl-2 mb-2">Senior Accountant</span>
                <li class="nav-item menu-open">
                    <a href="" class="nav-link @yield('active')">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            Licence
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Licence Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Licence Check </p>
                            </a>
                        </li>
                    </ul>
                </li>


                <!-- Support Team Leader area  -->
                @elseif(auth()->user()->role_as == 'support_team_leader')
                <span style="color: #c8c9c9; font-size:12px;" class="pl-2 mb-2">Suuport Team Leader</span>
                <li class="nav-item menu-open">
                    <a href="" class="nav-link @yield('active')">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            Licence
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Licence Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Licence Check </p>
                            </a>
                        </li>
                    </ul>
                </li>


                <!-- sub Controller area  -->
                @elseif(auth()->user()->role_as == 'controller')
                <span style="color: #c8c9c9; font-size:12px;" class="pl-2 mb-2">Controller </span>
                <li class="nav-item menu-open">
                    <a href="" class="nav-link @yield('active')">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="{{route('controller.members')}}" class="nav-link ">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Inactive Members
                        </p>
                    </a>
                </li>


                <!-- sub Counselor area  -->
                @elseif(auth()->user()->role_as == 'counselor')
                <span style="color: #c8c9c9; font-size:12px;" class="pl-2 mb-2">Counselor </span>
                <li class="nav-item menu-open">
                    <a href="" class="nav-link @yield('')">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="{{route('counselor.leads')}}" class="nav-link ">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            My Leads
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="{{route('counselor.message-done')}}" class="nav-link ">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Message Done
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="{{route('counselor.working-zone')}}" class="nav-link ">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Working zone
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="{{route('counselor.wrong_wp_list')}}" class="nav-link ">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Wrong WP
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="" class="nav-link ">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Time Zone
                        </p>
                    </a>
                </li>


                <!-- sub admin area  -->
                @elseif(auth()->user()->role_as == 'sub_admin')
                <span style="color: #c8c9c9; font-size:12px;" class="pl-2 mb-2">Sub admin</span>
                <li class="nav-item menu-open">
                    <a href="" class="nav-link @yield('active')">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            Licence
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Licence Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Licence Check </p>
                            </a>
                        </li>
                    </ul>
                </li>


                <!-- Member area  -->
                @elseif(auth()->user()->role_as == 'member')
                <span style="color: #c8c9c9; font-size:12px;" class="pl-2 mb-2">Member</span>
                <li class="nav-item menu-open">

                    <a href="{{route('dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            My Wallet
                        </p>
                    </a>
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Withdraw
                        </p>
                    </a>
                    <a href="{{route('student.sponsor-list')}}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Sponsor List
                        </p>
                    </a>
                    <a href="{{route('profile')}}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>


                @endif

            </ul>
        </nav>
    </div>
</aside>
