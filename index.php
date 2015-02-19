<?php
include("connect.php");
mysql_query('SET CHARACTER SET utf8' );
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Блог
	</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
	
	<div class="wrapper">
		<div class="header">
			<div class="logo">
				<a class="logo" href="index.php"></a>
			</div>
		</div>
		
		<div class="top_menu">
			<div class="top_menu_left">
				<a href="#" class="button">Фото</a>
				<a href="#" class="button">Видео</a>
				<a href="#" class="button">Статьи</a>
				<a href="#" class="button">Мото</a>
			</div>
			
			<div class="top_menu_right">
				<p class="top_menu_right">
				<div>
				<?
					include("login.php"); 
				?>
				</div>
				</p>
			</div>
			
		</div>
		
		<div class="content">
			<div class="blog">
				<a href="new_post.php" class="new_post">Новый пост</a>
				<? include("content.php"); ?>
			</div>
			
			<div class="right">
				<div class="right_menu">
					<a href="index.php">Главная</a>
					<a href="#">Фото</a>
					<a href="#">Видео</a>
					<a href="#">Контакты</a>
				</div>
			</div>
		</div>
		
		<div style="clear:both;"></div>
		
		<? include("footer.php"); ?>	
	</div>
	
	
</body>	
</html>