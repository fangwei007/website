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

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide no-margin">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active fill" style="background-image: url(/images/slider/slide1.png)">
                <div class="container">
                    <div class="row slide-margin">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <!--                                <h1 class="animation animated-item-1">这是一所宁静美丽的江南小城。小城西北角，有一所大学</h1>
                                                                <h2 class="animation animated-item-2">Accusantium doloremque laudantium totam rem aperiam, eaque ipsa...</h2>
                                                                <a class="btn-slide animation animated-item-3" href="#">Read More</a>-->
                            </div>
                        </div>

                        <div class="col-sm-6 hidden-xs animation animated-item-4">
                            <div class="slider-img">
                                <!--<img src="images/slider/img1.png" class="img-responsive">-->
                            </div>
                        </div>

                    </div>
                </div>
            </div><!--/.item-->

            <div class="item fill" style="background-image: url(/images/slider/slide2.png)">
                <div class="container">
                    <div class="row slide-margin">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <!--                                <h1 class="animation animated-item-1">Lorem ipsum dolor sit amet consectetur adipisicing elit</h1>
                                                                <h2 class="animation animated-item-2">Accusantium doloremque laudantium totam rem aperiam, eaque ipsa...</h2>
                                                                <a class="btn-slide animation animated-item-3" href="#">Read More</a>-->
                            </div>
                        </div>

                        <div class="col-sm-6 hidden-xs animation animated-item-4">
                            <div class="slider-img">
                                <!--<img src="images/slider/img2.png" class="img-responsive">-->
                            </div>
                        </div>

                    </div>
                </div>
            </div><!--/.item-->

            <div class="item fill" style="background-image: url(/images/slider/slide3.png)">
                <div class="container">
                    <div class="row slide-margin">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <!--                                <h1 class="animation animated-item-1">Lorem ipsum dolor sit amet consectetur adipisicing elit</h1>
                                                                <h2 class="animation animated-item-2">Accusantium doloremque laudantium totam rem aperiam, eaque ipsa...</h2>
                                                                <a class="btn-slide animation animated-item-3" href="#">Read More</a>-->
                            </div>
                        </div>
                        <div class="col-sm-6 hidden-xs animation animated-item-4">
                            <div class="slider-img">
                                <!--<img src="images/slider/img3.png" class="img-responsive">-->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->
    <div class="container page-container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">独家代理</h2>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-medkit"></i> 德国 Pro-Med </h4>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                        <a href="#" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-eye"></i> 美国 SurgiTel </h4>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                        <a href="#" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-flask"></i> 诊断试剂</h4>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                        <a href="#" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Section -->
        <link href="/css/home-effects.css" rel="stylesheet">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">仪器展示</h2>
            </div>
            @foreach ($items as $item)
            <div class="img-portfolio col-md-4 col-sm-6 col-xs-12">
                <div class="hovereffect">
                    <img class="img-responsive" src="{{ $item->image }}" alt="">
                    <div class="overlay">
                        <h2>{{ $item->name }}</h2>
                        <p class="info" href="#">简介：<?php echo $short_string = (strlen($item->introduction) > 300) ? mb_substr($item->introduction, 0, 80, 'UTF-8') . ' ...' : $item->introduction; ?></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- /.row -->

        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">公司简介</h2>
            </div>
            <div class="col-md-6" style="text-indent:2em;">
                <p>广东康盛生物科技有限公司创建于2003年12月，是经过广东省工商行政管理局及广东省食品药品监督局正式批准注册的集生物技术产品及医疗产品推广、应用、销售和服务于一身的专业化公司。</p>
                <p>广东康盛生物科技有限公司以向医疗机构提供行业内顶级品牌的医疗器械产品为己任，康盛人以“认真做好每一件事” 的朴素理念让这些高端的医疗产品通过细致专业的服务使医疗机构及患者享受到高新技术的进步给人类带来的福祉。</p>
                <p>我们把专注的医学道德精神融汇于医疗产品技术推广的全过程，并以高素质专业化的理念建设公司队伍。公司不断提高人员素质赴生产厂家进行相应的产品培训，以获得最新技术和资讯与国际国内接轨。</p>
                <p>我们是德国Pro-Med Instrumente GmbH 外科手术器械及显微器械产品在中国地区的唯一总代理；我们是美国GSC公司SurgiTel手术放大镜、手术头灯及手术摄像系统产品在华中南区七省代理商；我们为客户提供如下诊断试剂：分子生物学实验室的病毒核酸检测、感染性疾病检测、肿瘤基因突变、耐药基因突变及优生优育检测等项目；荧光原位杂交FISH试剂；临床输血基因分型、器官移植、骨髓移植基因配型和临床研究用分子生物学相关项目；移植免疫药物浓度监测及临床生化试剂等项目。</p>
            </div>
            <div class="col-md-6">
                <img class="img-responsive" src="http://placehold.it/700x450" alt="">
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                <div class="col-md-8">
                    <p style="text-indent:2em;"><strong>致力于寻求技术领先、 质量上乘的医疗产品，并将之推广至医疗机构和广大患者，是公司始终秉承的信念和追求！</strong></p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-lg btn-default btn-block" href="/contact">联系我们</a>
                </div>
            </div>
        </div>
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