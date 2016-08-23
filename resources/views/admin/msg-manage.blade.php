
@extends('layouts.admin')

@section('content')
<div id="wrapper">

    <!-- Navigation -->
    @include('admin.navbar')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header"><i class="fa fa-envelope-o"></i> 留言管理</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row"> 
                            <div class="col-sm-6">留言列表 </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="message-records">
                                <thead>
                                    <tr>
                                        <th class="col-lg-1 text-center">状 态</th>
                                        <th class="col-lg-1 text-center">操 作</th>
                                        <th class="col-lg-2 text-center" id="hide-when-700">姓 名</th>
                                        <th class="col-lg-2 text-center" id="hide-when-700">联系电话</th>
                                        <th class="col-lg-2 text-center" id="hide-when-1170">创建日期</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($msgs as $msg)
                                    <tr class="odd gradeX">
                                        <td class="text-center tooltip-demo">
                                            @if ($msg->status === 'O')
                                            <a href="/msg/{{$msg->id}}">未 读</a>
                                            @elseif ($msg->status === 'C')
                                            已 读
                                            @endif
                                        </td>
                                        <td class="text-center"><a href="/msg/{{$msg->id}}">查 看</a></td>
                                        <td class="text-center" id="hide-when-700">{{ $msg->name }}</td>
                                        <td class="text-center" id="hide-when-700">{{ $msg->phone }}</td>
                                        <td class="text-center" id="hide-when-1170">{{ $msg->created_at }}</td>
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