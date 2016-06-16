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
                                <label>更新器材信息</label>
                                <a href="/item-manage" class="pull-right"><i class="fa fa-gears"></i> 返回列表</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif
                        <form role="form" method="post" action="{{ url('/items/' . $item->id) }}" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <input type="hidden" name="_method" value="PUT">

                            <div class="form-group">
                                <label>器材型号</label>
                                <input class="form-control" type="text" name="item-name" value="{{ $item->name }}" />
                            </div>

                            <div class="form-group">
                                <label>器材简介</label>
                                <textarea class="form-control" name="item-introduction" rows="15">{{ $item->introduction }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>器材图片</label><br>
                                <img class="img-thumbnail" style="max-height: 300px; max-width: 300px;" src="{{ $item->image }}"/>
                                <p></p>
                                <input type="file" name='item-image'>
                            </div>

                            <div class="form-group">
                                <label class="control-label">添加时间 </label>
                                <label class="radio-inline text-primary">{{ $item->created_at }}</label>
                            </div>

                            <button type="submit" class="btn btn-primary">更 新</button>
                            
                        </form>
                        <div class="row" style="margin-top: -34px; margin-left: 70px">
                            <a href="/items/{{ $item->id }}"><button type="" class="btn btn-info">预 览</button></a>
                            &nbsp;
                            <button class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete" data-href="/items/{{ $item->id }}/delete?r=item">放入回收站</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
@endsection
