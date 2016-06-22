@extends('layouts.layout')

@section('content')

<!-- Page Content -->
<div class="container page-container">

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
            <div class="col-md-4" style="padding: 15px; margin-bottom: 30px;">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="搜索仪器" name="q">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
                <!-- /.input-group -->
            </div>
        </form>
    </div>

    @if (count($items) > 0)
    <!-- Projects Row -->
    <div class="row">
        @foreach ($items as $item)
        <div class="img-portfolio col-md-4 col-sm-6 col-xs-12">
            <div class="hovereffect">
                <img class="img-responsive" src="{{ $item->image }}" alt="">
                <div class="overlay">
                    <a href="/items/{{ $item->id }}">
                        <h2>型号：{{ $item->name }}</h2>
                        <p>简介：{{ $item->introduction }}</p>
                    </a>
                </div>

            </div>
        </div>
        @endforeach
    </div>
    <!-- /.row -->
    @if($items->total() > 6) <hr> @endif

    <!-- Pagination -->
    @include('pagination.default', ['paginator' => $items])
    <!-- /.row -->
    @else 
    <div class="row">
        <div class="col-md-4 img-portfolio">
            <p><i class="fa fa-warning"></i> 对不起，没有相关仪器或设备！</p>
        </div>
    </div>
    @endif
</div>
<!-- /.container -->


@endsection