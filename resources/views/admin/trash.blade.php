
@extends('layouts.admin')

@section('content')
<div id="wrapper">

    <!-- Navigation -->
    @include('admin.navbar')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header"><i class="fa fa-trash-o"></i> 回收站</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        被删除的项目
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#user" data-toggle="tab"><i class="fa fa-user"></i> 用 户</a>
                            </li>
                            <li><a href="#item" data-toggle="tab"><i class="fa fa-gear"></i> 设 备</a>
                            </li>
                            <li><a href="#messages" data-toggle="tab"><i class="fa fa-envelope"></i> 留 言</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="user">
                                <div class="row" style="margin-top: 30px;">
                                    <div class="col-lg-12">
                                        @if (Session::has('message'))
                                        <div class="alert alert-info">{{ Session::get('message') }} <strong><i>{{ Session::get('userName') }} </i></strong></div>
                                        @endif
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="dataTable_wrapper">
                                                    <table class="table table-striped table-bordered table-hover" id="user-records">
                                                        <thead>
                                                            <tr>
                                                                <th style="min-width: 50px;">操 作</th>
                                                                <th>用户名</th>
                                                                <th id="hide-when-1170">电子邮箱</th>
                                                                <th id="hide-when-1170">用户权限</th>
                                                                <th id="hide-when-360">删除日期</th>
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
                                                                <td class="center" id="hide-when-1170">
                                                                    @if ($user->role === 'N')
                                                                    未认证
                                                                    @elseif ($user->role === 'A')
                                                                    认证会员
                                                                    @elseif ($user->role === 'V')
                                                                    管理员
                                                                    @endif
                                                                </td>
                                                                <td id="hide-when-360">{{ $user->deleted_at }}</td>
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

                            <div class="tab-pane fade" id="item">
                                <div class="row" style="margin-top: 30px;">
                                    <div class="col-lg-12">
                                        @if (Session::has('messageItem'))
                                        <div class="alert alert-info">{{ Session::get('messageItem') }} <strong><i>{{ Session::get('itemName') }} </i></strong></div>
                                        @endif
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="dataTable_wrapper">
                                                    <table class="table table-striped table-bordered table-hover" id="item-records">
                                                        <thead>
                                                            <tr>
                                                                <th class="col-md-2" style="min-width: 50px;">操 作</th>
                                                                <th class="col-md-1">器材型号</th>
                                                                <th class="col-md-2" id="hide-when-1170">器材简介</th>
                                                                <th class="col-md-1" id="hide-when-1170">器材图片</th>
                                                                <th class="col-md-2" id="hide-when-360">删除日期</th>
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
                                                                <td id="hide-when-1170"><?php echo $short_string = (strlen($item->introduction) > 300) ? mb_substr($item->introduction, 0, 80, 'UTF-8') . ' ...' : $item->introduction; ?></td>
                                                                <td id="hide-when-1170"><img class="img-thumbnail" style="max-height: 80px; max-width: 80px;" src="{{ $item->image }}"/></td>
                                                                <td id="hide-when-360">{{ $item->deleted_at }}</td>
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

                            <div class="tab-pane fade" id="messages">
                                <div class="row" style="margin-top: 30px;">
                                    <div class="col-lg-12">
                                        @if (Session::has('message'))
                                        <div class="alert alert-info"><strong>{{ Session::get('messageMsg') }} </strong></div>
                                        @endif
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="dataTable_wrapper">
                                                    <table class="table table-striped table-bordered table-hover" id="message-records">
                                                        <thead>
                                                            <tr>
                                                                <th class="col-lg-1">操 作</th>
                                                                <th class="col-lg-1">姓 名</th>
                                                                <th class="col-lg-2" id="hide-when-700">联系电话</th>
                                                                <th class="col-lg-2" id="hide-when-700">电子邮件</th>
                                                                <th class="col-lg-2" id="hide-when-1170">创建日期</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($msgs as $msg)
                                                            <tr class="odd gradeX">
                                                                <td class="text-center tooltip-demo">
                                                                    <div class="row">
                                                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="还 原"><i class="fa fa-refresh fa-1x" data-toggle="modal" data-target="#confirm-restore" data-href="/trash/msg/{{ $msg->id }}/restore"></i></a>
                                                                    </div>
                                                                </td>
                                                                <td>{{ $msg->name }}</td>
                                                                <td id="hide-when-700">{{ $msg->phone }}</td>
                                                                <td id="hide-when-700">{{ $msg->email }}</td>
                                                                <td id="hide-when-1170">{{ $msg->created_at }}</td>
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
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
@endsection