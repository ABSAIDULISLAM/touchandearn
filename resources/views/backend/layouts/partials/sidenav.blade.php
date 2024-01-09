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
                            <a href="{{ route('controller-seniorAccountant') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p style="font-size: 13px">Controller/Accountant/Support</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('team-leader') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Team Leaders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('counselor') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Counselor</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('subadmin.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Sub-admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('subadmin.send-activation-points')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Send Activation Points</p>
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
                            <a href="{{route('admin.withraw-request-member')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Member</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.subadmin.withraw-request')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub admin</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            Activation Point
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.manage-activation-points-to-subadmin')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p style="font-size: 15px">Manage Activation Points</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            Admin Income
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.withwal.income')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p style="font-size: 15px">Income From Withdawal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.all.accounts')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p style="font-size: 15px">All Accounts</p>
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
                            <a href="{{route('dashboard')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    check
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/examples/login.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>check </p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- sSenior Accountant area  -->
                @elseif(auth()->user()->role_as == 'senior_accountant')
                <span style="color: #c8c9c9; font-size:12px;" class="pl-2 mb-2">Senior Accountant</span>
                <li class="nav-item ">
                    <a href="{{route('dashboard')}}" class="nav-link @yield('active')">
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
                            Activation Point send
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('subadmin.manage-activation-points')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Send Activation Points</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="{{route('sa.tl-maping')}}" class="nav-link ">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            TL Maping
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('withdraw.history')}}" class="nav-link ">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Withdraw
                        </p>
                    </a>
                </li>




                <!-- Support Team Leader area  -->
                @elseif(auth()->user()->role_as == 'support_team_leader')
                <span style="color: #c8c9c9; font-size:12px;" class="pl-2 mb-2">Suuport Team Leader</span>
                <li class="nav-item ">
                    <a href="{{route('dashboard')}}" class="nav-link @yield('active')">
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
                <li class="nav-item ">
                    <a href="{{route('withdraw.history')}}" class="nav-link ">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Withdraw
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            Activation Point send
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('subadmin.manage-activation-points')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Send Activation Points</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <!-- sub Controller area  -->
                @elseif(auth()->user()->role_as == 'controller')
                <span style="color: #c8c9c9; font-size:12px;" class="pl-2 mb-2">Controller </span>
                <li class="nav-item ">
                    <a href="{{route('dashboard')}}" class="nav-link @yield('active')">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{route('controller.members')}}" class="nav-link ">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Inactive Members
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('withdraw.history')}}" class="nav-link ">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Withdraw
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            Activation Point send
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('subadmin.manage-activation-points')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Send Activation Points</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- sub teamleader area  -->
                @elseif(auth()->user()->role_as == 'teamleader')
                <span style="color: #c8c9c9; font-size:12px;" class="pl-2 mb-2">team leader </span>
                <li class="nav-item ">
                    <a href="{{route('dashboard')}}" class="nav-link @yield('active')">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{route('teamleader.members')}}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Members
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('withdraw.history')}}" class="nav-link ">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Withdraw
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            Activation Point send
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('subadmin.manage-activation-points')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Send Activation Points</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!--  Counselor area  -->
                @elseif(auth()->user()->role_as == 'counselor')
                <span style="color: #c8c9c9; font-size:12px;" class="pl-2 mb-2">Counselor </span>
                <li class="nav-item ">
                    <a href="{{route('dashboard')}}" class="nav-link @yield('')">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('profile')}}" class="nav-link @yield('')">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('counselor.leads')}}" class="nav-link ">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            My Leads
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('counselor.message-done')}}" class="nav-link ">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Message Done
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('counselor.working-zone')}}" class="nav-link ">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            Working zone
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('counselor.wrong_wp_list')}}" class="nav-link ">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Wrong WP
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="" class="nav-link ">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            Time Zone
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('withdraw.history')}}" class="nav-link ">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Withdraw
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('counselor.all-student.search')}}" class="nav-link ">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            All Student
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            Activation Point send
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('subadmin.manage-activation-points')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Send Activation Points</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <!-- Member area  -->
                @elseif(auth()->user()->role_as == 'member')
                <span style="color: #c8c9c9; font-size:12px;" class="pl-2 mb-2">Member</span>
                <li class="nav-item ">


                    <a href="{{route('dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                    <li class="nav-item ">
                        <a href="{{route('profile')}}" class="nav-link ">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Profile
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('withdraw.history')}}" class="nav-link ">
                            <i class="nav-icon fas fa-globe"></i>
                            <p>
                                Withdraw
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('student.sponsor-list')}}" class="nav-link ">
                            <i class="nav-icon fas fa-id-card"></i>
                            <p>
                                Sponsor List
                            </p>
                        </a>
                    </li>

                </li>

                @endif

            </ul>
        </nav>
    </div>
</aside>
