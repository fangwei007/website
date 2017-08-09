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
//    $html = Illuminate\Support\Facades\Redis::get($keyword_webpage);
    $html = __c("files")->get($keyword_webpage);
}

if ($html == null) :
    ob_start();
    ?>
    @extends('layouts.layout')

    @section('content')

    @include('floatWindow')
    <!-- Page Content -->
    <div class="container page-container">
        <?php
        $request = Request();
        $lang = $request->route()->getPrefix();
        $prefix = $lang == NULL ? '' : '/en';
        ?>
        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header"><?php echo $lang == NULL ? "代理包括" : "Cooperative Agents"; ?></h2>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-medkit"></i> <?php echo $lang == NULL ? "德国 Pro-Med(貝鎂) 独家代理" : "Pro-Med"; ?> </h4>
                    </div>
                    <div class="panel-body">
                        <div class="panel-300">
                            @if ($lang == NULL)
                            <p style="text-indent:2em;">坐落在全球著名手术器械生产研发集散地: 德国图特林根的德国Pro-Med器械公司是以EN ISO9001及EN46001为标准的外科手术器械制造商，100%德国制造。</p>
                            <p style="text-indent:2em;">为世界各地用户奉献我们在外科手术器械行业近40年的专业知识和技能。</p>
                            <p style="text-indent:2em;">以优质的产品和可信赖的服务与我们的客户建立长久的联系。</p>
                            <p style="text-indent:2em;">缩短新产品从研发到上市的周期。</p>
                            <p style="text-indent:2em;">通过创新提供最优质的产品和最有效的成本控制。</p>
                            @else
                            <p style="text-indent:2em;">Located in Tuttlingen, the world center for surgical instrument Pro-Med is a family-owned EN ISO 9001/EN 46001 certified manufacturer/distributor of fine surgical instruments and appliances-found in 1978.</p>
                            <p style="text-indent:2em;">Pro-Med offers the customers in worldwide their expertise and skill of nearly 40 years experience in the field of surgical instrument.</p>
                            <p style="text-indent:2em;">Pro-Med wants to build long term relationship with customers with a qualified and reliable service.</p>
                            @endif
                        </div>
                        <a href="{{ $prefix . "/items?company=Germany" }}" class="btn btn-default"><?php echo $lang == NULL ? "了解更多" : "Learn more"; ?></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-eye"></i> <?php echo $lang == NULL ? "美国 SurgiTel" : "SurgiTel"; ?> </h4>
                    </div>
                    <div class="panel-body" style="height: auto">
                        <div class="panel-300">
                            @if ($lang == NULL)
                            <p style="text-indent:2em;">美国通用科学公司（GSC）是有八十余年历史，从事光学产品研究、开发、生发的专业公司，其产品广泛涉及机械、航天、航空、军事、电子等行业。在研究人体工程学进展中，为了避免手术医生在长时间手术中产生的眼睛疲劳和手术操作引起的颈肩疼痛，研究生产了专门用于手术者的SurgiTel系列手术放大镜、手术头灯及外科手术摄像系统。
                                通过十多年来几万名临床手术医生的使用，获得了手术医生的高度评价，并连续若干年被美国评为优质产品，获得美国人体工程学设计优秀奖。SurgiTel系列产品现已行销世界八十多个国家和地区。</p>
                            @else
                            <p style="text-indent:2em;">
                                SurgiTel is a Division of General Scientific Corporation (GSC). 
                                GSC has been making a variety of optical components and optical imaging equipment since 1932. 
                                Towards clients SurgiTel strive to enhance the clients health through providing the best products which support the best working posture and comfort, alleviating all too common neck & back strains and helping them provide their patients with the best care.</p>@endif
                        </div>
                        <a href="{{ $prefix . "/items?company=USA" }}" class="btn btn-default"><?php echo $lang == NULL ? "了解更多" : "Learn more"; ?></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-flask"></i> <?php echo $lang == NULL ? "诊断试剂" : "Diagnosis Reagents"; ?> </h4>
                    </div>
                    <div class="panel-body">
                        <div class="panel-300">
                            @if ($lang == NULL)
                            <p style="text-indent:2em;">为广大的临床医学实验室及科研实验室提供国内及国际最尖端的检验技术及产品：</p>
                            <p style="text-indent:2em;">- 分子生物学实验室的病毒核酸检测；</p>
                            <p style="text-indent:2em;">- 感染性疾病检测；</p>
                            <p style="text-indent:2em;">- 肿瘤基因突变；</p>
                            <p style="text-indent:2em;">- 耐药基因突变及优生优育检测等项目；</p>
                            <p style="text-indent:2em;">- 临床输血基因分型、器官移植、骨髓移植基因配型和临床研究用分子生物学相关项目；</p>
                            <p style="text-indent:2em;">- 移植免疫药物浓度监测及临床生化试剂等项目；</p>
                            @else
                            <p style="text-indent:2em;">We act as distributors for following diagnostic products in clinic medical labs and research center.</p>
                            <p style="text-indent:2em;">- Regent kits for viral nucleic acid detection in laboratory of molecular biology</p>
                            <p style="text-indent:2em;">- Real Time PCR diagnostic kits for infectious diseases, genetic diseases and tumors</p>
                            <p style="text-indent:2em;">- FISH for fusion gene detection</p>
                            <p style="text-indent:2em;">- HLA-typing kits for transplantation of organ, bone marrow and clinic research</p>
                            <!--<p style="text-indent:2em;">- Immune drug monitoring kits for organ transplantation</p>-->
                            @endif
                        </div>
                        <a href="{{ $prefix . "/items?company=other" }}" class="btn btn-default"><?php echo $lang == NULL ? "了解更多" : "Learn more"; ?></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Section -->
        <link href="/css/home-effects.css" rel="stylesheet">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header"><?php echo $lang == NULL ? "产品介绍" : "Products Introduction"; ?></h2>
            </div>
            <div class="img-portfolio col-md-4 col-sm-6 col-xs-12">
                <div class="hovereffect">
                    <img class="img-responsive" src="/images/display1.jpg" alt="">
                    <div class="overlay">
                        <h2><?php echo $lang == NULL ? "配套齐全的手术器械" : "Complete range of surgical instruments"; ?></h2>
                    </div>
                </div>
            </div>

            <div class="img-portfolio col-md-4 col-sm-6 col-xs-12">
                <div class="hovereffect">
                    <img class="img-responsive" src="/images/display2-3.jpg" alt="">
                    <div class="overlay">
                        <h2><?php echo $lang == NULL ? "各种放大倍数的精美手术放大镜" : "A variety of optical components and imaging equipments"; ?></h2>
                    </div>
                </div>
            </div>

            <div class="img-portfolio col-md-4 col-sm-6 col-xs-12">
                <div class="hovereffect">
                    <img class="img-responsive" src="/images/display3-3.jpg" alt="">
                    <div class="overlay">
                        <h2><?php echo $lang == NULL ? "最尖端的检验技术和诊断试剂" : "Sophisticated inspection techniques and diagnostic reagents"; ?></h2>
                    </div>
                </div>
            </div>
            <div class="img-portfolio col-md-4 col-sm-6 col-xs-12">
                <div class="hovereffect">
                    <img class="img-responsive" src="/images/display4.jpg" alt="">
                    <div class="overlay">
                        <h2><?php echo $lang == NULL ? "经严格验证的高品质产品" : "Strictly proven high quality products"; ?></h2>
                    </div>
                </div>
            </div>

            <div class="img-portfolio col-md-4 col-sm-6 col-xs-12">
                <div class="hovereffect">
                    <img class="img-responsive" src="/images/display5-2.jpg" alt="">
                    <div class="overlay">
                        <h2><?php echo $lang == NULL ? "与手术放大镜共轴的头灯摄像系统" : "Surgical magnifier"; ?></h2>
                    </div>
                </div>
            </div>

            <div class="img-portfolio col-md-4 col-sm-6 col-xs-12">
                <div class="hovereffect">
                    <img class="img-responsive" src="/images/display6-3.jpg" alt="">
                    <div class="overlay">
                        <h2><?php echo $lang == NULL ? "显微镜下实验结果" : "Accurate test results under microscope"; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header"><?php echo $lang == NULL ? "公司简介" : "About Company"; ?></h2>
            </div>
            @if ($lang == NULL)
            <div class="col-md-6" style="text-indent:2em;">
                <p>广东康盛生物科技有限公司创建于2003年12月，是经过广东省工商行政管理局及广东省食品药品监督局正式批准注册的集生物技术产品及医疗产品推广、应用、销售和服务于一身的专业化公司。</p>
                <p>我们是德国Pro-Med Instrumente GmbH 外科手术器械及显微器械产品在中国地区的唯一总代理。</p>
                <p>我们是美国GSC公司SurgiTel手术放大镜、手术头灯及手术摄像系统产品在华中南区七省代理商。</p>
                <p>我们为客户提供如下诊断试剂：分子生物学实验室的病毒核酸检测、感染性疾病检测、肿瘤基因突变、耐药基因突变及优生优育检测等项目；荧光原位杂交FISH试剂；临床输血基因分型、器官移植、骨髓移植基因配型和临床研究用分子生物学相关项目；移植免疫药物浓度监测及临床生化试剂等项目。</p>
            </div>
            @else
            <div class="col-md-6" style="text-indent:2em;">
                <p>Established in end of 2003, Guangdong Sunny Technologies,Inc is professional company on promoting, selling and marketing of life science and medical products.  We have registered in Guangdong Provincial Administration for Industry and Guangdong Provincial Food and Drug Administration.</p>
                <p>Our mission is to provide high quality products and excellent services to medical organization.  Our people follows simple concept of "to do everything by heart" and let human being really get benefit from progress of high-tech through meticulous serve to our client.</p> 
                <p>We are sole distributor of surgical product for Pro-Med Instrumente GmbH in China.</p>
                <p>We sell and do promotion activities for SurgiTel products in south China (7 provinces).</p>
                <p>We provide following products for our clients: virus nucleic acid detection, detection of infection disease, FISH, cancer gene mutation, and resistant gene mutation, HLA genotyping, transplantation immunology drug monitoring.</p>
                </p>
            </div>
            @endif
            <div class="col-md-6">
                <img class="img-responsive" src="/images/index-rb2.jpg" alt="">
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                @if ($lang == NULL)
                <div class="col-md-8">
                    <p style="text-indent:2em;"><strong>致力于寻求技术领先、 质量上乘的医疗产品，并将之推广至医疗机构和广大患者，是公司始终秉承的信念和追求！</strong></p>
                </div>
                @else 
                <div class="col-md-8">
                    <p style="text-indent:2em;"><strong>We never stop to seeking innovative technology, high-quality health care products, and extended them to hospital and patients.</strong></p>
                </div>
                @endif
                <div class="col-md-4">
                    <a class="btn btn-lg btn-default btn-block" href="/contact"><?php echo $lang == NULL ? "联系我们" : "Contact us"; ?></a>
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
//    Illuminate\Support\Facades\Redis::setex($keyword_webpage, 60 * 30 * 60, $html);
endif;
echo $html;
?>