
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
        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }} <strong><i>{{ Session::get('userName') }} </i></strong></div>
        @endif
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row"> 
                            <div class="col-sm-6">注册用户记录表 <a href="/admin/create"><i class="fa fa-plus-square"></i></a></div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="user-records">
                                <thead>
                                    <tr>
                                        <th class="col-lg-1">状 态</th>
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
                                            @if ($msg->status === 'O')
                                            未 读
                                            @elseif ($msg->status === 'C')
                                            已 读
                                            @endif
                                        </td>
                                        <td><a href="/msg/{{$msg->id}}">{{ $msg->name }}</a></td>
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
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
@endsection