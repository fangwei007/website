
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
                                        <th class="col-lg-1 text-center" style="min-width: 50px;">操 作</th>
                                        <th class="col-lg-1 text-center">用户名</th>
                                        <th class="col-lg-2 text-center" id="hide-when-700">电子邮箱</th>
                                        <th class="col-lg-2 text-center">用户权限</th>
                                        <th class="col-lg-2 text-center" id="hide-when-1170">创建日期</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <?php if (Auth::user()->id == $user->id) continue; ?>
                                    <tr class="odd gradeX">
                                        <td class="text-center tooltip-demo">
                                            <div class="row">
                                                <a href="/admin/{{ $user->id }}/edit" data-toggle="tooltip" data-placement="top" title="" data-original-title="编 辑"><i class="fa fa-pencil fa-1x"></i></a>&nbsp;
                                                <a data-toggle="tooltip" data-placement="top" title="" data-original-title="删 除"><i class="fa fa-minus-circle fa-1x" data-toggle="modal" data-target="#confirm-delete" data-href="/admin/{{ $user->id }}/delete"></i></a>
                                            </div>
                                        </td>
                                        <td class="text-center">{{ $user->name }}</td>
                                        <td class="text-center" id="hide-when-700">{{ $user->email }}</td>
                                        <td class="text-center">
                                            @if ($user->role === 'N')
                                            未认证
                                            @elseif ($user->role === 'A')
                                            认证会员
                                            @elseif ($user->role === 'V')
                                            管理员
                                            @endif
                                        </td>
                                        <td class="text-center" id="hide-when-1170">{{ $user->created_at }}</td>
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