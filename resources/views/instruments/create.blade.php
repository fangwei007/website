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
            <div class="col-lg-10">
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
                            
                            <div class="form-group{{ $errors->has('item-lang') ? ' has-error' : '' }}">
                                <label class="control-label">语 言</label>
                                <select class="form-control" style="max-width: 300px;" name="item-lang" id="item-lang">
                                    <option value="cn">中 文</option>
                                    <option value="en">英 文</option>
                                </select>

                                @if ($errors->has('item-lang'))
                                <span class="help-block">
                                    {{ $errors->first('item-lang') }}
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('item-company') ? ' has-error' : '' }}">
                                <label class="control-label">所属公司</label>
                                <select class="form-control" style="max-width: 300px;" name="item-company" id="item-company">
                                    <option value="Germany">德国 Pro-Med</option>
                                    <option value="USA">美国 SurgiTel</option>
                                    <option value="other">诊断试剂</option>
                                </select>

                                @if ($errors->has('item-company'))
                                <span class="help-block">
                                    {{ $errors->first('item-company') }}
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('item-type') ? ' has-error' : '' }}">
                                <label class="control-label">仪器类型</label>
                                <select class="form-control" style="max-width: 300px;" name="item-type" id="my-select">
                                    <option value="jc" id="Germany-type">基础外科器械</option>
                                    <option value="xxw" id="Germany-type">心血管及胸外科</option>
                                    <option value="pw" id="Germany-type">普通外科</option>
                                    <option value="ebh" id="Germany-type">耳鼻喉外科</option>
                                    <option value="gkxw" id="Germany-type">骨外科神经外科及显微外科</option>
                                    <option value="ssfdj" id="USA-type" style="display: none;">手术放大镜</option>
                                    <option value="sstd" id="USA-type" style="display: none;">手术头灯</option>
                                    <option value="yjdbh" id="USA-type" style="display: none;">眼镜的保护</option>
                                    <option value="sssxxt" id="USA-type" style="display: none;">手术摄像系统</option>
                                    <option value="zdsj" id="zdsj-type" style="display: none;">诊断试剂</option>
                                </select>

                                @if ($errors->has('item-type'))
                                <span class="help-block">
                                    {{ $errors->first('item-type') }}
                                </span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">添 加</button>
                            &nbsp;
                            <button type="reset" class="btn btn-warning">重 置</button>
                        </form>
                        <script type="text/javascript">
                            var elem = document.getElementById("item-company");
                            elem.onchange = function () {
                                if (this.value == "Germany") {
                                    $("#my-select option[value='jc']").prop('selected', true);
                                    $("#my-select option[value='jc']").show();
                                    $("#my-select option[value='xxw']").show();
                                    $("#my-select option[value='pw']").show();
                                    $("#my-select option[value='ebh']").show();
                                    $("#my-select option[value='gkxw']").show();
                                    $("#my-select option[value='ssfdj']").hide();
                                    $("#my-select option[value='sstd']").hide();
                                    $("#my-select option[value='yjdbh']").hide();
                                    $("#my-select option[value='sssxxt']").hide();
                                    $("#my-select option[value='zdsj']").hide();
                                } else if (this.value == "USA") {
                                    $("#my-select option[value='ssfdj']").prop('selected', true);
                                    $("#my-select option[value='jc']").hide();
                                    $("#my-select option[value='xxw']").hide();
                                    $("#my-select option[value='pw']").hide();
                                    $("#my-select option[value='ebh']").hide();
                                    $("#my-select option[value='gkxw']").hide();
                                    $("#my-select option[value='ssfdj']").show();
                                    $("#my-select option[value='sstd']").show();
                                    $("#my-select option[value='yjdbh']").show();
                                    $("#my-select option[value='sssxxt']").show();
                                    $("#my-select option[value='zdsj']").hide();
                                } else {
                                    $("#my-select option[value='zdsj']").prop('selected', true);
                                    $("#my-select option[value='jc']").hide();
                                    $("#my-select option[value='xxw']").hide();
                                    $("#my-select option[value='pw']").hide();
                                    $("#my-select option[value='ebh']").hide();
                                    $("#my-select option[value='gkxw']").hide();
                                    $("#my-select option[value='ssfdj']").hide();
                                    $("#my-select option[value='sstd']").hide();
                                    $("#my-select option[value='yjdbh']").hide();
                                    $("#my-select option[value='sssxxt']").hide();
                                    $("#my-select option[value='zdsj']").show();
                                }
                            };
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
@endsection
