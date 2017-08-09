<script type="text/javascript" src="/js/floating-1.12.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>

<!--<div class="panel panel-default" id="floatdiv" style="margin-top: -22px;"></div>-->
<?php $newRaw = Illuminate\Support\Facades\Redis::get('news'); ?>
<?php $news = json_decode($newRaw, TRUE); ?>
<?php
$request = Request();
$lang = $request->route()->getPrefix();
$prefix = $lang == NULL ? '' : '/en';
?>
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
        <div class="item active fill" style="background-image: url(/images/slider/slide1-4.jpg)">
            <div class="container">
                <div class="row slide-margin">
                    <div class="col-sm-8">
                        <div class="carousel-caption">
                            <h2 class="animation animated-item-1"><?php echo $lang == NULL ? "德国 Pro-Med(貝鎂) 独家代理" : "Pro-Med"; ?></h2>
                            @if ($lang == NULL)
                            <p class="animation animated-item-2" style="text-indent:2em;text-align: left;font-size: 16px;">坐落在全球著名手术器械生产研发集散地: 德国图特林根的德国Pro-Med器械公司是以EN ISO9001及EN46001为标准的外科手术器械制造商，100%德国制造。</p>
                            @else
                            <p class="animation animated-item-2" style="text-indent:2em;text-align: left;font-size: 16px;">Located in Tuttlingen, the world center for surgical instrument Pro-Med is a family-owned EN ISO 9001/EN 46001 certified manufacturer/distributor of fine surgical instruments and appliances-found in 1978.  </p>
                            @endif 
                        </div>
                        <div class="carousel-content">
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
                            <h2 class="animation animated-item-1"><?php echo $lang == NULL ? "美国 SurgiTel" : "SurgiTel"; ?></h2>
                            @if ($lang == NULL)
                            <p class="animation animated-item-2" style="text-indent:2em;text-align: left;font-size: 16px;">通过十多年来几万名临床手术医生的使用，获得了手术医生的高度评价，并连续若干年被美国评为优质产品，获得美国人体工程学设计优秀奖。SurgiTel系列产品现已行销世界八十多个国家和地区。</p>
                            @else
                            <p class="animation animated-item-2" style="text-indent:2em;text-align: left;font-size: 16px;">Since 1932 SurgiTel has been innovating in the field of optical technology.  The unique loupes, headlights and other optical accessories provide both the technical requirements and the ergonomic support to make your work better.  </p>
                            @endif
                        </div>
                        <div class="carousel-content">
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
                            @if ($lang == NULL)
                            <h3 class="animation animated-item-1">为广大的临床医学实验室及科研实验室提供国内及国际最尖端的检验技术及产品。</h3>
                            @else
                            <h3 class="animation animated-item-1">We provide latest diagnostic technology and product at home and abroad to our clients in clinic medical center and research laboratory.</h3>
                            @endif
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

<script type="text/javascript">
    $("#floatdiv").html('<div class="panel-heading" style="background-color: #f0f0f0;">\n\
<h4><i class="fa fa-fw fa-rss-square"></i> 公司动态 </h4></div>\n\
<div class="panel-body" id="floatMsg" style="overflow: scroll;height:390px;">\n\
<p style="text-indent:2em;"><strong><?= $news[0][0]; ?></strong></p></div>');

    $("#floatdiv").css({
        "position": "relative",
        "width": "150px",
        "height": "80px",
        "background": "#FFFFFF",
        "border": "1px solid #ccc",
        "z-index": "100",
        "border-radius": "5px",
        "opacity": "0.9"
    });

    $("#myCarousel").css({
        "margin-top": "-80px"
    });

    $("#floatMsg").hide();
</script>

<script type="text/javascript">
    $("#floatdiv").hover(
            function () {
                $(this).css({
                    "border-color": "#009eae"
                });

                $('#floatdiv > .panel-heading').css({
                    "background-color": "#009eae",
                    "color": "white"
                });
            },
            function () {
                $(this).css({
                    "border-color": "#ccc"
                });

                $('#floatdiv > .panel-heading').css({
                    "background-color": "#f0f0f0",
                    "color": "black"
                });
            });

    var action = 2;

    $("#floatdiv").on("click", changeBox);

    function changeBox() {
        if (action == 1) {
            $("#floatdiv").css({
                "width": "150px",
                "height": "80px",
            });

            $("#myCarousel").css({
                "margin-top": "-80px"
            });

            $("#floatMsg").hide();
            action = 2;
        } else {
            $("#floatdiv").css({
                "width": "270px",
                "height": "450px",
            });

            $("#myCarousel").css({
                "margin-top": "-450px"
            });

            $("#floatMsg").show();
            action = 1;
        }
    }

</script>

<script type="text/javascript">
    var tr;
    var tb;

    if (window.innerWidth >= 1700) {
        tr = 0.2 * window.innerWidth;
        tb = 0.2 * window.innerHeight;
    } else if (window.innerWidth >= 1200) {
        tr = 0.15 * window.innerWidth;
        tb = 0.2 * window.innerHeight;
    } else {
        tr = 0.1 * window.innerWidth;
        tb = 0.25 * window.innerHeight;
    }

    floatingMenu.add('floatdiv',
            {
                // Represents distance from left or right browser window  
                // border depending upon property used. Only one should be  
                // specified.  
                // targetLeft: 0,  
                targetRight: tr,
                // Represents distance from top or bottom browser window  
                // border depending upon property used. Only one should be  
                // specified.  
//                        targetTop: 50,
                targetBottom: tb,
                // Uncomment one of those if you need centering on  
                // X- or Y- axis.  
                // centerX: true,  
                // centerY: true,  

                // Remove this one if you don't want snap effect  
                snap: true
            });
</script> 