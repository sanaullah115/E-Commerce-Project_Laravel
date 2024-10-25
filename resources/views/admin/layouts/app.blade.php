@include('admin.layouts.head')

            @include('admin.layouts.sidebar')

            <!-- top navigation -->
            @include('admin.layouts.navbar')
            <!-- /top navigation -->

            <!-- page content -->
            @yield('content')
            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>
    @include('admin.layouts.footerlink')
    