<?php 
	session_start();
	require_once '../redirect.php';
	require_once '../connect.php';
	class AuthManager {
		static public function registration($db) {
			$login = $_POST['login'];
			$password = $_POST['password'];
			$user = $db->query("SELECT * FROM `users` WHERE `login` ='" . $login . "'");

			if  (count($user) == 0) {
				// Экспорт в базу данных
				$text = "INSERT INTO `users` (`login`, `password`) VALUES ('". $login ."', '". $password ."')";
				$db -> execute($text);
				$_SESSION['id'] = $db->query("SELECT `id` FROM `users` WHERE `login` ='" . $login . "'")[0]['id'];
				redirect();
			} else {
				$message = 'Логин занят!';
			}
			if (!empty($message))
		{
			$message = htmlspecialchars($message);
			echo "<p class=\"error\">" . "MESSAGE: " . $message . "</p>";
		}
		}
		static public function auth($db) {
			$login = (string) $_POST['login'];
			$password = (string) $_POST['password'];

			if (count($db->query("SELECT * FROM `users` WHERE `login` =" . '\'' . $login . '\'' . " AND `password` =" . '\'' .$password .'\'')) > 0) {
				$message = 'Вы успешно авторизовались!';
				$_SESSION['id'] = $db->query("SELECT `id` FROM `users` WHERE `login` ='" . $login . "'")[0]['id'];
				redirect();
			} else { 
				$message = 'Неправильный пароль';
			}
			
			if (!empty($message))
				{
			$message = htmlspecialchars($message);
			echo "<p class=\"error\">" . "MESSAGE: " . $message . "</p>";
			}
		}
	}
	if(isset($_POST['register'])) {
		if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])) {
				if ($_POST['password'] == $_POST['confirm_password']) {
					AuthManager::registration($db);
				} else {
					$message = 'Пароли разные!';
				};
		} else {
			$message = 'Все поля должны быть заполнены!';
		};
	};
	if(isset($_POST['auth'])) {
		if (!empty($_POST['login']) && !empty($_POST['password'])) {
			AuthManager::auth($db);
		} else {
			$message = 'Все поля должны быть заполнены!';
		};
	}
	if (!empty($message))
	{
		$message = htmlspecialchars($message);
		echo "<p class=\"error\">" . "MESSAGE: " . $message . "</p>";
	}
?>