@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Upload file</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="file" class="col-md-4 control-label">please select file for upload</label>

                            <div class="col-md-6">
                                <input id="file" type="file" class="form-control" name="source" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Upload
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div>
        <img src="{{ asset('storage/uploads/testa.png') }}" alt="">
    </div>
</div>
@endsection
