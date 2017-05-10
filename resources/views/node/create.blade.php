<?php 

use Collective\Html\FormFacade;

?>

@extends('common.layouts')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">新增node</div>
        <div class="panel-body">
            <form class="form-horizontal" method="post" action="">

            	{!! csrf_field() !!}

                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Gateway_id</label>

                    <div class="col-sm-5">
                    	{{ FormFacade::select('Node[gateway_id]', [1 => 1, 2 => 2], 2, ['class' => 'form-control']) }}
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">gateway_id不能为空</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">name</label>

                    <div class="col-sm-5">
                        <input type="text" name='Node[name]' class="form-control" id="name" placeholder="请输入name">
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">name不能为空</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">land_id</label>

                    <div class="col-sm-5">
                        <input type="text" name='Node[land_id]' class="form-control" id="name" placeholder="请输入land_id">
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">land_id不能为空</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">sensor_addr</label>

                    <div class="col-sm-5">
                        <input type="text" name='Node[sensor_addr]' class="form-control" id="name" placeholder="请输入sensor_addr">
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">sensor_addr不能为空</p>
                    </div>
                </div>

                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop