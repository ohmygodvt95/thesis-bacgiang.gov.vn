<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("components/AdminLTE/dist/img/user2-160x160.jpg") }}"
                     class="img-circle"
                     alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="/admin"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                  <button type='submit' name='search' id='search-btn' class="btn btn-flat">
                      <i class="fa fa-search"></i>
                  </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview">
                <a href="/admin/categories"><span>Categories</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/admin/categories">List categories</a></li>
                    <li><a href="/admin/categories/create">Create category</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="/admin/posts"><span>Posts</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/admin/posts">List posts</a></li>
                    <li><a href="/admin/posts/create">Create post</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="/admin/files"><span>Files</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/admin/files">List files</a></li>
                    <li><a href="/admin/files/create">Create files</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="/admin/videos"><span>Videos</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/admin/videos">List videos</a></li>
                    <li><a href="/admin/videos/create">Create video</a></li>
                </ul>
            </li>
            <li><a href="/admin/services"><span>Services</span></a></li>
            {{--<li class="treeview">--}}
                {{--<a href="#"><span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="#">Link in level 2</a></li>--}}
                    {{--<li><a href="#">Link in level 2</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
