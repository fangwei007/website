@extends('layouts.layout')

@section('content')

<!-- Page Content -->
<div class="container page-container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> 仪器设备
                <small>{{ $item->name }} </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/">首 页</a></li>
                <li><a href="/items">仪器设备</a></li>
                <li class="active">{{ $item->name }}</li>
                @if (Auth::user()->role == 'V')
                <a class="pull-right" href="/items/{{ $item->id }}/edit"> <i class="fa fa-pencil"></i>编辑此仪器 </a>
                @endif
            </ol>

        </div>
    </div>
    <!-- /.row -->

    <!-- Portfolio Item Row -->
    <div class="row">

        <div class="col-md-8">
            <img class="img-responsive" src="{{ $item->image }}" />
        </div>

        <div class="col-md-4">
            <h3>仪器型号</h3>
            <p>{{ $item->name }}</p>
            <h3>仪器介绍</h3>
            <p>{{ $item->introduction }}</p>
            <h3>详细参数</h3>
            <ul style="margin-left: -20px">
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

                <div class="col-sm-3 col-xs-6">
                    <a href="/items/{{ $related_items->id }}">
                        <img class="img-responsive img-hover img-related" src="{{ $related_items->image }}" style="width: 262.5; height: 157.5 " alt="">
                    </a>
                </div>

        @endforeach

<!--        <div class="col-sm-3 col-xs-6">
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
        </div>-->
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->

@endsection
