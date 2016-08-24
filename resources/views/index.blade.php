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
            <div class="item active fill" style="background-image: url(/images/slider/slide1-2.jpg)">
                <div class="container">
                    <div class="row slide-margin">
                        <div class="col-sm-8">
                            <div class="carousel-caption">
                                <h2 class="animation animated-item-1">德国 Pro-Med</h2>
                                <p class="animation animated-item-2" style="text-indent:2em;text-align: left;font-size: 16px;">坐落在全球著名手术器械生产研发集散地: 德国图特林根的德国Pro-Med器械公司是以EN ISO9001及EN46001为标准的外科手术器械制造商，100%德国制造。</p>
                            </div>
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

            <div class="item fill" style="background-image: url(/images/slider/slide2-2.jpg)">
                <div class="container">
                    <div class="row slide-margin">
                        <div class="col-sm-12">
                            <div class="carousel-caption" style="color: #333333;font-weight: bold;">
                                <h2 class="animation animated-item-1">美国 SurgiTel</h2>
                                <p class="animation animated-item-2" style="text-indent:2em;text-align: left;font-size: 16px;">通过十多年来几万名临床手术医生的使用，获得了手术医生的高度评价，并连续若干年被美国评为优质产品，获得美国人体工程学设计优秀奖。SurgiTel系列产品现已行销世界八十多个国家和地区。</p>
                            </div>
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
                        <div class="col-sm-12">
                            <div class="carousel-caption" style="text-indent:4em;text-align: left;">
                                <h3 class="animation animated-item-1">为广大的临床医学实验室及科研实验室提供国内及国际最尖端的检验技术及产品。</h3>
                                <!--<h2 class="animation animated-item-2">100%德国制造</h2>-->
                            </div>
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
                        <div class="panel-300">
                        <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>-->
                            <p style="text-indent:2em;">坐落在全球著名手术器械生产研发集散地: 德国图特林根的德国Pro-Med器械公司是以EN ISO9001及EN46001为标准的外科手术器械制造商，100%德国制造。</p>
                            <p style="text-indent:2em;">为世界各地用户奉献我们在外科手术器械行业近40年的专业知识和技能。</p>
                            <p style="text-indent:2em;">以优质的产品和可信赖的服务与我们的客户建立长久的联系。</p>
                            <p style="text-indent:2em;">缩短新产品从研发到上市的周期。</p>
                            <p style="text-indent:2em;">通过创新提供最优质的产品和最有效的成本控制。</p>
                        </div>
                        <a href="/items?company=Germany" class="btn btn-default">了解更多</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-eye"></i> 美国 SurgiTel </h4>
                    </div>
                    <div class="panel-body" style="height: auto">
                        <div class="panel-300">
                        <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>-->
                            <p style="text-indent:2em;">美国通用科学公司（GSC）是有八十余年历史，从事光学产品研究、开发、生发的专业公司，其产品广泛涉及机械、航天、航空、军事、电子等行业。在研究人体工程学进展中，为了避免手术医生在长时间手术中产生的眼睛疲劳和手术操作引起的颈肩疼痛，研究生产了专门用于手术者的SurgiTel系列手术放大镜、手术头灯及外科手术摄像系统。
                                通过十多年来几万名临床手术医生的使用，获得了手术医生的高度评价，并连续若干年被美国评为优质产品，获得美国人体工程学设计优秀奖。SurgiTel系列产品现已行销世界八十多个国家和地区。</p>
                        </div><a href="/items?company=USA" class="btn btn-default">了解更多</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-flask"></i> 诊断试剂</h4>
                    </div>
                    <div class="panel-body">
                        <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>-->
                        <div class="panel-300">
                            <p style="text-indent:2em;">为广大的临床医学实验室及科研实验室提供国内及国际最尖端的检验技术及产品：</p>
                            <p style="text-indent:2em;">- 分子生物学实验室的病毒核酸检测；</p>
                            <p style="text-indent:2em;">- 感染性疾病检测；</p>
                            <p style="text-indent:2em;">- 肿瘤基因突变；</p>
                            <p style="text-indent:2em;">- 耐药基因突变及优生优育检测等项目；</p>
                            <p style="text-indent:2em;">- 临床输血基因分型、器官移植、骨髓移植基因配型和临床研究用分子生物学相关项目；</p>
                            <p style="text-indent:2em;">- 移植免疫药物浓度监测及临床生化试剂等项目；</p></div>
                        <a href="/items?company=other" class="btn btn-default">了解更多</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Section -->
        <link href="/css/home-effects.css" rel="stylesheet">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">产品介绍</h2>
            </div>
            @foreach ($items as $item)
            <!--            <div class="img-portfolio col-md-4 col-sm-6 col-xs-12">
                            <div class="hovereffect">
                                <img class="img-responsive" src="{{ $item->image }}" alt="">
                                <div class="overlay">
                                    <h2>{{ $item->name }}</h2>
                                    <p class="info" href="#">简介：<?php echo $short_string = (strlen($item->introduction) > 300) ? mb_substr($item->introduction, 0, 80, 'UTF-8') . ' ...' : $item->introduction; ?></p>
                                </div>
                            </div>
                        </div>-->
            @endforeach
            <div class="img-portfolio col-md-4 col-sm-6 col-xs-12">
                <div class="hovereffect">
                    <img class="img-responsive" src="/images/display1.jpg" alt="">
                    <div class="overlay">
                        <h2>配套齐全的手术器械</h2>
                        <!--<p class="info" href="#">简介：<?php echo $short_string = (strlen($item->introduction) > 300) ? mb_substr($item->introduction, 0, 80, 'UTF-8') . ' ...' : $item->introduction; ?></p>-->
                    </div>
                </div>
            </div>

            <div class="img-portfolio col-md-4 col-sm-6 col-xs-12">
                <div class="hovereffect">
                    <img class="img-responsive" src="/images/display2-2.jpg" alt="">
                    <div class="overlay">
                        <h2>各种放大倍数的精美手术放大镜</h2>
                        <!--<p class="info" href="#">简介：<?php echo $short_string = (strlen($item->introduction) > 300) ? mb_substr($item->introduction, 0, 80, 'UTF-8') . ' ...' : $item->introduction; ?></p>-->
                    </div>
                </div>
            </div>

            <div class="img-portfolio col-md-4 col-sm-6 col-xs-12">
                <div class="hovereffect">
                    <img class="img-responsive" src="/images/display3.jpg" alt="">
                    <div class="overlay">
                        <h2>产品试剂盒</h2>
                        <!--<p class="info" href="#">简介：<?php echo $short_string = (strlen($item->introduction) > 300) ? mb_substr($item->introduction, 0, 80, 'UTF-8') . ' ...' : $item->introduction; ?></p>-->
                    </div>
                </div>
            </div>
            <div class="img-portfolio col-md-4 col-sm-6 col-xs-12">
                <div class="hovereffect">
                    <img class="img-responsive" src="/images/display4.jpg" alt="">
                    <div class="overlay">
                        <h2>经严格验证的高品质产品</h2>
                        <!--<p class="info" href="#">简介：<?php echo $short_string = (strlen($item->introduction) > 300) ? mb_substr($item->introduction, 0, 80, 'UTF-8') . ' ...' : $item->introduction; ?></p>-->
                    </div>
                </div>
            </div>

            <div class="img-portfolio col-md-4 col-sm-6 col-xs-12">
                <div class="hovereffect">
                    <img class="img-responsive" src="/images/display5.jpg" alt="">
                    <div class="overlay">
                        <h2>与手术放大镜共轴的头灯摄像系统</h2>
                        <!--<p class="info" href="#">简介：<?php echo $short_string = (strlen($item->introduction) > 300) ? mb_substr($item->introduction, 0, 80, 'UTF-8') . ' ...' : $item->introduction; ?></p>-->
                    </div>
                </div>
            </div>

            <div class="img-portfolio col-md-4 col-sm-6 col-xs-12">
                <div class="hovereffect">
                    <img class="img-responsive" src="/images/display6.jpg" alt="">
                    <div class="overlay">
                        <h2>显微镜下实验结果</h2>
                        <!--<p class="info" href="#">简介：<?php echo $short_string = (strlen($item->introduction) > 300) ? mb_substr($item->introduction, 0, 80, 'UTF-8') . ' ...' : $item->introduction; ?></p>-->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">公司简介</h2>
            </div>
            <div class="col-md-6" style="text-indent:2em;">
                <p>广东康盛生物科技有限公司创建于2003年12月，是经过广东省工商行政管理局及广东省食品药品监督局正式批准注册的集生物技术产品及医疗产品推广、应用、销售和服务于一身的专业化公司。</p>
                <p>我们是德国Pro-Med Instrumente GmbH 外科手术器械及显微器械产品在中国地区的唯一总代理。</p>
                <p>我们是美国GSC公司SurgiTel手术放大镜、手术头灯及手术摄像系统产品在华中南区七省代理商。</p>
                <p>我们为客户提供如下诊断试剂：分子生物学实验室的病毒核酸检测、感染性疾病检测、肿瘤基因突变、耐药基因突变及优生优育检测等项目；荧光原位杂交FISH试剂；临床输血基因分型、器官移植、骨髓移植基因配型和临床研究用分子生物学相关项目；移植免疫药物浓度监测及临床生化试剂等项目。</p>
            </div>
            <div class="col-md-6">
                <img class="img-responsive" src="/images/index-rb.jpg" alt="">
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