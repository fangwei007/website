
@extends('layouts.admin')

@section('content')
<div id="wrapper">

    <!-- Navigation -->
    @include('admin.navbar')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header"><i class="fa fa-trash-o"></i> 用户回收站</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }} <strong><i>{{ Session::get('userName') }} </i></strong></div>
        @endif
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row"> 
                            <div class="col-sm-6">被删除的用户 </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="user-records">
                                <thead>
                                    <tr>
                                        <th>操 作</th>
                                        <th>用户名</th>
                                        <th id="hide-when-1170">电子邮箱</th>
                                        <th id="hide-when-700">用户权限</th>
                                        <th>删除日期</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <?php if (Auth::user()->id == $user->id) continue; ?>
                                    <tr class="odd gradeX">
                                        <td class="text-center tooltip-demo">
                                            <div class="row">
                                                <a data-toggle="tooltip" data-placement="top" title="" data-original-title="还 原"><i class="fa fa-refresh fa-1x" data-toggle="modal" data-target="#confirm-restore" data-href="/trash/user/{{ $user->id }}/restore"></i></a>&nbsp;
                                                <a data-toggle="tooltip" data-placement="top" title="" data-original-title="永久删除"><i class="fa fa-times-circle fa-1x" data-toggle="modal" data-target="#confirm-perm-delete" data-href="/trash/user/{{ $user->id }}/perm-delete"></i></a>
                                            </div>
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td id="hide-when-1170">{{ $user->email }}</td>
                                        <td class="center" id="hide-when-700">
                                            @if ($user->role === 'N')
                                            未认证
                                            @elseif ($user->role === 'A')
                                            认证会员
                                            @elseif ($user->role === 'V')
                                            管理员
                                            @endif
                                        </td>
                                        <td>{{ $user->deleted_at }}</td>
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
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header"><i class="fa fa-trash-o"></i> 设备回收站</h2>
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
                            <div class="col-sm-6">被删除的仪器设备 </div>
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
                                        <th id="hide-when-700">器材简介</th>
                                        <th id="hide-when-1170">器材图片</th>
                                        <th>删除日期</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                    <tr class="odd gradeX">
                                        <td class="text-center tooltip-demo">
                                            <div class="row">
                                                <a data-toggle="tooltip" data-placement="top" title="" data-original-title="还 原"><i class="fa fa-refresh fa-1x" data-toggle="modal" data-target="#confirm-restore" data-href="/trash/item/{{ $item->id }}/restore"></i></a>&nbsp;
                                                <a data-toggle="tooltip" data-placement="top" title="" data-original-title="永久删除"><i class="fa fa-times-circle fa-1x" data-toggle="modal" data-target="#confirm-perm-delete" data-href="/trash/item/{{ $item->id }}/perm-delete"></i></a>
                                            </div>
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td id="hide-when-700"">{{ $item->introduction }}</td>
                                        <td id="hide-when-1170"><img class="img-thumbnail" style="max-height: 80px; max-width: 80px;" src="{{ $item->image }}"/></td>
                                        <td>{{ $item->deleted_at }}</td>
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