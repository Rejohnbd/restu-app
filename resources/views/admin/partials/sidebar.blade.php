<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('img/'. Auth::user()->image) }}" class="img-circle" alt="{{ Auth::user()->last_name }}">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">DASHBOARD NAVIGATION</li>
            <li class="@if(Request::is('admin-dashboard')) active @endif">
                <a href="{{ route('admin-dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview @if(Request::is('users*')) active @endif">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Users </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="fa fa-circle-o"></i> Users List</a></li>
                    <li><a href=""><i class="fa fa-circle-o"></i> Add User</a></li>
                </ul>
            </li>
            <li class="treeview ">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Clients </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="fa fa-circle-o"></i> Cients List</a></li>
                    <li><a href=""><i class="fa fa-circle-o"></i> Add Client</a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>