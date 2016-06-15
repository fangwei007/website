@extends('layouts.layout')

@section('content')

<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Three Column Portfolio
                <small>Subheading</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/">Home</a>
                </li>
                <li class="active">Three Column Portfolio</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

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
</div>
<!-- /.container -->


@endsection