@extends('layouts.layout')

@section('content')

<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> 仪器设备
                <small>{{ $item->name }}</small>
                @if (Auth::user()->role == 'V')
                <a class="pull-right" href="/items/{{ $item->id }}/edit"><button type="button" class="btn btn-outline btn-info">编辑此仪器</button></a>
                @endif
            </h1>
            <ol class="breadcrumb">
                <li><a href="/">首 页</a>
                </li>
                <li class="active"> 仪器设备</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Portfolio Item Row -->
    <div class="row">

        <div class="col-md-8">
<!--            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                 Indicators 
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                 Wrapper for slides 
                <div class="carousel-inner">
                    <div class="item active">
                        <img class="img-responsive" src="http://placehold.it/750x500" alt="">
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="http://placehold.it/750x500" alt="">
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="http://placehold.it/750x500" alt="">
                    </div>
                </div>

                 Controls 
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>-->
            <img class="img-responsive" src="{{ $item->image }}" />
        </div>

        <div class="col-md-4">
            <h3>仪器介绍</h3>
            <p>{{ $item->introduction }}</p>
            <h3>详细参数</h3>
            <ul>
                <li>Lorem Ipsum</li>
                <li>Dolor Sit Amet</li>
                <li>Consectetur</li>
                <li>Adipiscing Elit</li>
            </ul>
        </div>

    </div>
    <!-- /.row -->

    <!-- Related Projects Row -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">类似的仪器设备</h3>
        </div>
        @foreach ($related_items as $related_items)
        
<!--        <div class="col-sm-3 col-xs-6">
            <a href="/items/{{ $related_items->id }}">
                <img class="img-responsive img-hover img-related" src="{{ $related_items->image }}" style="width: 262.5; height: 157.5 " alt="">
            </a>
        </div>-->
        
        @endforeach

        <div class="col-sm-3 col-xs-6">
            <a href="#">
                <img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">
            </a>
        </div>
        
        <div class="col-sm-3 col-xs-6">
            <a href="#">
                <img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">
            </a>
        </div>

        <div class="col-sm-3 col-xs-6">
            <a href="#">
                <img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">
            </a>
        </div>

        <div class="col-sm-3 col-xs-6">
            <a href="#">
                <img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">
            </a>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->

@endsection
