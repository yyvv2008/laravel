@extends('common.layouts')

@section('content')

	@include('common.message')

    <!-- 自定义内容区域 -->
    <div class="panel panel-default">
        <div class="panel-heading">nodes列表</div>
        <table class="table table-striped table-hover table-responsive">
            <thead>
            <tr>
                <th>ID</th>
                <th>gateway_id</th>
                <th>name</th>
                <th>land_id</th>
                <th>sensor_addr</th>
                <th>create_time</th>
                <th>update_time</th>
                <th>x_axis</th>
                <th>y_axis</th>
                <th width="120">操作</th>
            </tr>
            </thead>
            <tbody>

				@foreach($nodes as $node)

		            <tr>
		                <th scope="row">{{ $node->id }}</th>
		                <td>{{ $node->gateway_id }}</td>
		                <td>{{ $node->name }}</td>
		                <td>{{ $node->land_id }}</td>
		                <td>{{ $node->sensor_addr }}</td>
		                <td>{{ $node->create_time }}</td>
		                <td>{{ $node->update_time }}</td>
		                <td>{{ $node->x_axis }}</td>
		                <td>{{ $node->y_axis }}</td>
		                <td>
		                    <a href="">详情</a>
		                    <a href="">修改</a>
		                    <a href="">删除</a>
		                </td>
		            </tr>

				@endforeach

            </tbody>
        </table>
    </div>

    <!-- 分页  -->
    <div>

		<div class="pull-right">
			{{ $nodes->render() }}
		</div>

    </div>

@stop