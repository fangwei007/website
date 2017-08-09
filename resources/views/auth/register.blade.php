@extends('layouts.layout')

@section('content')
<?php
$request = Request();
$lang = $request->route()->getPrefix();
$prefix = $lang == NULL ? '' : '/en';
?>
<div class="container page-container">
    <div class="row" style="margin-top: 5%; min-height: 650px">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $lang == NULL ? "注册新用户" : "Register"; ?></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url("$prefix/register") }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"><?php echo $lang == NULL ? "用户名" : "Username"; ?></label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"><?php echo $lang == NULL ? "电子邮箱" : "Email"; ?></label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"><?php echo $lang == NULL ? "密 码" : "Password"; ?></label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"><?php echo $lang == NULL ? "确认密码" : "Password Confirmation"; ?></label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('verification') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"><?php echo $lang == NULL ? "验证码" : "Verification"; ?></label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="verification" value="">

                                @if ($errors->has('verification'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('verification') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> <?php echo $lang == NULL ? "注册用户" : "Sign up"; ?>
                                </button>
                                
                                <a class="btn btn-link" href="{{ url("$prefix/login") }}"><?php echo $lang == NULL ? "返 回" : "Back"; ?></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
