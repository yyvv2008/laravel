@extends('layouts')

@section('header')
	@parent
	fuck_header
@stop

@section('sidebar')
	@parent
	fuck_left
@stop

@section('content')
	fuck_content

	<!-- shift -->
	<p>{{$node->name}}</p>
	<p>{{ time() }}</p>
	<p>{{ $node or 'default' }}</p>

	<p>@{{ $node }}</p>
	{{-- fuck you --}}

	@include('nodes.subblade', ['message' => 'this is a message'])

	@if ($node->name == '丹棱不知火高标采集点001')
		<p>this is right <?= $node->name ?></p>
	@else
		<p>this is wrong</p>
	@endif

	@unless ($node->name != '丹棱不知火高标采集点001')
		<p>this is right <?= $node->name ?></p>
	@endunless

<!-- 	@for ($i = 1; $i < 3; $i++)
		<p><?= $i ?></p>
	@endfor -->

	{{ var_dump($node->name) }}
	{{ var_dump($node->land_id) }}

<!-- 	@foreach($node as $attr)
		<p>{{ var_dump($attr) }}</p>
	@endforeach -->

	@forelse ($node as $attr)
		<p>{{ $attr }}</p> <!-- if ture -->
	@empty
		<p>null</p>	<!-- if null -->
	@endforelse

@stop

@section('footer')
	@parent
	fuck_footer

	<br>
	<a href="{{ url('node/urlTest') }}">url()</a>
	<br>
	<a href="{{ action('NodeController@urlTest') }}">action()</a>
	<br>
	<a href="{{ route('url') }}">route()</a>
@stop
