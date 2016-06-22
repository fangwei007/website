@extends('layouts.admin')

@section('content')
<div id="wrapper">

    <!-- Navigation -->
    @include('admin.navbar')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header"><i class="fa fa-gear"></i> 设备管理</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-lg-12">
                                <label>添加新器材</label>
                                <a href="/item-manage" class="pull-right"><i class="fa fa-gears"></i> 返回列表</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="{{ url('/items') }}" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('item-name') ? ' has-error' : '' }}">
                                <label class="control-label">器材型号</label>
                                <input class="form-control" type="text" name="item-name" value="{{ old('item-name') }}" />
                                
                                @if ($errors->has('item-name'))
                                <span class="help-block">
                                    {{ $errors->first('item-name') }}
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('item-introduction') ? ' has-error' : '' }}">
                                <label class="control-label">器材简介</label>
                                <textarea class="form-control" name="item-introduction" rows="15">{{ old('item-introduction') }}</textarea>
                                
                                @if ($errors->has('item-introduction'))
                                <span class="help-block">
                                    {{ $errors->first('item-introduction') }}
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('item-image') ? ' has-error' : '' }}">
                                <label class="control-label">器材图片</label>
                                <label class="btn btn-link" for="my-file-selector">
                                    <input id="my-file-selector" name="item-image" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());">
                                    <i class="fa fa-link"></i> 添加图片
                                </label>
                                <span class='label label-success' id="upload-file-info"></span>
                                
                                @if ($errors->has('item-image'))
                                <span class="help-block">
                                    {{ $errors->first('item-image') }}
                                </span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">添 加</button>
                            &nbsp;
                            <button type="reset" class="btn btn-warning">重 置</button>
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
