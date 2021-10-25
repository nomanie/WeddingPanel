<aside class="admin-sidebar">
    <div class="admin-sidebar-brand">
        <!-- begin sidebar branding-->
        <span class="admin-brand-content font-secondary"><a href='{{route('admin.index')}}'>  WeddingPanel</a></span>
        <!-- end sidebar branding-->
        <div class="ml-auto">
            <!-- sidebar pin-->
            <a href="#" class="admin-pin-sidebar btn-ghost btn btn-rounded-circle">
                <svg style="width:18px;height:18px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M16,12V4H17V2H7V4H8V12L6,14V16H11.2V22H12.8V16H18V14L16,12Z" />
                </svg>
            </a>
            <!-- sidebar close for mobile device-->
            <a href="#" class="admin-close-sidebar">
                <svg style="width:36px;height:36px" viewBox="0 0 32 28">
                    <path fill="currentColor"
                          d="M13.46,12L19,17.54V19H17.54L12,13.46L6.46,19H5V17.54L10.54,12L5,6.46V5H6.46L12,10.54L17.54,5H19V6.46L13.46,12Z"/>
                </svg>
            </a>
        </div>
    </div>
    <div class="admin-sidebar-wrapper js-scrollbar">
        <ul class="menu">
            <li class="menu-item">
                <a redirect="true" href="{{route('admin.index')}}" class="open-dropdown menu-link">
                        <span class="menu-label">
                                                <span class="menu-name">Pulpit</span>

                                            </span>
                    <span class="menu-icon">
                                                 <i class="icon-placeholder mdi mdi-home-outline "></i>
                                            </span>
                </a>
            </li>
            @if(Auth::user()->group()->first()->id == 3)

            <li class="menu-item ">
                <a href="#" class="open-dropdown menu-link">
                        <span class="menu-label">
                                                <span class="menu-name">Użytkownicy
                                                      <span class="menu-arrow">

 <svg style="width:16px;height:16px" viewBox="0 0 24 24">
    <path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path>
</svg>


                                                    </span>
                                                </span>
                                            </span>
                    <span class="menu-icon">
                                                 <i class="icon-placeholder  mdi mdi-account-multiple"></i>
                                            </span>
                </a>
                <!--submenu-->
                <ul class="sub-menu">

                    <li class="menu-item">
                        <a redirect="true" href='{{route('admin.users.index')}}' class=' menu-link'>
                                        <span class="menu-label">
                                                <span class="menu-name">Lista użytkowników

                                                </span>
                                            </span>
                            <span class="menu-icon">
                                                    <i class="icon-placeholder mdi mdi-account-search "></i>
                                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a redirect="true" href='{{route('admin.groups.index')}}' class=' menu-link'>
                                        <span class="menu-label">
                                                <span class="menu-name">Grupy

                                                </span>
                                            </span>
                            <span class="menu-icon">
                                                    <i class="icon-placeholder mdi mdi-account-group "></i>
                                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a redirect="true" href='{{route('admin.permissions.index')}}' class=' menu-link'>
                                        <span class="menu-label">
                                                  <span class="menu-name">Permisje

                                                </span>
                                            </span>
                            <span class="menu-icon">

                                                    <i class="icon-placeholder mdi mdi-gavel"></i>
                                            </span>
                        </a>
                    </li>


                </ul>
                </li>
            @endif
            <li class="menu-item ">
                <a href="#" class="open-dropdown menu-link">
                        <span class="menu-label">
                                                <span class="menu-name">Wesela
                                                      <span class="menu-arrow">

 <svg style="width:16px;height:16px" viewBox="0 0 24 24">
    <path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path>
</svg>


                                                    </span>
                                                </span>
                                            </span>
                    <span class="menu-icon">
                                                 <i class="icon-placeholder  mdi mdi-cards-heart"></i>
                                            </span>
                </a>
                <!--submenu-->
                <ul class="sub-menu">
                    @if(Auth::user()->group()->first()->id == 3)
                        <li class="menu-item">
                            <a redirect="true" href='{{route('admin.weddingsAssigned.index')}}' class=' menu-link'>
                                        <span class="menu-label">
                                                <span class="menu-name">Lista przypisanych wesel

                                                </span>
                                            </span>
                                <span class="menu-icon">
                                                    <i class="icon-placeholder mdi mdi-tag-heart "></i>
                                            </span>
                            </a>
                        </li>@endif
                    <li class="menu-item">
                        <a redirect="true" href='{{route('admin.weddings.index')}}' class=' menu-link'>
                                        <span class="menu-label">
                                                <span class="menu-name">Lista wesel

                                                </span>
                                            </span>
                            <span class="menu-icon">
                                                    <i class="icon-placeholder mdi mdi-heart-multiple "></i>
                                            </span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a redirect="true" href='{{route('admin.weddingsArchive.index')}}' class=' menu-link'>
                                        <span class="menu-label">
                                                  <span class="menu-name">Archiwum

                                                </span>
                                            </span>
                            <span class="menu-icon">

                                                    <i class="icon-placeholder mdi mdi-folder-heart"></i>
                                            </span>
                        </a>
                    </li>


                </ul>
            </li>
            @if(Auth::user()->group()->first()->id == 3)

                <li class="menu-item ">
                    <a href="#" class="open-dropdown menu-link">
                        <span class="menu-label">
                                                <span class="menu-name">Ustawienia
                                                      <span class="menu-arrow">

 <svg style="width:16px;height:16px" viewBox="0 0 24 24">
    <path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path>
</svg>


                                                    </span>
                                                </span>
                                            </span>
                        <span class="menu-icon">
                                                 <i class="icon-placeholder  mdi mdi-cogs"></i>
                                            </span>
                    </a>
                    <!--submenu-->
                    <ul class="sub-menu">

                        <li class="menu-item">
                            <a redirect="true" href='#' class=' menu-link'>
                                        <span class="menu-label">
                                                <span class="menu-na me">Ustawienia serwisu

                                                </span>
                                            </span>
                                <span class="menu-icon">
                                                    <i class="icon-placeholder mdi mdi-cog "></i>
                                            </span>
                            </a>
                        </li>

                    </ul>
                </li>
            @endif
        </ul>

    </div>

</aside>
