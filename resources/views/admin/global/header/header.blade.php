<header class="admin-header">

    <a href="#" class="sidebar-toggle" data-toggleclass="sidebar-open" data-target="body">
        <svg style='width:24px;height:24px' viewBox='0 0 24 24'>
            <path fill="currentColor" d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z"/>
        </svg>
    </a>

    <nav class=" ml-auto">
        <ul class="nav align-items-center">
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-sm avatar-online">
                        <span class="avatar-title rounded-circle bg-dark">V</span>

                    </div>
                </a>
                <div class="dropdown-menu  dropdown-menu-right">
                    <a class="dropdown-item" href="{{route('logout')}}"> Wyloguj</a>
                </div>
            </li>

        </ul>

    </nav>
</header>
