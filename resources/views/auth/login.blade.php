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
                <div class="panel-heading"><?php echo $lang == NULL ? "用户登录" : "Login"; ?></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url("$prefix/login") }}">
                        {!! csrf_field() !!}

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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> <?php echo $lang == NULL ? "记住我" : "Remember me"; ?>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> <?php echo $lang == NULL ? "登 陆" : "Sign in"; ?>
                                </button>

                                <a class="btn btn-link" href="{{ url("$prefix/password/reset") }}"><?php echo $lang == NULL ? "忘记密码？" : "Forget password?"; ?></a>

                                <a class="btn btn-link" href="{{ url("$prefix/register") }}"><?php echo $lang == NULL ? "注 册" : "Join"; ?></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
