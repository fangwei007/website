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
                                <label>更新器材信息</label>
                                <a href="/item-manage" class="pull-right"><i class="fa fa-gears"></i> 返回列表</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif
                        <form role="form" method="post" action="{{ url('/items/' . $item->id) }}" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <input type="hidden" name="_method" value="PUT">

                            <div class="form-group{{ $errors->has('item-name') ? ' has-error' : '' }}">
                                <label class="control-label">器材型号</label>
                                <input class="form-control" type="text" name="item-name" value="{{ $item->name }}" />

                                @if ($errors->has('item-name'))
                                <span class="help-block">
                                    {{ $errors->first('item-name') }}
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('item-introduction') ? ' has-error' : '' }}">
                                <label class="control-label">器材简介</label>
                                <textarea class="form-control" name="item-introduction" rows="15">{{ $item->introduction }}</textarea>

                                @if ($errors->has('item-introduction'))
                                <span class="help-block">
                                    {{ $errors->first('item-introduction') }}
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('item-image') ? ' has-error' : '' }}">
                                <label class="control-label">器材图片</label><br>
                                <img class="img-thumbnail" src="{{ $item->image }}"/>
                                <p></p>
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

                            <div class="form-group{{ $errors->has('item-company') ? ' has-error' : '' }}">
                                <label class="control-label">所属公司</label>
                                <select class="form-control" style="max-width: 300px;" name="item-company" id="item-company">
                                    <option value="Germany" <?php if ($item->company == "Germany") echo 'selected'; ?>>德国 Pro-Med</option>
                                    <option value="USA" <?php if ($item->company == "USA") echo 'selected'; ?>>美国 SurgiTel</option>
                                    <option value="other" <?php if ($item->company == "other") echo 'selected'; ?>>诊断试剂</option>
                                </select>

                                @if ($errors->has('item-company'))
                                <span class="help-block">
                                    {{ $errors->first('item-company') }}
                                </span>
                                @endif
                            </div>

                            @if ($item->company == "Germany")
                            <div class="form-group{{ $errors->has('item-type') ? ' has-error' : '' }}">
                                <label class="control-label">仪器类型</label>
                                <select class="form-control" style="max-width: 300px;" name="item-type" id="my-select">
                                    <option value="jc" id="Germany-type" <?php if ($item->type == "jc") echo 'selected'; ?>>基础外科器械</option>
                                    <option value="xxw" id="Germany-type" <?php if ($item->type == "xxw") echo 'selected'; ?>>心血管及胸外科</option>
                                    <option value="pw" id="Germany-type" <?php if ($item->type == "pw") echo 'selected'; ?>>普通外科</option>
                                    <option value="ebh" id="Germany-type" <?php if ($item->type == "ebh") echo 'selected'; ?>>耳鼻喉外科</option>
                                    <option value="gkxw" id="Germany-type" <?php if ($item->type == "gkxw") echo 'selected'; ?>>骨外科神经外科及显微外科</option>
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
                            @elseif ($item->company == "USA")
                            <div class="form-group{{ $errors->has('item-type') ? ' has-error' : '' }}">
                                <label class="control-label">仪器类型</label>
                                <select class="form-control" style="max-width: 300px;" name="item-type" id="my-select">
                                    <option value="jc" id="Germany-type" style="display: none;" >基础外科器械</option>
                                    <option value="xxw" id="Germany-type" style="display: none;" >心血管及胸外科</option>
                                    <option value="pw" id="Germany-type" style="display: none;" >普通外科</option>
                                    <option value="ebh" id="Germany-type" style="display: none;" >耳鼻喉外科</option>
                                    <option value="gkxw" id="Germany-type" style="display: none;" >骨外科神经外科及显微外科</option>
                                    <option value="ssfdj" id="USA-type" <?php if ($item->type == "ssfdj") echo 'selected'; ?>>手术放大镜</option>
                                    <option value="sstd" id="USA-type" <?php if ($item->type == "sstd") echo 'selected'; ?>>手术头灯</option>
                                    <option value="yjdbh" id="USA-type" <?php if ($item->type == "yjdbh") echo 'selected'; ?>>眼镜的保护</option>
                                    <option value="sssxxt" id="USA-type" <?php if ($item->type == "sssxxt") echo 'selected'; ?>>手术摄像系统</option>
                                    <option value="zdsj" id="zdsj-type" style="display: none;">诊断试剂</option>
                                </select>

                                @if ($errors->has('item-type'))
                                <span class="help-block">
                                    {{ $errors->first('item-type') }}
                                </span>
                                @endif
                            </div>
                            @else
                            <div class="form-group{{ $errors->has('item-type') ? ' has-error' : '' }}">
                                <label class="control-label">仪器类型</label>
                                <select class="form-control" style="max-width: 300px;" name="item-type" id="my-select">
                                    <option value="jc" id="Germany-type" style="display: none;" >基础外科器械</option>
                                    <option value="xxw" id="Germany-type" style="display: none;" >心血管及胸外科</option>
                                    <option value="pw" id="Germany-type" style="display: none;" >普通外科</option>
                                    <option value="ebh" id="Germany-type" style="display: none;" >耳鼻喉外科</option>
                                    <option value="gkxw" id="Germany-type" style="display: none;" >骨外科神经外科及显微外科</option>
                                    <option value="ssfdj" id="USA-type" style="display: none;">手术放大镜</option>
                                    <option value="sstd" id="USA-type" style="display: none;">手术头灯</option>
                                    <option value="yjdbh" id="USA-type" style="display: none;">眼镜的保护</option>
                                    <option value="sssxxt" id="USA-type" style="display: none;">手术摄像系统</option>
                                    <option value="zdsj" id="zdsj-type" <?php if ($item->type == "zdsj") echo 'selected'; ?>>诊断试剂</option>
                                </select>

                                @if ($errors->has('item-type'))
                                <span class="help-block">
                                    {{ $errors->first('item-type') }}
                                </span>
                                @endif
                            </div>
                            @endif

                            <div class="form-group">
                                <label class="control-label">添加时间 </label>
                                <label class="radio-inline text-primary">{{ $item->created_at }}</label>
                            </div>

                            <button type="submit" class="btn btn-primary">更 新</button>

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
                                    $("#my-select option[value='zdsj']").hide();
                                } else if (this.value == "USA") {
                                    $("#my-select option[value='ssfdj']").prop('selected', true);
                                    $("#my-select option[value='jc']").hide();
                                    $("#my-select option[value='xxw']").hide();
                                    $("#my-select option[value='pw']").hide();
                                    $("#my-select option[value='ebh']").hide();
                                    $("#my-select option[value='gkxw']").hide();
                                    $("#my-select option[value='ssfdj']").show();
                                    $("#my-select option[value='zdsj']").hide();
                                } else {
                                    $("#my-select option[value='zdsj']").prop('selected', true);
                                    $("#my-select option[value='jc']").hide();
                                    $("#my-select option[value='xxw']").hide();
                                    $("#my-select option[value='pw']").hide();
                                    $("#my-select option[value='ebh']").hide();
                                    $("#my-select option[value='gkxw']").hide();
                                    $("#my-select option[value='ssfdj']").hide();
                                    $("#my-select option[value='zdsj']").show();
                                }
                            };
                        </script>
                        <div class="row" style="margin-top: -34px; margin-left: 70px">
                            <a href="/items/{{ $item->id }}"><button type="" class="btn btn-info">预 览</button></a>
                            &nbsp;
                            <button class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete" data-href="/items/{{ $item->id }}/delete?r=item">放入回收站</button>
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
