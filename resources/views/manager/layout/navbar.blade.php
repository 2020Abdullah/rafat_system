<header class="bmd-layout-header ">
    <div class="navbar navbar-light bg-faded animate__animated animate__fadeInDown">
        <button class="navbar-toggler animate__animated animate__wobble animate__delay-2s" type="button" data-bs-toggle="collapse" data-bs-target="#dw-s1">
        <span class="navbar-toggler-icon"></span>
        <!-- <i class="material-Animation">menu</i> -->
    </button>
        <ul class="nav navbar-nav ">
            {{-- <li class="nav-item">
                <div class="dropdown">
                    <button class="btn  dropdown-toggle  m-0" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-envelope fa-lg"></i><span class="badge badge-pill badge-danger animate__animated animate__flash animate__repeat-3 animate__slower animate__delay-2s">5</span>
                    </button>
                    <div aria-labelledby="dropdownMenu2" class="dropdown-menu dropdown-menu-right dropdown-menu dropdown-menu-right-lg">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="far fa-envelope c-main mr-2"></i> 4 new messages
                            <span class="float-right-rtl text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="far fa-user c-main mr-2"></i> 8 friend requests
                            <span class="float-right-rtl text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="far fa-file c-main mr-2"></i> 3 new reports
                            <span class="float-right-rtl text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <button class="btn  dropdown-toggle m-0" type="button" id="dropdownMenu3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-bell  fa-lg "></i><span class="badge badge-pill badge-warning animate__animated animate__flash animate__repeat-3 animate__slower animate__delay-2s">5</span>
                    </button>
                    <div aria-labelledby="dropdownMenu2" class="dropdown-menu dropdown-menu-right dropdown-menu dropdown-menu-right-lg">
                        <span class="dropdown-item dropdown-header">16 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="far fa-envelope c-main mr-2"></i> 4 new messages
                            <span class="float-right-rtl text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="far fa-user c-main mr-2"></i> 8 friend requests
                            <span class="float-right-rtl text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="far fa-file c-main mr-2"></i> 3 new reports
                            <span class="float-right-rtl text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </div>
            </li> --}}
            <li class="nav-item">
                <!-- ضع صورتك هنا-->
                <img src="{{asset('svg/logo.svg')}}" alt="svg/logo.svg" width="40" height="40">
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <button class="btn  dropdown-toggle m-0" type="button" id="dropdownMenu4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{auth('manager')->user()->name}}
                    </button>
                    <div aria-labelledby="dropdownMenu4" class="dropdown-menu dropdown-menu-right dropdown-menu dropdown-menu-right">
                        <button onclick="dark()" class="dropdown-item" type="button"><i class="fas fa-moon fa-sm c-main mr-2"></i>الوضع المظلم</button>
                        <a href="{{ route('manager.profile.index') }}" class="dropdown-item"><i class="fas fa-cog fa-sm c-main mr-2"></i>الإعدادات</a>

                        <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="dropdown-item">
                            <i class="fas fa-sign-out-alt c-main fa-sm mr-2"></i>
                             تسجيل الخروج
                            <form id="frm-logout" action="{{route('logout')}}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </a>

                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
