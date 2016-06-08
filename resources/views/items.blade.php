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
    <?php $nums = count($items); ?>
    @for ($j = 0; $j < ceil($nums / 3); $j++)
    <div class="row">
        @for ($i = 0; $i < 3 && $i < $nums; $i++, $nums--)
        <div class="col-md-4 img-portfolio">
            <a href="/item">
                <img class="img-responsive img-hover" src="http://placehold.it/700x400" alt="">
            </a>
            {{ $items[$i]['image'] }}
            <h3>
                <a href="/item">{{ $items[$i]['name'] }}</a>
            </h3>
            <p>{{ $items[$i]['introduction'] }}</p>
        </div>
        @endfor
    </div>
    @endfor
    <!-- /.row -->
    <hr>

    <!-- Pagination -->
    @include('pagination.default', ['paginator' => $items])
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
        </div>
    </footer>

</div>
<!-- /.container -->


@endsection