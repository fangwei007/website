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
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-lg-3"><label>修改用户信息</label></div>
                            <div class="col-lg-3 pull-right">
                                <a href="/admin" class=""><i class="fa fa-th-list"></i>回到前页</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif
                        <form  class="form-horizontal" role="form" method="post" action="{{ url('/admin/' . $user->id) }}">
                            {!! csrf_field() !!}

                            <input type="hidden" name="_method" value="PUT">

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-lg-2 control-label">用户名</label>
                                <div class="col-lg-6">
                                    <input class="form-control" type="text" name="name" value="{{ $user->name }}" />
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
                                    <input class="form-control" type="text" name="email" value="{{ $user->email }}" />
                                </div>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    {{ $errors->first('email') }}
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <p class="col-lg-5 control-label small">如若修改密码，请填写下面信息：</p>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-lg-2 control-label">新的密码</label>
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
                                    <input type="radio" name="role" id="radio1" value="N" <?php echo $user->role == 'N' ? 'checked' : '' ?> >未认证
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="role" id="radio2" value="A" <?php echo $user->role == 'A' ? 'checked' : '' ?> >认证会员
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="role" id="radio3" value="V" <?php echo $user->role == 'V' ? 'checked' : '' ?> >管理员
                                </label>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-4 control-label"></label>
                                <button type="submit" class="btn btn-default">确认修改</button>
                                <!--<button type="reset" class="btn btn-default">重 置</button>-->
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