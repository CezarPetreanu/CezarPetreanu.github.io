<?php if(count($errors) > 0): ?>

	<font style="color: yellow">
	
		<?php foreach($errors as $error): ?>
		
			<p><?php echo $error ?></p>
		
		<?php endforeach ?>
	
	</font>

<?php endif ?>