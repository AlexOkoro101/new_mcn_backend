<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Mighty Interactive</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{url('/admin')}}">Mighty Interactive Backend</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>
                {{auth()->user()->name}}
                <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="{{route('admin_logout')}}" onclick="event.preventDefault(); document.getElementById('admin-logout').submit();"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                <form id="admin-logout" action="{{ route('admin_logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="{{url('/admin')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="{{url('/admin/users')}}"><i class="fa fa-bar-chart-o fa-fw"></i> Users<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('/admin/users')}}">User List</a>
                        </li>
                        <li>
                            <a href="{{url('/admin/users/new')}}">New Registrations</a>
                        </li>
                        <li>
                            <a href="{{url('/admin/users/logged')}}">User Logins</a>
                        </li>
                        <li>
                            <a href="{{url('/admin/users/page')}}">Page Views</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="{{url('/admin/data')}}"><i class="fa fa-table fa-fw"></i> Data</a>
                </li>
                <li>
                    <a href="{{url('/admin/blog')}}"><i class="fa fa-edit fa-fw"></i> Blog</a>
                </li>
                <li>
                    <a href="{{url('/admin/testimonies')}}"><i class="fa fa-bullhorn fa-fw"></i> Testimonies</a>
                </li>
                <li>
                    <a href="{{url('/admin/support')}}"><i class="fa fa-question fa-fw"></i> Support</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>



