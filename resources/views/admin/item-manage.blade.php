
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
        <div class="alert alert-info">{{ Session::get('messageItem') }} <strong><i>{{ Session::get('itemName') }} </i></strong></div>
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
                                        <th class="col-lg-2">操 作</th>
                                        <th class="col-lg-2">器材型号</th>
                                        <th class="col-lg-3" id="hide-when-1170">器材简介</th>
                                        <th class="col-lg-2" id="hide-when-700">器材图片</th>
                                        <th class="col-lg-2" id="hide-when-1170">入库日期</th>
                                        <th class="col-lg-1" id="hide-when-360">效果预览</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                    <tr class="odd gradeX">
                                        <td class="text-center tooltip-demo">
                                            <div class="row">
                                                <a href="/items/{{ $item->id }}/edit" data-toggle="tooltip" data-placement="top" title="" data-original-title="编 辑"><i class="fa fa-pencil fa-1x"></i></a>&nbsp;
                                                <a data-toggle="tooltip" data-placement="top" title="" data-original-title="删 除"><i class="fa fa-minus-circle fa-1x" data-toggle="modal" data-target="#confirm-delete" data-href="/items/{{ $item->id }}/delete"></i></a>
                                            </div>
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td id="hide-when-1170">{{ $item->introduction }}</td>
                                        <td id="hide-when-700"><img class="img-thumbnail" style="max-height: 80px; max-width: 80px;" src="{{ $item->image }}"/></td>
                                        <td id="hide-when-1170">{{ $item->created_at }}</td>
                                        <td id="hide-when-360"><a href="/items/{{ $item->id }}" target="_blank"><button type="button" class="btn btn-outline btn-primary">预 览</button></a></td>
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