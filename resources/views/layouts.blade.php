<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Laravel--@yield('title')</title>
	</head>

	<style>
		.header {
			width: 1000px;
			height: 150px;
			margin: 0 auto;
			background: #f5f5f5;
			border: 1px solid #ddd;
		}

		.main {
			width: 1000px;
			height: 300px;
			margin: 0 auto;
			margin-top: 15px;
			clear: both;
		}

		.main .sidebar {
			float: left;
			width: 20%;
			height: inherit;
			background: #f5f5f5;
			border: 1px solid #ddd;
		}

		.main .content {
			float: right;
			width: 75%;
			height: inherit;
			background: #f5f5f5;
			border: 1px solid #ddd;
		}

		.footer {
			width: 1000px;
			height: 150px;
			margin: 0 auto;
			margin-top: 15px;
			background: #f5f5f5;
			border: 1px solid #ddd;
		}
	</style>

	<body>
		<div class="header">
			@section('header')
			header
			@show
		</div>

		<div class="main">
			<div class="sidebar">
				@section('sidebar')
				left
				@show
			</div>

			<div class="content">
				@yield('content')
				content
				@show
			</div>
		</div>

		<div class="footer">
			@section('footer')
			footer
			@show
		</div>
	</body>


</html>