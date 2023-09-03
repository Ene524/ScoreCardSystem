<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{route('user.dashboard.index')}}"><i class="fa fa-dashboard"></i> <span>Anasayfa</span></a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Personel Yönetimi</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('user.employee.create')}}"><i class="fa fa-circle-o"></i>Personel Ekle</a></li>
                    <li><a href="{{route('user.employee.index')}}"><i class="fa fa-circle-o"></i>Personel Listesi</a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Çalışma Yönetimi</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('user.workday.create')}}"><i class="fa fa-circle-o"></i>Çalışma Günü Ekle</a>
                    </li>
                    <li><a href="{{route('user.workday.index')}}"><i class="fa fa-circle-o"></i>Çalışma Günü Listesi</a>
                    </li>
                    <li><a href="{{route('user.workday.indexCalendar')}}"><i class="fa fa-circle-o"></i>Takvim</a></li>
                    <li><a href="{{route('user.workday.report.get')}}"><i class="fa fa-circle-o"></i>Çalışma Günü Rapor</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>İzin Yönetimi</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('user.permit.create')}}"><i class="fa fa-circle-o"></i>İzin Günü Ekle</a>
                    </li>
                    <li><a href="{{route('user.permit.index')}}"><i class="fa fa-circle-o"></i>İzin Günü Listesi</a>
                    </li>
                    <li><a href="{{route('user.permit.indexCalendar')}}"><i class="fa fa-circle-o"></i>Takvim</a></li>
                </ul>
            </li>





        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
