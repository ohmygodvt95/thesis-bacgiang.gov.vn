<!-- Main Header -->
<header class="main-header">
    <!-- Logo -->
    <a href="/admin" class="logo"><b>Bắc Giang</b> Admin</a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{{ asset("components/AdminLTE/dist/img/user2-160x160.jpg") }}"
                             class="user-image" alt="User Image"/>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{ asset("components/AdminLTE/dist/img/user2-160x160.jpg") }}"
                                 class="img-circle" alt="User Image" />
                            <p>
                                {{ Auth::user()->name }} - Administrator
                                <small>Member since Nov. 2017</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div>
                                <form action="/logout" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit"
                                        class="btn btn-default btn-flat btn-block">Sign out</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
