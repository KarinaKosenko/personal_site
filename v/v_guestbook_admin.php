<div id="content">
    <div>
      <h2>Гостевая книга - добро пожаловать!</h2>
		<div class="post_section">
		
		<div>
			<strong><a href="/admin/guestbook/add">Написать сообщение:</a></strong>
		</div>
		
		<br>
		<ul>
	   <?php 
			foreach($data as $one){
				echo "<div class='item'>" . "<li>" . $one['date'] . "<br>" . $one['name'] . "<br>" . $smile->smile($one['text']) . "<br>"; 
				echo "<a href=/admin/guestbook/edit/" . $one['id_message'] . ">Редактировать</a><br>";
				echo "<a href=/admin/guestbook/delete/" . $one['id_message'] . ">Удалить</a>";
				echo "<hr></li><br></div>";
			}
		?>
		</ul>
		
		Найдено сообщений: <b><?=$rows?></b><br>
		
		<br>
			<div>
			Страницы: 
			<?php
				for($page = 1; $page <= $num_pages; $page++){
					if ($page == $cur_page){
						echo "<b>$page</b> ";
					}
					else{
						echo "<a href=/admin/guestbook/page/$page>$page</a> ";
					}
				}
			?>
			</div>
		</div>
    </div>
  </div>