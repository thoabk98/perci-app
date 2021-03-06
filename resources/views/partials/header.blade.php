<header class="main-header">

    <!-- Logo -->
    <a href="/" class="logo">
        <span class="logo-mini"><b>A</b></span>
        <!-- logo for regular state and mobile devices -->
        <image src="{{ asset('images/logo.png') }}"></image>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('images/user-icon.png') }}" class="user-image" alt="User Image">
                        {{--<span class="hidden-xs">{{ Auth::user()->user()->name }}</span>--}}
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset('images/user-icon.png') }}" class="img-circle" alt="User Image">

                            <p>
                                {{--{{ Auth::user()->user()->name }}--}}
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="/admin/account/profile" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </nav>
</header>