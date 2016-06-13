@extends('layouts.admin')

@section('content')
<div id="wrapper">

    <!-- Navigation -->
    @include('admin.navbar')

    <div id="page-wrapper">
        <div class="col-lg-8">
            <div class="panel-heading"><h2>创建新用户</h2></div>
            <div class="panel-body">
                <div class="row">
                    <form  class="form-horizontal" role="form" method="post" action="{{ url('/admin/') }}">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-lg-2 control-label">用户名</label>
                            <div class="col-lg-6">
                                <input class="form-control" type="text" name="user-name" value="" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">电子邮箱</label>
                            <div class="col-lg-6">
                                <input class="form-control" type="text" name="user-email" value="" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">设置密码</label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">确认密码</label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">权 限</label>
                            <label class="radio-inline">
                                <input type="radio" name="role" id="radio1" value="N" checked>未认证会员
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="role" id="radio2" value="A">认证会员
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="role" id="radio3" value="V">管理员
                            </label>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label"></label>
                            <button type="submit" class="btn btn-default">更 新</button>
                            <button type="reset" class="btn btn-default">重 置</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
@endsection
