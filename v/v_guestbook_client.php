<div id="content">
    <div>
      <h2>Гостевая книга - добро пожаловать!</h2>
		<div>
			<strong><a href="/guestbook/add">Написать сообщение:</a></strong>
		</div>
		
	   <?php foreach($data as $one):?>
				<p style="overflow-x:hidden;"><?=$one['date'];?><br><?=$one['name'];?><br><?=$smile->smile($one['text']);?><br></p>
		<?php endforeach;?>
		
		Найдено сообщений: <b><?=$rows?></b><br>
		
		<div>
		Страницы: 
		<?php
			for($page = 1; $page <= $num_pages; $page++){
				if ($page == $cur_page){
					echo "<b>$page</b> ";
				}
				else{
					echo "<a href=/guestbook/page/$page>$page</a> ";
				}
			}
		?>
		</div>
    </div>
  </div>