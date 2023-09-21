<aside class="main-sidebar">

    <section class="sidebar">
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ Route::is('user.dashboard.indx') ? 'active' : '' }}">
                <a href="{{ route('user.dashboard.index') }}"><i class="fa fa-dashboard"></i> <span>Anasayfa</span></a>
            </li>
            <li class="treeview {{ Request::segment(2) == 'employee' ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Personel Yönetimi</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('user.employee.create') }}"><i class="fa fa-circle-o"></i>Personel Ekle</a>
                    </li>
                    <li><a href="{{ route('user.employee.index') }}"><i class="fa fa-circle-o"></i>Personel Listesi</a>
                    </li>
                </ul>
            </li>
            <li class="treeview {{ Request::segment(2) == 'workday' ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-clock-o"></i> <span>Çalışma Yönetimi</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('user.workday.create') }}"><i class="fa fa-circle-o"></i>Çalışma Günü Ekle</a>
                    </li>
                    <li><a href="{{ route('user.workday.index') }}"><i class="fa fa-circle-o"></i>Çalışma Günü
                            Listesi</a>
                    </li>
                    <li><a href="{{ route('user.workday.indexCalendar') }}"><i class="fa fa-circle-o"></i>Takvim</a>
                    </li>
                </ul>
            </li>
            <li class="treeview {{ Request::segment(2) == 'permit' ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-paper-plane"></i> <span>İzin Yönetimi</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('user.permit.create') }}"><i class="fa fa-circle-o"></i>İzin Günü Ekle</a>
                    </li>
                    <li><a href="{{ route('user.permit.index') }}"><i class="fa fa-circle-o"></i>İzin Günü Listesi</a>
                    </li>
                    <li><a href="{{ route('user.permit.indexCalendar') }}"><i class="fa fa-circle-o"></i>Takvim</a>
                    </li>
                </ul>
            </li>
            @role('Admin')
            <li class="treeview {{ Request::segment(2) == 'batchTransactions' ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-cart-arrow-down"></i> <span>Toplu İşlemler</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('user.batchTransactions.addEmployee') }}"><i class="fa fa-circle-o"></i>Toplu
                            Personel Ekle</a>
                    </li>
                    <li>
                        <a href="{{ route('user.batchTransactions.addWorkday') }}"><i class="fa fa-circle-o"></i>Toplu
                            Çalışma Günü Ekle</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i>Toplu İzin Ekle</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ Request::segment(2) == 'workday1' ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-pie-chart"></i> <span>Raporlar</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('user.workday.report.get') }}"><i class="fa fa-circle-o"></i>Çalışma ve İzin
                            Raporu</a>
                    </li>
                </ul>
            </li>
            @endrole
        </ul>
    </section>

    @role('Admin')
    <section class="sidebar" style="position:absolute;bottom: 0;width: 100%;">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gear"></i> <span>Tanımlar</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cube"></i> <span>Kullanıcılar</span>
                            <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('user.user.create') }}"><i class="fa fa-circle-o"></i>Kullanıcı
                                    Ekle</a>
                            </li>
                            <li><a href="{{ route('user.user.index') }}"><i class="fa fa-circle-o"></i>Kullanıcı
                                    Listesi</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cube"></i> <span>Departmanlar</span>
                            <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('user.department.create') }}"><i
                                        class="fa fa-circle-o"></i>Departman
                                    Ekle</a>
                            </li>
                            <li><a href="{{ route('user.department.index') }}"><i
                                        class="fa fa-circle-o"></i>Departman
                                    Listesi</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cube"></i> <span>Mesai Tanımları</span>
                            <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('user.workdayType.create') }}"><i
                                        class="fa fa-circle-o"></i>Mesai Tanımı Ekle</a>
                            </li>
                            <li><a href="{{ route('user.workdayType.index') }}"><i
                                        class="fa fa-circle-o"></i>Mesai Tanımı Listesi</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cube"></i> <span>Pozisyonlar</span>
                            <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('user.position.create') }}"><i class="fa fa-circle-o"></i>Pozisyon
                                    Ekle</a>
                            </li>
                            <li><a href="{{ route('user.position.index') }}"><i class="fa fa-circle-o"></i>Pozisyon
                                    Listesi</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cube"></i> <span>İzin Türleri</span>
                            <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('user.permitType.create') }}"><i class="fa fa-circle-o"></i>İzin
                                    Türü Ekle</a>
                            </li>
                            <li><a href="{{ route('user.permitType.index') }}"><i class="fa fa-circle-o"></i>İzin
                                    Türleri Listesi</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cube"></i> <span>İzin Durumları</span>
                            <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('user.permitStatus.create') }}"><i class="fa fa-circle-o"></i>İzin
                                    Durumu
                                    Ekle</a>
                            </li>
                            <li><a href="{{ route('user.permitStatus.index') }}"><i class="fa fa-circle-o"></i>İzin
                                    Durum Listesi</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cube"></i> <span>Maaş Tanımlamaları</span>
                            <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('user.salary.create') }}"><i class="fa fa-circle-o"></i>Maaş Tanımı
                                    Ekle</a>
                            </li>
                            <li><a href="{{ route('user.salary.index') }}"><i class="fa fa-circle-o"></i>Maaş Tanım
                                    Listesi</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>


        </ul>
    </section>
    @endrole


</aside>
