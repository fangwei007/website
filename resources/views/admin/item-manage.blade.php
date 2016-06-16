
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
        @if (Session::has('messageItem'))
        <div class="alert alert-info">{{ Session::get('messageItem') }} <strong><i>{{ Session::get('newItem') }} </i></strong></div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row"> 
                            <div class="col-sm-6">仪器设备记录表 <a href="/items/create"><i class="fa fa-plus-square"></i></a></div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="item-records">
                                <thead>
                                    <tr>
                                        <th>操 作</th>
                                        <th>器材型号</th>
                                        <th id="hide-when-500">器材简介</th>
                                        <th>器材图片</th>
                                        <th id="hide-when-500">入库日期</th>
                                        <th id="hide-when-360">效果预览</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                    <tr class="odd gradeX">
                                        <td class="text-center tooltip-demo">
                                            <div class="row">
                                                <a href="/items/{{ $item->id }}/edit" data-toggle="tooltip" data-placement="top" title="" data-original-title="编 辑"><i class="fa fa-pencil"></i></a>&nbsp;
                                                <a href='/items/{{ $item->id }}/delete' data-toggle="tooltip" data-placement="top" title="" data-original-title="删 除" onclick="return confirm('确认放入回收站吗？');"><i class="fa fa-minus-circle"></i></a>
                                            </div>
                                        </td>
                                        <td class="col-sm-2">{{ $item->name }}</td>
                                        <td id="hide-when-500" class="col-sm-4">{{ $item->introduction }}</td>
                                        <td class="center col-sm-1"><img class="img-thumbnail" style="max-height: 100px; max-width: 100px;" src="{{ $item->image }}"/></td>
                                        <td id="hide-when-500" class="col-sm-2">{{ $item->created_at }}</td>
                                        <td id="hide-when-360" class="center col-sm-1"><a href="/items/{{ $item->id }}" target="_blank"><button type="button" class="btn btn-outline btn-primary">预 览</button></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
@endsection