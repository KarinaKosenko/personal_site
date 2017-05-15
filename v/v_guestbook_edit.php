<div id="content">
	<div class="post_section">
		<form method="post">
			Имя:<br>
			<input type="text" name="name" value="<?php echo $name;?>">
			<br>
			Сообщение:<br>
			<textarea name="text" id="text"><?php echo $text;?></textarea><br>
			<br>
			<input type="submit" value="Отправить">
		</form>
		
		<br>
		<div>
			<?=$msg;?>
		</div>
	</div>
</div>