
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
        <div class="alert alert-info">{{ Session::get('message') }} <strong><i>{{ Session::get('newUser') }} </i></strong></div>
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
                                        <th>电子邮箱</th>
                                        <th>用户权限</th>
                                        <th id="hide-when-500">删除日期</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <?php if (Auth::user()->id == $user->id) continue; ?>
                                    <tr class="odd gradeX">
                                        <td class="text-center tooltip-demo">
                                            <div class="row">
                                                <a href="/trash/user/{{ $user->id }}/restore"  data-toggle="tooltip" data-placement="top" title="" data-original-title="还 原" onclick="return confirm('确认还原吗？');"><i class="fa fa-refresh"></i></a>&nbsp;
                                                <a href='/trash/user/{{ $user->id }}/perm-delete'  data-toggle="tooltip" data-placement="top" title="" data-original-title="永久删除" onclick="return confirm('确认永久刪除吗？');"><i class="fa fa-times-circle"></i></a>
                                            </div>
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="center">
                                            @if ($user->role === 'N')
                                            未认证
                                            @elseif ($user->role === 'A')
                                            认证会员
                                            @elseif ($user->role === 'V')
                                            管理员
                                            @endif
                                        </td>
                                        <td id="hide-when-500">{{ $user->deleted_at }}</td>
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
        <div class="alert alert-info">{{ Session::get('messageItem') }} <strong><i>{{ Session::get('newItem') }} </i></strong></div>
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
                                        <th id="hide-when-500">器材简介</th>
                                        <th id="hide-when-500">器材图片</th>
                                        <th>删除日期</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                    <tr class="odd gradeX">
                                        <td class="text-center tooltip-demo">
                                            <div class="row">
                                                <a data-toggle="tooltip" data-placement="top" title="" data-original-title="还 原"><i class="fa fa-refresh" data-toggle="modal" data-target="#confirm-restore" data-href="/trash/item/{{ $item->id }}/restore"></i></a>
                                                &nbsp;
                                                <a data-toggle="tooltip" data-placement="top" title="" data-original-title="永久删除"><i class="fa fa-times-circle" data-toggle="modal" data-target="#confirm-perm-delete" data-href="/trash/item/{{ $item->id }}/perm-delete"></i></a>
                                                <!--<a href='/trash/item/{{ $item->id }}/perm-delete' data-toggle="tooltip" data-placement="top" title="" data-original-title="永久删除" onclick="return confirm('确认永久刪除吗？');"><i class="fa fa-times-circle"></i></a>-->
                                            </div>
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td id="hide-when-500"">{{ $item->introduction }}</td>
                                        <td id="hide-when-500"><img class="img-thumbnail" style="max-height: 100px; max-width: 100px;" src="{{ $item->image }}"/></td>
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