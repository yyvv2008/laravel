@extends('common.layouts')

@section('content')

    @include('common.validate')

    <div class="panel panel-default">
        <div class="panel-heading">新增node</div>
        <div class="panel-body">
            @include('node._form');
        </div>
    </div>

@stop