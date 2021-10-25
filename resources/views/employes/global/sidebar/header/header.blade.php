<header class="admin-header">

    <a href="#" class="sidebar-toggle" data-toggleclass="sidebar-open" data-target="body">
        <svg style='width:24px;height:24px' viewBox='0 0 24 24'>
            <path fill="currentColor" d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z"/>
        </svg>
    </a>

    <nav class=" mr-auto my-auto">
        <ul class="nav align-items-center">


        </ul>
    </nav>
    <nav class=" ml-auto">
        <ul class="nav align-items-center">
            <li class="nav-item">
                <div class="dropdown">
                    <a href="#" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-24px mdi-bell-outline"></i>
                        <span class="notification-counter"></span>
                    </a>

                    <div class="dropdown-menu notification-container dropdown-menu-right">
                        <div class="d-flex p-all-15 bg-white justify-content-between border-bottom ">
                            <a href="#!" class="mdi mdi-18px mdi-settings text-muted"></a>
                            <span class="h5 m-0">Powiadomienia</span>
                            <a href="#!" class="mdi mdi-18px mdi-notification-clear-all text-muted"></a>
                        </div>
                        <div class="notification-events bg-gray-300">
                            <div class="text-overline m-b-5">Dziś</div>
                            <a href="#" class="d-block m-b-10">
                                <div class="card">
                                    <div class="card-body"><i class="mdi mdi-circle text-success"></i> All systems
                                        operational.
                                    </div>
                                </div>
                            </a>


                        </div>

                    </div>
                </div>
            </li>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-sm avatar-online">
                        <span class="avatar-title rounded-circle bg-dark">V</span>

                    </div>
                </a>
                <div class="dropdown-menu  dropdown-menu-right">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('logout')}}"> Wyloguj</a>
                </div>
            </li>

        </ul>

    </nav>
</header>
