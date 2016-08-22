<?php
/*
 *  PHP Cache whole web page : You can use phpFastCache to cache the whole webpage easy too.
 *  This is simple example, but in real code, you should split it to 2 files: cache_start.php and cache_end.php.
 *  The cache_start.php will store the beginning code until ob_start(); and the cache_end.php will start from GET HTML WEBPAGE.
 *   Then, your index.php will include cache_start.php on beginning and cache_end.php at the end of file.
 */

// use Files Cache for Whole Page / Widget
// keyword = Webpage_URL
phpFastCache::setup("path", storage_path('framework/cache'));
$keyword_webpage = md5($_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING']);

$html = null;
$caching = true;

// no caching if $_POST
if (isset($_POST)) {
    $caching = false;
}

// ONLY ACCESS CACHE IF $CACHE = TRUE
if ($caching === true) {
    $html = __c("files")->get($keyword_webpage);
}

if ($html == null) :
    ob_start();
    ?>
    @extends('layouts.layout')

    @section('content')

    <!-- Page Content -->
    <div class="container page-container" style="min-height: 700px;">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> 仪器设备
                    <small>{{ $item->name }} </small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="/">首 页</a></li>
                    <li><a href="/items">仪器设备</a></li>
                    <li>
                        <a href="/items?company={{ $item->company }}&type={{  $item->type }}">
                            @if ($item->company == "Germany")
                            德国 Pro-Med
                            @elseif ($item->company == "USA")
                            美国 SurgiTel
                            @else
                            诊断试剂
                            @endif
                        </a>
                    </li>
                    <li class="active">{{ $item->name }}</li>
                    @if (Auth::user()->role == 'V')
                    <a class="pull-right" href="/items/{{ $item->id }}/edit"> <i class="fa fa-edit"></i>编 辑 </a>
                    @endif
                </ol>

            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                @if ($item->company == "Germany")
                <img class="img-responsive" src="{{ $item->image }}" />
                @elseif ($item->type == "sstd")
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="img-responsive" src="{{ $item->image }}" />
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="/images/usa/1.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="/images/usa/2.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="/images/usa/3.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="/images/usa/4.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="/images/usa/5.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="/images/usa/6.jpg" alt="">
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
                @elseif ($item->type == "yjdbh")
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="img-responsive" src="{{ $item->image }}" />
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="/images/usa/7.jpg" alt="">
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
                @elseif ($item->type == "sssxxt")
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="img-responsive" src="{{ $item->image }}" />
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="/images/usa/8.jpg" alt="">
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
                @elseif ($item->type == "ssfdj")
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="img-responsive" src="{{ $item->image }}" />
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="/images/usa/9.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="/images/usa/10.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="/images/usa/11.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="/images/usa/12.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="/images/usa/13.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="/images/usa/14.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="/images/usa/15.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="/images/usa/16.jpg" alt="">
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
                @else
                <img class="img-responsive" src="{{ $item->image }}" />
                @endif
            </div>

            <div class="col-md-4">
                <h3>仪器型号</h3>
                <p>{{ $item->name }}</p>
                <h3>仪器介绍</h3>
                <p>{{ $item->introduction }}</p>
                <h3>详细参数</h3>
                <ul style="margin-left: -20px">
                    <li>Lorem Ipsum</li>
                    <li>Dolor Sit Amet</li>
                    <li>Consectetur</li>
                    <li>Adipiscing Elit</li>
                </ul>
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

    @endsection
    <?php
    $html = ob_get_contents();
    // Save to Cache 30 minutes
    __c("files")->set($keyword_webpage, $html, 60 * 30);
endif;
echo $html;
?>