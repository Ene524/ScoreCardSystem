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
            <li class="{{ Route::is('employee.dashboard.index') ? 'active' : '' }}">
                <a href="{{ route('employee.dashboard.index') }}"><i class="fa fa-dashboard"></i> <span>Anasayfa</span></a>
            </li>

            <li class="{{ Route::is('employee.dashboard.index') ? 'active' : '' }}">
            </li>

        </ul>
    </section>

</aside>
