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
        <?php
        $request = Request();
        $lang = $request->route()->getPrefix();
        $prefix = $lang == NULL ? '' : '/en';
        ?>
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $lang == NULL ? "公司信息" : "About Company"; ?></h1>
                <ol class="breadcrumb">
                    <li><a href="{{ $prefix . "/" }}"><?php echo $lang == NULL ? "首 页" : "Home"; ?></a>
                    </li>
                    <li class="active"><?php echo $lang == NULL ? "关于我们" : "About"; ?></li>
                </ol>
            </div>
        </div>

        <!-- Intro Content -->
        <div class="row">
            <div class="col-md-6" style=" margin-top: 20px;">
                <img class="img-responsive" src="/images/about-footer.jpg" alt="">
            </div>
            @if ($lang == NULL)
            <div class="col-md-6">
                <h2><?php echo $lang == NULL ? "公司简介" : "Company Introduction"; ?></h2>
                <p style="text-indent:2em;">广东康盛生物科技有限公司创建于2003年12月，是经过广东省工商行政管理局及广东省食品药品监督局正式批准注册的集生物技术产品及医疗产品推广、应用、销售和服务于一身的专业化公司。</p>
                <p style="text-indent:2em;">广东康盛生物科技有限公司以向医疗机构提供行业内顶级品牌的医疗器械产品为己任，康盛人以“认真做好每一件事” 的朴素理念让这些高端的医疗产品通过细致专业的服务使医疗机构及患者享受到高新技术的进步给人类带来的福祉。</p>
                <p style="text-indent:2em;">我们把专注的医学道德精神融汇于医疗产品技术推广的全过程，并以高素质专业化的理念建设公司队伍。公司不断提高人员素质赴生产厂家进行相应的产品培训，以获得最新技术和资讯与国际国内接轨。</p>
                <p style="text-indent:2em;">我们是德国Pro-Med Instrumente GmbH 外科手术器械及显微器械产品在中国地区的唯一总代理；我们是美国GSC公司SurgiTel手术放大镜、手术头灯及手术摄像系统产品在华中南区七省代理商；我们为客户提供如下诊断试剂：分子生物学实验室的病毒核酸检测、感染性疾病检测、肿瘤基因突变、耐药基因突变及优生优育检测等项目；荧光原位杂交FISH试剂；临床输血基因分型、器官移植、骨髓移植基因配型和临床研究用分子生物学相关项目；移植免疫药物浓度监测及临床生化试剂等项目。</p>
                <p style="text-indent:2em;">致力于寻求技术领先、 质量上乘的医疗产品，并将之推广至医疗机构和广大患者。公司自成立以来，这些信念和追求从未停止过…</p>
            </div>
            @else 
            <div class="col-md-6">
                <h2><?php echo $lang == NULL ? "公司简介" : "Company Introduction"; ?></h2>
                <p style="text-indent:2em;">Established in December, 2003, Guangdong Sunny Technologies Inc is a professional company on promoting, selling and marketing products of life science and medical.  We have registered both in Guangdong Provincial Administration for Industry and Guangdong Provincial Food and Drug Administration. </p>
                <p style="text-indent:2em;">Our mission is providing high quality products and excellent services to medical organizations. We follow one simple concept of "to do everything by heart" and let human beings really get benefit from progress of high-tech through meticulous service to our client.</p>
                <p style="text-indent:2em;">We are exclusive distributor of surgical product from Pro-Med Ithe onlynstrumente GmbH in China. We also sell and do promotion activities for SurgiTel products in south China (7 provinces). We provide following products for our clients: virus nucleic acid detection, detection of infection disease, FISH, cancer gene mutation, resistant gene mutation, HLA genotyping and transplantation immunology drug monitoring. </p>
                <p style="text-indent:2em;">We will never stop seeking innovative technologies, high-quality health care products and extending them to hospital and patients…</p>
            </div>
            @endif
        </div>
        <!-- /.row -->

        <!-- Team Members -->

        <!-- Our Customers -->
        <div class="row">
            <div class="col-md-12">
                <!--<img class="img-responsive" src="/images/about-head.jpg" alt="">-->
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