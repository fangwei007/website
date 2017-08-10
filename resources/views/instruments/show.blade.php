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
        <?php
        $request = Request();
        $lang = $request->route()->getPrefix();
        $prefix = $lang == NULL ? '' : '/en';
        ?>
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> <?php echo $lang == NULL ? "仪器设备" : "Products"; ?>
                    <small>{{ $item->name }} </small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ $prefix. '/' }}"><?php echo $lang == NULL ? "首 页" : "Home"; ?></a></li>
                    <li><a href="{{ $prefix. '/items' }}"><?php echo $lang == NULL ? "仪器设备" : "Products"; ?></a></li>
                    <li>
                        <a href="/items?company={{ $item->company }}&type={{  $item->type }}">
                            @if ($item->company == "Germany")
                            <?php echo $lang == NULL ? "德国 Pro-Med" : "Pro-Med"; ?>
                            @elseif ($item->company == "USA")
                            <?php echo $lang == NULL ? "美国 SurgiTel" : "SurgiTel"; ?>
                            @else
                            <?php echo $lang == NULL ? "诊断试剂" : "Diagnosis Reagents"; ?>
                            @endif
                        </a>
                    </li>
                    <li class="active">{{ $item->name }}</li>
                    @if (!Auth::guest() && Auth::user()->role == 'V')
                    <a class="pull-right" href="{{ "/items/$item->id/edit" }}"> <i class="fa fa-edit"></i><?php echo $lang == NULL ? "编 辑" : "Edit"; ?> </a>
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
                <h3><?php echo $lang == NULL ? "仪器型号" : "Instrument ID"; ?></h3>
                <p>{{ $item->name }}</p>
                <h3><?php echo $lang == NULL ? "仪器介绍" : "Instrument Introduction"; ?></h3>
                <p>{{ $item->introduction }}</p>
                <h3><?php echo $lang == NULL ? "详细参数" : "Specifications"; ?></h3>
                <p><?php echo $lang == NULL ? "暂 无" : "Not Available"; ?></p>
<!--                <ul style="margin-left: -20px">
                    <li>Lorem Ipsum</li>
                    <li>Dolor Sit Amet</li>
                    <li>Consectetur</li>
                    <li>Adipiscing Elit</li>
                </ul>-->
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