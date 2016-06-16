@extends('layouts.admin')

@section('content')
<div id="wrapper">

    <!-- Navigation -->
    @include('admin.navbar')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header"><i class="fa fa-gear"></i> 设备管理</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-lg-12">
                                <label>添加新器材</label>
                                <a href="/item-manage" class="pull-right"><i class="fa fa-gears"></i> 返回列表</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="{{ url('/items') }}" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <label>器材型号</label>
                                <input class="form-control" type="text" name="item-name" value="{{ old('item-name') }}" />
                            </div>

                            <div class="form-group">
                                <label>器材简介</label>
                                <textarea class="form-control" name="item-introduction" rows="15">{{ old('item-introduction') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>器材图片</label><br>
                                <input type="file" name='item-image'>
                            </div>

                            <button type="submit" class="btn btn-primary">添 加</button>
                            &nbsp;
                            <button type="reset" class="btn btn-warning">重 置</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
@endsection
