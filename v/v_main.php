<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<title><?=$title;?></title>

<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<link rel="Stylesheet" type="text/css" href="/optimistic.css" />
<link rel="Stylesheet" type="text/css" href="/smile.css" />
<link rel="Stylesheet" type="text/css" href="/comments.css" />
<script type="text/javascript" src="/js/jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".smile").click(function(){
				var smile = $(this).attr('alt');
				var text = $.trim($("#text").val());
				$("#text").focus().val(text + ' ' + smile + ' ');
			});
		});
	</script>
<!--[if lte IE 6]>
	<script type="text/javascript" language="javascript" src="iehover.js"></script>
<![endif]-->
</head>
<body>
<div id="container">
  <div id="header">
    <h1>
		Сайт Карины Косенко
    </h1>
  
    <ul id="mainmenu">
		<?php $menu = array ("Главная"=> $status . "/profile", "Образование"=> $status . "/education", "Навыки"=> $status . "/skills", "Гостевая книга"=> $status . "/guestbook");?>        
		
		<?php foreach($menu as $title=>$url) {
			$class = strpos($_SERVER["REQUEST_URI"], $url) !== false ? ' class="active"' : "";?>
			<li<?=$class;?>><a href=<?=$url;?>><span><?=$title;?></span></a></li>
		<?php } ?>
    </ul>

  </div>
  <?=$content;?>
  <div id="column">
    <div>

      <h3>About...</h3>
      <p>You can write something here if you like. Or put a cam, or shoutbox. <a href="http://www.mysite.ru/">A link</a>.</p>
      <h3>Полезные ссылки</h3>
      <ul class="menu">
        <li><a href="http://php.net">PHP: Hypertext Preprocessor</a></li>
        <li><a href="https://habrahabr.ru/">Хабрахабр</a></li>
        <li><a href="https://learn.javascript.ru/">Современный учебник JavaScript</a></li>
		<li><a href="https://tproger.ru/">Типичный программист</a></li>
		<li><a href="http://www.php.su/">PHP, MySQL и другие веб-технологии</a></li>
		<li><a href="http://www.mysite.ru/">Website Link Here</a></li>
      </ul>
     

    </div>
  </div>
  <div id="footer">
    <p>
		&copy; <?=date('Y') . ' ';?><a href="http://">Персональный сайт Карины Косенко</a>
	</p>

</div>