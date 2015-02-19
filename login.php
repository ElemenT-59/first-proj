<html>
    <a href="#" class="overlay" id="log"></a>
	<div class="popup">
		<form action="<?=$_SERVER['PHP_SELF']?>" method="post" name="login_form">
			<input class="input_form" name="email" type="email" placeholder="Введите email" maxlength="128" required="">
			<input class="input_form" name="password" type="password" placeholder="Введите пароль" maxlength="64" required="">
			<input class="button_form" id="login" name="login" type="submit" value="Войти">

		</form>	
		<a class="close"title="Закрыть" href="#close"></a>
    </div>
    
    
    <a href="#" class="overlay" id="reg"></a>
	<div class="popup">
		<form action="<?=$_SERVER['PHP_SELF']?>" method="post" name="register_form">
			<input class="input_form" name="first_name" type="text" placeholder="Ваше имя" required="" min="2" maxlength="50">
			<input class="input_form" name="last_name" type="text" placeholder="Ваша фамилия" required="" min="2" maxlength="50">
			<input class="input_form" name="nickname" type="text" placeholder="Ваш ник" required="" min="2" maxlength="50">
			<input class="input_form" name="email" type="email" placeholder="Ваш email" required="" maxlength="128">
			<input class="input_form" name="password" type="password" placeholder="Введите пароль" required="" min="3" maxlength="64">	
			<input class="input_form" name="try_password" type="password" placeholder="Повторите пороль" required="" min="8" maxlength="64">			
			<input class="button_form" id="register" name="register" type="submit" value="Зарегистрироваться">
		</form>	
		<a class="close"title="Закрыть" href="#close"></a>
    </div>
    
</html>
<?php
	//Авторизация
	if(isset($_POST["login"])) {
		$email=$_POST['email'];
		$password=md5($_POST['password']);

		$query=mysql_query("SELECT * FROM users WHERE email='$email'");
		$user_data=mysql_fetch_array($query);

		if($user_data['password'] == $password) {
			session_start();
			$_SESSION['name'] = $user_data['nickname'];
		}	 
		else {
			print_r("Неверный логин или пароль");
		}
	}
	//Проверка сессии			
	if(isset($_SESSION['name'])) {
		printf('вы зашли как: %s <a href="logout.php" class="button" id="exit">Выйти</a>',$_SESSION['name']);
	}
	else {
		echo '<a href="#log" class="button">Вход</a>
			  <a href="#reg" class="button">Регистрация</a>';
	}
	//Регистрация
	if(isset($_POST["register"])) {
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$nickname=$_POST['nickname'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$try_password=$_POST['try_password'];
	
		if ($password == $try_password) {
			$password = md5($password);
			
			$query=mysql_query("SELECT * FROM users WHERE email='$email'");
			$numrows=mysql_num_rows($query);
			
			if($numrows==0) {
				mysql_query("INSERT INTO users (first_name,last_name,nickname,email,password) VALUES('$first_name','$last_name','$nickname','$email','$password')");		
				echo "Регистрация прошла успешно!";		
			}	 
			else {
				echo "Данная электронная почта уже занята!";
   			}
		}
		else {
			echo "Пароли не совпадают!";
		}	
	}					
?>