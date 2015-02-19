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
				<?php
					if(isset($_GET["id"])){
						$id = $_GET["id"];
					}
					else{
						$id = 1;
					}
					mysql_query('SET CHARACTER SET utf8' );
					$result = mysql_query("SELECT * FROM data WHERE id='$id'") or die(mysql_error());
					$data = mysql_fetch_array($result);
					do {
						printf('
						<div class="article-in">
							<p class="title">%s</p>
							<img class="image" src="%s" width="760" />
							<p>%s</p>
						</div>
						',$data["title"],$data["img"],$data["desc"]);
					}
					while($data = mysql_fetch_array($result));
					
				?>
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