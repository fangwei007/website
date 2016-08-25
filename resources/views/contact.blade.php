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
    <div class="container page-container" style="min-height: 650px">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">联系我们
                    <!--<small>Subheading</small>-->
                </h1>
                <ol class="breadcrumb">
                    <li><a href="/">首 页</a>
                    </li>
                    <li class="active">联系我们</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-md-8" style="padding-left: 15px; padding-right: 15px;">
                <img class="img-responsive" src="/images/contact.jpg" alt="">
                <!-- Embedded Google Map -->
                <!--<iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3669.1237582994254!2d113.26318421344153!3d23.129151220449753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x0a9295165f14a06d!2sGuangzhou+Center!5e0!3m2!1sen!2sus!4v1466024920935"></iframe>-->
            </div>
            <!-- Contact Details Column -->
            <div class="col-md-4">
                <h3>联系方式</h3>
                <p>
                    广东康盛生物科技有限公司<br>
                </p>
                <p>
                    <i class="fa fa-phone"></i> 
                    <abbr title="Phone">电 话</abbr>: (020)83828799
                </p>
                <p>
                    <i class="fa fa-fax"></i> 
                    <abbr title="Fax">传 真</abbr>: (020)83828797
                </p>
                <p>
                    <i class="fa fa-envelope-o"></i> 
                    <abbr title="Email">电子邮件</abbr>: <a href="mailto:sunnytech@126.com">sunnytech@126.com</a>
                </p>
                <p><i class="fa fa-clock-o"></i> 
                    <abbr title="Hours">工作时间</abbr>: 星期一 至 星期五: 9:00 - 17:00</p>
                <ul class="list-unstyled list-inline list-social-icons">
                    <li>
                        <button class="btn-social" data-container="body" data-toggle="popover" data-placement="bottom" data-trigger="hover focus" data-html="true" data-content='<img src="/images/QR.png" width=80/>'><i class="fa fa-weibo fa-2x"></i></button>
                    </li>
                    <li>
                        <button class="btn-social" data-container="body" data-toggle="popover" data-placement="bottom" data-trigger="hover focus" data-html="true" data-content='<img src="/images/QR.png" width=80/>'><i class="fa fa-weixin fa-2x"></i></button>
                    </li>
                    <li>
                        <button class="btn-social" data-container="body" data-toggle="popover" data-placement="bottom" data-trigger="hover focus" data-html="true" data-content='<img src="/images/QR.png" width=80/>'><i class="fa fa-qq fa-2x"></i></button>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="row">
            <div class="col-md-8">
                <h3 class="page-header">在线留言</h3>
                @if (Session::has('contact-message'))
                <div class="alert alert-info">{{ Session::get('contact-message') }}</div>
                @endif
                <form method="post" action="{{ url('/contact') }}">
                    {!! csrf_field() !!}

                    <div class="control-group form-group{{ $errors->has('contact-name') ? ' has-error' : '' }}">
                        <div class="row">
                            <label class="col-sm-2 control-label required">您的姓名：</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="contact-name" placeholder="请输入您的姓名" value="{{ old('contact-name') }}">
                            </div>

                            @if ($errors->has('contact-name'))
                            <span class="help-block">
                                {{ $errors->first('contact-name') }}
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="control-group form-group{{ $errors->has('contact-phone') ? ' has-error' : '' }}">
                        <div class="row">
                            <label class="col-sm-2 control-label required">联系电话：</label>
                            <div class="col-sm-6">
                                <input type="tel" class="form-control" name="contact-phone" placeholder="请输入您的联系电话" value="{{ old('contact-phone') }}">
                            </div>

                            @if ($errors->has('contact-phone'))
                            <span class="help-block">
                                {{ $errors->first('contact-phone') }}
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="control-group form-group{{ $errors->has('contact-email') ? ' has-error' : '' }}">
                        <div class="row">
                            <label class="col-sm-2 control-label required">邮箱地址：</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" name="contact-email" placeholder="请输入您的邮箱地址" value="{{ old('contact-email') }}">
                            </div>

                            @if ($errors->has('contact-email'))
                            <span class="help-block">
                                {{ $errors->first('contact-email') }}
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="control-group form-group{{ $errors->has('contact-message') ? ' has-error' : '' }}">
                        <div class="row">
                            <label class="col-sm-2 control-label required">留言内容：</label>
                            <div class="col-sm-8">
                                <textarea placeholder="请输入您的留言内容" rows="10" cols="100" class="form-control" name="contact-message" maxlength="999" style="resize:none">{{ old('contact-message') }}</textarea>
                            </div>

                            @if ($errors->has('contact-message'))
                            <span class="help-block">
                                {{ $errors->first('contact-message') }}
                            </span>
                            @endif
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary">发送留言</button>
                </form>
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