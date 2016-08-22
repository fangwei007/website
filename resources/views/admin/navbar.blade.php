<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/admin"><i class="fa fa-desktop text-primary"></i> <label class="text-primary">控制面板</label></a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user"></i> {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="/"><i class="fa fa-home fa-fw"></i> 回到网站</a></li>
                <li><a href="/admin/{{ Auth::user()->id }}/edit"><i class="fa fa-gear fa-fw"></i> 设 置</a></li>
                <li class="divider"></li>
                <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> 退出登陆</a></li>
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
                    <div class="text-center">
                        <a href="/">
                            <button type="button" class="btn btn-outline btn-primary">
                                <i class="fa fa-home fa-fw"></i> 回到网站
                            </button>
                        </a></div>
                </li>
                <li>
                    <a href="/admin"><i class="fa fa-dashboard fa-fw"></i> 控制面板</a>
                </li>
                <li>
                    <a href="/admin/create"><i class="fa fa-plus-square fa-fw"></i> 添加用户</a>
                </li>
                <li>
                    <a href="/items/create"><i class="fa fa-plus-square fa-fw"></i> 添加器材</a>
                </li>
                <li>
                    <a href="/user-manage"><i class="fa fa-group fa-fw"></i> 用户管理</a>
                </li>
                <li>
                    <a href="/item-manage"><i class="fa fa-gears fa-fw"></i> 设备管理</a>
                </li>
                <li>
                    <a href="/msg-manage"><i class="fa fa-envelope-o fa-fw"></i> 留言管理</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Blank Page</a>
                        </li>
                        <li>
                            <a href="#">Login Page</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="/trash"><i class="fa fa-trash-o fa-fw"></i> 回收站</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
