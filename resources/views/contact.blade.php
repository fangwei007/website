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
        <div class="col-md-8">
            <!-- Embedded Google Map -->
            <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3669.1237582994254!2d113.26318421344153!3d23.129151220449753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x0a9295165f14a06d!2sGuangzhou+Center!5e0!3m2!1sen!2sus!4v1466024920935"></iframe>
        </div>
        <!-- Contact Details Column -->
        <div class="col-md-4">
            <h3>联系方式</h3>
            <p>
                3481 Melrose Place<br>Beverly Hills, CA 90210<br>
            </p>
            <p><i class="fa fa-phone"></i> 
                <abbr title="Phone">移动电话</abbr>: (123) 456-7890</p>
            <p><i class="fa fa-envelope-o"></i> 
                <abbr title="Email">电子邮件</abbr>: <a href="mailto:name@example.com">name@example.com</a>
            </p>
            <p><i class="fa fa-clock-o"></i> 
                <abbr title="Hours">工作时间</abbr>: 星期一 至 星期五: 早上9:00 到 下午5:00</p>
            <ul class="list-unstyled list-inline list-social-icons">
                <li>
                    <a href="#"><i class="fa fa-weibo fa-2x"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-weixin fa-2x"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-qq fa-2x"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-apple fa-2x"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-windows fa-2x"></i></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /.row -->

    <!-- Contact Form -->
    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
<!--    <div class="row">
        <div class="col-md-8">
            <h3>Send us a Message</h3>
            <form name="sentMessage" id="contactForm" novalidate>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Full Name:</label>
                        <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Phone Number:</label>
                        <input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Email Address:</label>
                        <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Message:</label>
                        <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                    </div>
                </div>
                <div id="success"></div>
                 For success/fail messages 
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>

    </div>-->
    <!-- /.row -->
</div>
<!-- /.container -->

@endsection