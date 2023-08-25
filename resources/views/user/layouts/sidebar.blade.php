<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper"><a href="{{route('user.dashboard.index')}}"><img class="img-fluid for-light"
                                                                                   src="{{asset('assets/images/logo/logo.png')}}" alt=""></a>
            <div class="back-btn"><i data-feather="grid"></i></div>
            <div class="toggle-sidebar icon-box-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="{{route('user.dashboard.index')}}">
                <div class="icon-box-sidebar"><i data-feather="grid"></i></div>
            </a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">

                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{route('user.dashboard.index')}}"><i
                                data-feather="home"> </i><span>Anasayfa</span></a></li>

                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)"><i
                                data-feather="box"></i><span>Personel Yönetimi</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{route('user.employee.create')}}">Personel Ekle</a></li>
                            <li><a href="{{route('user.employee.index')}}">Personel Listesi</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)"><i data-feather="box"></i><span>Çalışma Bilgisi</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{route('user.workday.create')}}">Çalışma Günü Ekle</a></li>
                            <li><a href="{{route('user.workday.index')}}">Çalışma Günü Listesi</a></li>
                            <li><a href="{{route('user.workday.indexCalendar')}}">Çalışma Günü Takvim</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
