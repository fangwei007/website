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
    <div class="container page-container" style="min-height: 700px">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">仪器设备
                    <small>分类列表</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="/">首 页</a>
                    </li>
                    <li class="active">仪器设备</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Blog Search Well -->
        <div class="row">
            <form  class="form-horizontal" role="form" method="get" action="{{ url('/items') }}">
                <div class="col-md-3" style="padding: 15px; margin-bottom: 30px;">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="搜索产品" name="q">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>
            </form>

            <div class="panel-body col-md-9" id="tabs">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="<?php if (!isset($_GET['company'])) echo "active"; ?>">
                        <a href="/items">全 部</a>
                    </li>
                    <li class="<?php if (isset($_GET['company']) && $_GET['company'] == "Germany") echo "active"; ?>">
                        <a href="/items?company=Germany">德国 Pro-Med</a>
                    </li>
                    <li class="<?php if (isset($_GET['company']) && $_GET['company'] == "USA") echo "active"; ?>">
                        <a href="/items?company=USA">美国 SurgiTel </a>
                    </li>
                    <li class="<?php if (isset($_GET['company']) && $_GET['company'] == "other") echo "active"; ?>">
                        <a href="/items?company=other">诊断试剂 </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <?php if (isset($_GET['company']) && $_GET['company'] == "Germany"): ?>
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="/items?company=Germany&type=jc" class="list-group-item <?php if (isset($_GET['type']) && $_GET['type'] == 'jc') echo 'active' ?>">基础外科器械</a>
                        <a href="/items?company=Germany&type=xxw" class="list-group-item <?php if (isset($_GET['type']) && $_GET['type'] == 'xxw') echo 'active' ?>">心血管及胸外科</a>
                        <a href="/items?company=Germany&type=pw" class="list-group-item <?php if (isset($_GET['type']) && $_GET['type'] == 'pw') echo 'active' ?>">普通外科</a>
                        <a href="/items?company=Germany&type=ebh" class="list-group-item <?php if (isset($_GET['type']) && $_GET['type'] == 'ebh') echo 'active' ?>">耳鼻喉外科</a>
                        <a href="/items?company=Germany&type=gkxw" class="list-group-item <?php if (isset($_GET['type']) && $_GET['type'] == 'gkxw') echo 'active' ?>">骨外科神经外科及显微外科</a>
                    </div>
                </div>
            <?php elseif (isset($_GET['company']) && $_GET['company'] == "USA"): ?>
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="/items?company=USA&type=ssfdj" class="list-group-item <?php if (isset($_GET['type']) && $_GET['type'] == 'ssfdj') echo 'active' ?>">手术放大镜</a>
                        <a href="/items?company=USA&type=sstd" class="list-group-item <?php if (isset($_GET['type']) && $_GET['type'] == 'sstd') echo 'active' ?>">手术头灯</a>
                        <a href="/items?company=USA&type=yjdbh" class="list-group-item <?php if (isset($_GET['type']) && $_GET['type'] == 'yjdbh') echo 'active' ?>">眼镜的保护</a>
                        <a href="/items?company=USA&type=sssxxt" class="list-group-item <?php if (isset($_GET['type']) && $_GET['type'] == 'sssxxt') echo 'active' ?>">手术摄像系统</a>
                    </div>
                </div>
            <?php elseif (isset($_GET['company']) && $_GET['company'] == "other"): ?>
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="/items?company=other&type=zdsj" class="list-group-item">诊断试剂</a>
                    </div>
                </div>
            <?php else : ?>
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="/items?company=Germany&type=jc" class="list-group-item <?php if (isset($_GET['type']) && $_GET['type'] == 'jc') echo 'active' ?>">基础外科器械</a>
                        <a href="/items?company=Germany&type=xxw" class="list-group-item <?php if (isset($_GET['type']) && $_GET['type'] == 'xxw') echo 'active' ?>">心血管及胸外科</a>
                        <a href="/items?company=Germany&type=pw" class="list-group-item <?php if (isset($_GET['type']) && $_GET['type'] == 'pw') echo 'active' ?>">普通外科</a>
                        <a href="/items?company=Germany&type=ebh" class="list-group-item <?php if (isset($_GET['type']) && $_GET['type'] == 'ebh') echo 'active' ?>">耳鼻喉外科</a>
                        <a href="/items?company=Germany&type=gkxw" class="list-group-item <?php if (isset($_GET['type']) && $_GET['type'] == 'gkxw') echo 'active' ?>">骨外科神经外科及显微外科</a>
                        <a href="/items?company=USA&type=ssfdj" class="list-group-item">手术放大镜</a>
                        <a href="/items?company=other&type=zdsj" class="list-group-item">诊断试剂</a>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Content Column -->
            <div class="col-md-9">
                @if (count($items) > 0)
                <!-- Projects Row -->
                <div class="row">
                    @foreach ($items as $item)
                    <div class="img-portfolio col-md-4 col-sm-6 col-xs-12">
                        <div class="hovereffect">
                            <img class="img-responsive" src="{{ $item->image }}" alt="">
                            <div class="overlay">
                                <a href="/items/{{ $item->id }}">
                                    <h2>{{ $item->name }}</h2>
                                    <p>简介：<?php echo $short_string = (strlen($item->introduction) > 300) ? mb_substr($item->introduction, 0, 30, 'UTF-8') . '...' : $item->introduction; ?></p>
                                </a>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
                @else 
                <div class="row">
                    <div class="col-md-4 img-portfolio">
                        <p><i class="fa fa-warning"></i> 对不起，没有相关仪器或设备！</p>
                    </div>
                </div>
                @endif
                <!-- /.row -->
            </div>
        </div>
        <!-- /.row -->

        @if($items->total() > 9) <hr> @endif

        <!-- Pagination -->
        @include('pagination.default', ['paginator' => $items])
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