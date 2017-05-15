<div id="content">
	<div class="post_section">
		<form method="post">
			Имя:<br>
			<input type="text" name="name" value="<?php echo $name;?>">
			<br>
			Сообщение:<br>
			<textarea name="text" id="text"><?php echo $text;?></textarea><br>
			<br>
			<div class="smiles">
				<span>
				<img class="smile" src="/smiles/mellow.png" alt=":mellow:">
				</span>
				<span>
				<img class="smile" src="/smiles/dry.png" alt="&lt;_&lt;">
				</span>
				<span>
				<img class="smile" src="/smiles/smile.png" alt=":)">
				</span>
				<span>
				<img class="smile" src="/smiles/wub.png" alt=":wub:">
				</span>
				<span>
				<img class="smile" src="/smiles/angry.png" alt=":angry:">
				</span>
				<span>
				<img class="smile" src="/smiles/sad.png" alt=":(">
				</span>
				<span>
				<img class="smile" src="/smiles/unsure.png" alt=":unsure:">
				</span>
				<span>
				<img class="smile" src="/smiles/wacko.png" alt=":wacko:">
				</span>
				<span>
				<img class="smile" src="/smiles/blink.png" alt=":blink:">
				</span>
				<span>
				<img class="smile" src="/smiles/sleep.png" alt="-_-">
				</span>
				<span>
				<img class="smile" src="/smiles/rolleyes.gif" alt=":rolleyes:">
				</span>
				<span>
				<img class="smile" src="/smiles/huh.png" alt=":huh:">
				</span>
				<span>
				<img class="smile" src="/smiles/happy.png" alt="^_^">
				</span>
				<span>
				<img class="smile" src="/smiles/ohmy.png" alt=":o">
				</span>
				<span>
				<img class="smile" src="/smiles/wink.png" alt=";)">
				</span>
				<span>
				<img class="smile" src="/smiles/tongue.png" alt=":P">
				</span>
				<span>
				<img class="smile" src="/smiles/biggrin.png" alt=":D">
				</span>
				<span>
				<img class="smile" src="/smiles/laugh.png" alt=":lol:">
				</span>
				<span>
				<img class="smile" src="/smiles/cool.png" alt="B)">
				</span>
				<span>
				<img class="smile" src="/smiles/ph34r.png" alt=":ph34r:">
				</span>
			</div>
			<br>
			<input type="submit" value="Отправить">
		</form>
		
		<br>
		<div>
			<?=$msg;?>
		</div>
	</div>
</div>