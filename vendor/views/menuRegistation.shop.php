<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="slurp" content="noydir" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../assets/css/auth.css">
	<title>Регистрация</title>
</head>

<body>
	<div class="main">
		<div class="form">
			<div class="form__top">
				<button id="changeFormBtn" class="form__top-btn active" onclick="changeModsAuth()">Авторизация</button><button id="changeFormBtn" class="form__top-btn" onclick="changeModsAuth()">Регистрация</button>
			</div>
			<div class="form__main">
				<form action="../models/AuthManager.php" class="main__form active" id="changeForm" method="POST">
					<input name="login" class="form__input" placeholder="Введите логин">
					<input name="password" class="form__input" placeholder="Введите Пароль">
					<button type="submit" class="form__btn btn" name="auth">Отправить</button>
				</form>
				<form action="../models/AuthManager.php" class="main__form" id="changeForm" method="POST">
					<input name="login" class="form__input" placeholder="Введите логин">
					<input name="password" class="form__input" placeholder="Введите пароль">
					<input name="confirm_password" class="form__input" placeholder="Подтвердите пароль">
					<button type="submit" class="form__btn btn" name="register">Отправить</button>
				</form>
			</div>
		</div>
	</div>
	<?php 
	?>
	<script src="../../assets/js/js.js"></script>
</body>

</html>