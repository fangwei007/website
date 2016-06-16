@extends('layouts.admin')

@section('content')
<div id="wrapper">

    <!-- Navigation -->
    @include('admin.navbar')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header"><i class="fa fa-user"></i> 用户管理</h2>
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
                                <label>创建新用户</label>
                                <a href="/user-manage" class="pull-right"><i class="fa fa-group"></i> 返回列表</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form  class="form-horizontal" role="form" method="post" action="{{ url('/admin/') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-lg-2 control-label">新用户名</label>
                                <div class="col-lg-6">
                                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" />
                                </div>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    {{ $errors->first('name') }}
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-lg-2 control-label">电子邮箱</label>
                                <div class="col-lg-6">
                                    <input class="form-control" type="text" name="email" value="{{ old('email') }}" />
                                </div>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    {{ $errors->first('email') }}
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-lg-2 control-label">密 码</label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" name="password">
                                </div>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    {{ $errors->first('password') }}
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="col-lg-2 control-label">确认密码</label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>

                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    {{ $errors->first('password_confirmation') }}
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">权 限</label>
                                <label class="col-lg-1 control-label"></label>
                                <label class="radio-inline">
                                    <input type="radio" name="role" id="radio1" value="N" checked>未认证
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="role" id="radio2" value="A">认证会员
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="role" id="radio3" value="V">管理员
                                </label>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-4 control-label"></label>
                                <button type="submit" class="btn btn-default">创 建</button>
                                <button type="reset" class="btn btn-default">重 置</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
@endsection
