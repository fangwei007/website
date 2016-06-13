@extends('layouts.admin')

@section('content')
<div id="wrapper">

    <!-- Navigation -->
    @include('admin.navbar')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header"><i class="fa fa-gears"></i> 设备管理</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>更新仪器信息</h2></div>
                    <div class="panel-body">
                        <form role="form" method="post" action="{{ url('/items/' . $item->id) }}" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <input type="hidden" name="_method" value="PUT">

                            <div class="form-group">
                                <label>仪器型号</label>
                                <input class="form-control" type="text" name="item-name" value="{{ $item->name }}" />
                            </div>

                            <div class="form-group">
                                <label>设备简介</label>
                                <textarea class="form-control" name="item-introduction" rows="15">{{ $item->introduction }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>图 片</label><br>
                                <img src="{{ $item->image }}"/>
                                <input type="file" name='item-image'>
                            </div>

                            <div class="form-group">
                                <label>入庫日期</label>
                                <p class="form-control-static">{{ $item->created_at }}</p>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" <?php if ($item->deleted_at !== NULL) echo "checked"; ?> name="item-delete" /> 放入回收站
                                </label>
                            </div>

                            <button type="submit" class="btn btn-default">更 新</button>
                            <button type="reset" class="btn btn-default">重 置</button>
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
