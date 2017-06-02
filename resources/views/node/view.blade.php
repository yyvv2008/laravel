@extends('common.layouts')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Node 详情</div>

        <table class="table table-bordered table-striped table-hover ">
            <tbody>

				<?php foreach ($node as $key => $value): ?>
					
		            <tr>
		                <td width="50%">{{ $key }}</td>
		                <td>{{ $value }}</td>
		            </tr>

				<?php endforeach ?>

            </tbody>
        </table>
    </div>
@stop