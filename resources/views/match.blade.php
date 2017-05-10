<html>
	<body>
		<form action="http://blog/match" method='post'>
			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
			<input type="submit">

		</form>
	</body>
</html>