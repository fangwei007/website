<!DOCTYPE html>
<html lang="zh-Hans">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Sunnytechs">
        <meta name="author" content="Sunnytechs">

        <title>Sunnytechs</title>

        <!-- Bootstrap Core CSS -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="/css/modern-business.css" rel="stylesheet">
        <link href="/css/main.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body style="background-image: url('/images/patterns/straws.png')">
        <div class="boxed" style="padding: 0">
            <!-- Navigation -->
            <header id="header">
                <div class="top-bar">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-xs-6" style="padding-left: 30px;">
                                <div class="top-number"><p><i class="fa fa-phone-square"></i> (020)83828799 &nbsp;&nbsp;&nbsp;<i class="fa fa-fax"></i> (020)83828797</p></div>
                            </div>
                            <div class="col-sm-6 col-xs-6" style="padding-right: 30px;">
                                <div class="social">
                                    <ul class="social-share tooltip-demo">
                                        <li><button class="btn-default" style="border-color: transparent;" data-container="body" data-toggle="popover" data-placement="bottom" data-trigger="hover focus" data-html="true" data-content='<img src="/images/QR.png" width=80/>'><i class="fa fa-weibo"></i></button></li>
                                        <li><button class="btn-default" style="border-color: transparent;" data-container="body" data-toggle="popover" data-placement="bottom" data-trigger="hover focus" data-html="true" data-content='<img src="/images/QR.png" width=80/>'><i class="fa fa-weixin"></i></button></li>
                                        <li><button class="btn-default" style="border-color: transparent;" data-container="body" data-toggle="popover" data-placement="bottom" data-trigger="hover focus" data-html="true" data-content='<img src="/images/QR.png" width=80/>'><i class="fa fa-qq"></i></button></li> 
                                    </ul>
                                    <div class="search">
                                        <form role="form" method="get" action="{{ url('/items') }}">
                                            <input type="text" class="search-form" autocomplete="off" placeholder="搜索产品" name="q">
                                            <button class="btn-default" type="submit" style="border-color: transparent;line-height: 25px;"><i class="fa fa-search"></i></button>
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
                            <a class="navbar-brand" href="/"><img src="/images/logo7.png" alt="logo"></a>
                        </div>

                        <div class="collapse navbar-collapse navbar-right">
                            <ul class="nav navbar-nav">
                                <li <?php echo Request::is('/') ? 'class="active"' : ''; ?>><a href="/"><i class="fa fa-home"></i> 首 页</a></li>
                                <li <?php echo Request::is('about') ? 'class="active"' : ''; ?>><a href="/about">关于我们</a></li>
                                @if (!Auth::guest() && (Auth::user()->isAdmin() || Auth::user()->isMember()))
                                <li <?php echo Request::is('items') ? 'class="active"' : ''; ?>><a href="/items">产品详情 <i class="fa fa-unlock"></i></a></li>
                                @else
                                <li <?php echo Request::is('items') ? 'class="active"' : ''; ?>><a href="/items">产品详情 <i class="fa fa-lock"></i></a></li>
                                @endif
                                <li <?php echo Request::is('contact') ? 'class="active"' : ''; ?>><a href="/contact">联系我们</a></li>
                                <!-- Authentication Links -->
                                @if (Auth::guest())
                                <li <?php echo Request::is('login') || Request::is('register') ? 'class="active"' : ''; ?> ><a href="{{ url('/login') }}">会员登陆</a></li>
                                <!--<li><a href="{{ url('/register') }}">Register</a></li>-->
                                @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        hi {{ Auth::user()->name }} <span class="caret"></span>
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
        </div>

        @yield('content')

        <!-- Footer -->
        <div class="container page-container">
            <hr>
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; 广东康盛生物科技有限公司 2016</p>
                    </div>
                </div>
            </footer>
        </div>
        <!-- jQuery -->
        <script src="/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="/js/bootstrap.min.js"></script>

        <!-- Script to Activate the Carousel -->
        <script>
$('.carousel').carousel({
    interval: 5000 //changes the speed
})
        </script>

        <script>
            // tooltip demo
            $('.tooltip-demo').tooltip({
                selector: "[data-toggle=tooltip]",
                container: "body"
            })

            // popover demo
            $("[data-toggle=popover]")
                    .popover()
        </script>
    </body>

</html>

