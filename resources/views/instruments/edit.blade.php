@extends('layouts.admin')

@section('content')
<div id="wrapper">

    <!-- Navigation -->
    @include('admin.navbar')

    <div id="page-wrapper">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <form role="form" method="post" action="{{ url('/items/' . $item->id) }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="PUT">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="form-group {{ $errors->has('item-name') ? 'has-error' : '' }}">
                            <label>仪器型号</label>
                            <input class="form-control" type="text" name="item-name" value="{{ $item->name }}" />
                            @if ($errors->has('item-name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('item-name') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>设备简介</label>
                            <textarea class="form-control" name="item-introduction" rows="20">{{ $item->introduction }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>图 片</label><br>
                            <img src="{{ $item->image }}"/>
                            <input type="file" name='item-image'>
                        </div>

                        <div class="form-group">
                            <label>入庫日期</label>
                            <p class="form-control-static">{{ $item->created_at }}</p>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" <?php if ($item->deleted_at !== NULL) echo "checked"; ?> name="item-delete" /> 放入回收站
                            </label>
                        </div>

                        <button type="submit" class="btn btn-default">更 新</button>
                        <button type="reset" class="btn btn-default">重 置</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
@endsection
