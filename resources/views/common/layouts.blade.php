<?php 

use Illuminate\Http\Request

?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>轻松学会Laravel - @yield('title')</title>
    <!-- Bootstrap CSS 文件 -->
    <link rel="stylesheet" href="{{ asset('static/bootstrap/css/bootstrap.min.css') }}">
    @section('style')

    @show
</head>
<body>

<!-- 头部 -->
@section('header')

    <div class="jumbotron">
        <div class="container">
            <h2>轻松学会Laravel</h2>

            <p> - 玩转Laravel表单</p>
        </div>
    </div>

@show

<!-- 中间内容区局 -->
<div class="container">
    <div class="row">

        <!-- 左侧菜单区域   -->
        <div class="col-md-3">
            @section('leftmenu')
                <div class="list-group">
                    <a href="{{ url('node/index') }}" class="list-group-item {{ !(request()->is('node/create')) ? 'active' : '' }}">Nodes列表</a>
                    <a href="{{ url('node/create') }}" class="list-group-item {{ request()->getPathInfo() == '/node/create' ? 'active' : '' }}">新增node</a>
                </div>
            @show
        </div>

        <!-- 右侧内容区域 -->
        <div class="col-md-9">


            @yield('content')


        </div>
    </div>
</div>

<!-- 尾部 -->
@section('footer')
    <div class="jumbotron" style="margin:0;">
        <div class="container">
            <span>  @2016 imooc</span>
        </div>
    </div>
@show

<!-- jQuery 文件 -->
<script src="{{ asset('static/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap JavaScript 文件 -->
<script src="{{ asset('static/bootstrap/js/bootstrap.min.js') }}"></script>

</body>
</html>