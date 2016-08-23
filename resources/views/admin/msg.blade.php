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
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-lg-12">
                                <label>查看留言信息</label>
                                <a href="/msg-manage" class="pull-right"><i class="fa fa-envelope-o"></i> 返回列表</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form  class="form-horizontal" role="form" method="post" action="{{ url('/msg/' . $msg->id) }}">
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <label class="col-lg-2 control-label">姓 名:</label>
                                <label class="radio-inline text-primary">{{ $msg->name }}</label>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">联系电话:</label>
                                <label class="radio-inline text-primary">{{ $msg->phone }}</label>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">电子邮箱:</label>
                                <label class="radio-inline text-primary">{{ $msg->email }}</label>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">留言内容:</label>
                                <div class="col-md-12 text-left"><label class="radio-inline">{{ $msg->message }}</label></div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">发送时间:</label>
                                <label class="radio-inline">{{ $msg->created_at }}</label>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">标记为:</label>
                                <label class="col-lg-1 control-label"></label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" id="radio2" value="O" <?php echo $msg->status == 'O' ? 'checked' : '' ?>>未 读
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" id="radio3" value="C" <?php echo $msg->status == 'C' ? 'checked' : '' ?>>已 读
                                </label>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label"></label>
                                <button type="submit" class="btn btn-primary">更新留言状态</button>
                            </div>
                        </form>
                        <div class="col-lg-8">
                            <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#confirm-delete" data-href="/msg/{{ $msg->id }}/delete" style="margin-top: -49px">放入回收站</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
@endsection
