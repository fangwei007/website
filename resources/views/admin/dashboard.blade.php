
@extends('layouts.admin')

@section('content')
<div id="wrapper">

    <!-- Navigation -->
    @include('admin.navbar')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header"><i class="fa fa-users"></i> 用户管理</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row"> 
                            <div class="col-sm-2">注册用户记录表 <a href="/admin/create"><i class="fa fa-plus-square"></i></a></div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="user-records">
                                <thead>
                                    <tr>
                                        <th>用户名</th>
                                        <th>电子邮箱</th>
                                        <th>用户权限</th>
                                        <th>创建日期</th>
                                        <th>注销日期</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr class="odd gradeX">
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="center">{{ $user->role }}</td>
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
                <h2 class="page-header"><i class="fa fa-gears"></i> 设备管理</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row"> 
                            <div class="col-sm-2">仪器设备记录表 <a href="/items/create"><i class="fa fa-plus-square"></i></a></div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="item-records">
                                <thead>
                                    <tr>
                                        <th>仪器型号</th>
                                        <th>设备简介</th>
                                        <th>图 片</th>
                                        <th>入库日期</th>
                                        <th>注销日期</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                    <tr class="odd gradeX">
                                        <td><a href="/items/{{ $item->id }}/edit"><i class="fa fa-pencil"></i> {{ $item->name }}</a></td>
                                        <td>{{ $item->introduction }}</td>
                                        <td class="center">{{ substr(strrchr($item->image, "/"), 1) }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td class="center"><?php echo $item->deleted_at == NULL ? "无" : $item->deleted_at; ?></td>
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