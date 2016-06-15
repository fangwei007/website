
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
                            <div class="col-sm-2">被删除的用户 </div>
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
                                        <th>创建日期</th>
                                        <th>注销日期</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <?php if (Auth::user()->id == $user->id) continue; ?>
                                    <tr class="odd gradeX">
                                        <td class="text-center">
                                            <a href="/trash/user/{{ $user->id }}/restore"><i class="fa fa-repeat"></i></a>&nbsp;
                                            <a href='/trash/user/{{ $user->id }}/perm-delete'><i class="fa fa-times"></i></a>
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
                                        <td>{{ $user->created_at }}</td>
                                        <td class="center"><?php echo $user->deleted_at == NULL ? "无" : $user->deleted_at; ?></td>
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
                            <div class="col-sm-2">被删除的仪器设备 </div>
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
                                        <th>器材简介</th>
                                        <th>器材图片</th>
                                        <th>入库日期</th>
                                        <th>注销日期</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                    <tr class="odd gradeX">
                                        <td class="text-center col-sm-1">
                                            <a href="/trash/item/{{ $item->id }}/restore"><i class="fa fa-repeat"></i></a>&nbsp;
                                            <a href='/trash/item/{{ $item->id }}/perm-delete'><i class="fa fa-times"></i></a>
                                        </td>
                                        <td class="col-sm-2">{{ $item->name }}</td>
                                        <td class="col-sm-4">{{ $item->introduction }}</td>
                                        <td class="center col-sm-1"><img class="img-thumbnail" style="max-height: 100px; max-width: 100px;" src="{{ $item->image }}"/></td>
                                        <td class="col-sm-2">{{ $item->created_at }}</td>
                                        <td class="center col-sm-1"><?php echo $item->deleted_at == NULL ? "无" : $item->deleted_at; ?></td>
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