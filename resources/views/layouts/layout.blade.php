<!DOCTYPE html>
<html lang="zh-Hans">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>新网站</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/modern-business.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- Navigation -->
        <header id="header">
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-xs-6">
                            <div class="top-number"><p><i class="fa fa-phone-square"></i> 13903336666 &nbsp;&nbsp;&nbsp;<i class="fa fa-mobile-phone"></i> 13903336666</p></div>
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            <div class="social">
                                <ul class="social-share">
                                    <li><a href="#"><i class="fa fa-weibo"></i></a></li>
                                    <li><a href="#"><i class="fa fa-weixin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-qq"></i></a></li> 
                                    <li><a href="#"><i class="fa fa-apple"></i></a></li>
                                    <li><a href="#"><i class="fa fa-windows"></i></a></li>
                                </ul>
                                <div class="search">
                                    <form role="form">
                                        <input type="text" class="search-form" autocomplete="off" placeholder="搜索">
                                        <i class="fa fa-search"></i>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.container-->
            </div><!--/.top-bar-->

            <nav class="navbar navbar-inverse" role="banner">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/"><img src="images/logo.png" alt="logo"></a>
                    </div>

                    <div class="collapse navbar-collapse navbar-right">
                        <ul class="nav navbar-nav">
                            <li <?php echo Request::is('/') ? 'class="active"' : ''; ?>><a href="/"><i class="fa fa-home"></i> 首 页</a></li>
                            <li <?php echo Request::is('about') ? 'class="active"' : ''; ?>><a href="/about"><i class="fa fa-info-circle"></i> 关于我们</a></li>
                            @if (!Auth::guest() && (Auth::user()->isAdmin() || Auth::user()->isMember()))
                            <li <?php echo Request::is('items') ? 'class="active"' : ''; ?>><a href="/items"><i class="fa fa-unlock"></i> 产品详情</a></li>
                            @endif
                            <li <?php echo Request::is('contact') ? 'class="active"' : ''; ?>><a href="/contact"><i class="fa fa-phone-square"></i> 联系我们</a></li>
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                            <li <?php echo Request::is('login') || Request::is('register') ? 'class="active"' : ''; ?> ><a href="{{ url('/login') }}"><i class="fa fa-user"></i> 会员登陆</a></li>
                            <!--<li><a href="{{ url('/register') }}">Register</a></li>-->
                            @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    @if (Auth::user()->isAdmin()) <li><a href="{{ url('/admin') }}"><i class="fa fa-btn fa-dashboard"></i> 控制台</a></li>@endif
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> 退出登录</a></li>
                                </ul>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div><!--/.container-->
            </nav><!--/nav-->

        </header><!--/header-->

        @yield('content')

        <!-- Footer -->
        <div class="container">
            <hr>
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; 新网站 方方 2016</p>
                    </div>
                </div>
            </footer>
        </div>
        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Script to Activate the Carousel -->
        <script>
$('.carousel').carousel({
    interval: 5000 //changes the speed
})
        </script>
    </body>

</html>

