
@extends('layouts.admin')

@section('content')
<div id="wrapper">

    <!-- Navigation -->
    @include('admin.navbar')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!--<img src="/images/logo5.png" alt="logo" class="col-md-2" style="height: 45px;width: auto;margin-top: 36px;margin-right: -10px;">-->
                <h2 class="page-header" style="font-weight: 600;margin-left: 5px;">欢迎来到控制面板，本月共有： </h2> 
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-users fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{ count($users) }}</div>
                                <div>新用户</div>
                            </div>
                        </div>
                    </div>
                    <a href="/user-manage">
                        <div class="panel-footer">
                            <span class="pull-left">查看详情</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-gears fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{ count($items) }}</div>
                                <div>新仪器</div>
                            </div>
                        </div>
                    </div>
                    <a href="/item-manage">
                        <div class="panel-footer">
                            <span class="pull-left">查看详情</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-envelope fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{ count($msgs) }}</div>
                                <div>新留言</div>
                            </div>
                        </div>
                    </div>
                    <a href="/msg-manage">
                        <div class="panel-footer">
                            <span class="pull-left">查看详情</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-trash-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{ $trash }}</div>
                                <div>回收站</div>
                            </div>
                        </div>
                    </div>
                    <a href="/trash">
                        <div class="panel-footer">
                            <span class="pull-left">查看详情</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- /.panel -->
        <div class="row" style="padding-left: 15px; padding-right: 15px;">
            <div class="chat-panel panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-comments fa-rss"></i>
                    公司动态
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @if (count($news))
                    <ul class="chat">
                        @for ($i = 0; $i < count($news); $i++)
                        <li class="left clearfix">
                            <span class="chat-img pull-left">
                                <a data-href="/news/delete/{{ $i }}" data-toggle="modal" data-target="#confirm-perm-delete"><img src="http://placehold.it/50/FA6F57/fff" alt="删 除" class="img-circle" /></a>
                            </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">公司动态</strong>
                                    <small class="pull-right text-muted">
                                        <i class="fa fa-clock-o fa-fw"></i> {{ $news[$i][1] }} 
                                    </small>
                                </div>
                                <p>{{ $news[$i][0] }}</p>
                            </div>
                        </li>
                        @endfor
                    </ul>
                    @else
                    <p>暂无公司最新动态，请继续关注。</p>
                    @endif
                </div>
                <!-- /.panel-body -->
                <div class="panel-footer" style="background-color: #337ab7">
                    <form  class="form-horizontal" role="form" method="post" action="{{ url('/news') }}">
                        {!! csrf_field() !!}
                        <div class="input-group">
                            <input id="btn-input" type="text" name="news" class="form-control input-sm" placeholder="请输入公司最新动态内容……" />
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-warning btn-sm" id="btn-chat">
                                    更 新
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
                <!-- /.panel-footer -->
            </div>
        </div>
        <!-- /.panel .chat-panel -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
@endsection