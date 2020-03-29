<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item">
                <a href=""><i class="mbri-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a>
                <ul class="menu-content">
                     <li>
                        <a class="menu-item" href="{{route('member.home')}}">
                            <i class="la la-circle"></i><span>Schedule List</span>
                        </a>
                    </li>
                </ul>
            </li>
            @if(Session::get('role') == 1)
            <li class=" nav-item">
                <a href="#"><i class="mbri-add-submenu"></i><span class="menu-title" data-i18n="nav.dash.main">Schedule<br>Management</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('schedule.index')}}">
                            <i class="ft-users"></i><span>Setting Schedule</span>
                        </a>
                        <a class="menu-item" href="{{route('user.index')}}">
                            <i class="ft-users"></i><span>Setting User</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
