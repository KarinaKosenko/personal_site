<div id="content">	 
	 <div class="post_section">
		<form method="post">
			Заголовок:<br>
			<input type="text" name="title" value=<?=$title;?>><br>
			Содержание:<br>
			<textarea name="content"><?=$content;?></textarea><br><br>
			<input type="submit" value="Сохранить">
		</form>
		<br>
		<div>
			<?=$msg;?>
		</div>
	</div>
</div>