<?php if (count($errors)): ?>
	<div class="alert alert-danger">
		<ul>
			<li>{{ $errors->first() }}</li>
		</ul>
	</div>
	<div class="alert alert-danger">
		<ul>
			<?php foreach ($errors->all() as $err): ?>
				<li>{{ $err }}</li>
			<?php endforeach ?>
		</ul>
	</div>
<?php endif ?>
