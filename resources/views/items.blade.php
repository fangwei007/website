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
        @for ($i = 0; $i < 3; $i++)
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
    <!-- /.row -->

    <!-- Projects Row -->
    <div class="row">
        @for ($i = 3; $i < 6; $i++)
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

    <!-- Projects Row -->
    <div class="row">
        @for ($i = 6; $i < 9; $i++)
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
    <!-- /.row -->

    <hr>

    <!-- Pagination -->
    <div class="row text-center">
        <div class="col-lg-12">
            <ul class="pagination">
                <li>
                    <a href="#">&laquo;</a>
                </li>
                <li class="active">
                    <a href="#">1</a>
                </li>
                <li>
                    <a href="#">2</a>
                </li>
                <li>
                    <a href="#">3</a>
                </li>
                <li>
                    <a href="#">4</a>
                </li>
                <li>
                    <a href="#">5</a>
                </li>
                <li>
                    <a href="#">&raquo;</a>
                </li>
            </ul>
        </div>
    </div>
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