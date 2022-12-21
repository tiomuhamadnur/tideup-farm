<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{ asset('storage/photo-profile/default.png') }}" alt=""
                    class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{{ auth()->user()->name }}</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i>
                    Online</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li @if (auth()->user()->role == 'guest' or auth()->user()->role == 'investor') hidden @endif>
                    <a href="{{ route('pencatatan.index') }}" class="waves-effect">
                        <i class="fas fa-pencil-alt"></i>
                        <span>Pencatatan</span>
                    </a>
                </li>

                <li @if (auth()->user()->role != 'pengelola') hidden @endif>
                    <a href="/kambing" class="waves-effect">
                        <i class="mdi mdi-cow"></i>
                        <span>Data Kambing</span>
                    </a>
                </li>

                <li @if (auth()->user()->role != 'investor') hidden @endif>
                    <a href="/investasi" class="waves-effect">
                        <i class="fas fa-money-check-alt"></i>
                        <span>Investasi</span>
                    </a>
                </li>

                <li @if (auth()->user()->role != 'admin') hidden @endif>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-database"></i>
                        <span>Master Data</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="/kambing" class="waves-effect">
                                <i class="mdi mdi-cow"></i>
                                <span>Kambing</span>
                            </a>
                        </li>

                        <li>
                            <a href="/admin-investasi" class="waves-effect">
                                <i class="fas fa-money-check-alt"></i>
                                <span>Investasi</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fas fa-users"></i>
                                <span>Roles</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li>
                                    <a href="/admin" class="waves-effect">
                                        <i class="fas fa-user-lock"></i>
                                        <span>Admin</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="/pengelola" class="waves-effect">
                                        <i class="fas fa-user-cog"></i>
                                        <span>Pengelola</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="/investor" class="waves-effect">
                                        <i class="fas fa-user-tie"></i>
                                        <span>Investor</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('guest.index') }}" class="waves-effect">
                                        <i class="fas fa-user-times"></i>
                                        <span>Guest</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
