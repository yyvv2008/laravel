<?php 

use Collective\Html\FormFacade;
use App\Node;

?>

<form class="form-horizontal" method="post" action="">

	{!! csrf_field() !!}

    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Gateway_id</label>

        <div class="col-sm-5">
        	{{ FormFacade::select('Node[gateway_id]', Node::loadGatewayId(['gateway_id']), (old('Node')['gateway_id'] ? old('Node')['gateway_id'] : $node->gateway_id), ['class' => 'form-control']) }}
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{ $errors->first('Node.gateway_id') }}</p>
        </div>
    </div>

    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">name</label>

        <div class="col-sm-5">
            <input type="text" name='Node[name]' class="form-control" id="name"
            value="{{ old('Node')['name'] ? old('Node')['name'] : $node->name }}"
            placeholder="请输入name">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{ $errors->first('Node.name') }}</p>
        </div>
    </div>

    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">land_id</label>

        <div class="col-sm-5">
            <input type="text" name='Node[land_id]' class="form-control" value="{{ old('Node')['land_id'] ? old('Node')['land_id'] : $node->land_id }}" id="name" placeholder="请输入land_id">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">
                <?php foreach ($errors->get('Node.land_id') as $err): ?>
                    {{ $err }}
                <?php endforeach ?>
            </p>
        </div>
    </div>

    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">sensor_addr</label>

        <div class="col-sm-5">
            <input type="text" name='Node[sensor_addr]' class="form-control" value="{{ old('Node')['sensor_addr'] ? old('Node')['sensor_addr'] : $node->sensor_addr }}" id="name" placeholder="请输入sensor_addr">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{ $errors->first('Node.sensor_addr') }}</p>
        </div>
    </div>

    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">提交</button>
        </div>
    </div>
</form>