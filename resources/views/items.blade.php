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
        <div class="col-md-4 img-portfolio">
            <a href="/items/{{ $item->id }}">
                <!--<img class="img-responsive img-hover" src="http://placehold.it/700x400" alt="">-->
                <img class="img-responsive img-hover" src="{{ $item->image }}" alt="">
            </a>

            <h3>
                <a href="/items/{{ $item->id }}">{{ $item->name }}</a>
            </h3>
            <p>{{ $item->introduction }}</p>
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