<?php
	header ("Content-type: text/html; charset=utf-8");
	session_start();
	//підключаємо бібліотеки
	require ("../libraries/lib_func.inc.php");
	require ("../libraries/lib_db.inc.php");
	require ("../libraries/lib_func_db.inc.php");
	require ("../configuration.php");
	include ("../language/language.inc");
	//Перевіряємо чи була відправлена форма і фільтруємо данні
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if (isset($_POST["login"]) && !empty($_POST["login"]) &&
			isset($_POST["mail"]) && !empty($_POST["mail"]) &&
			isset($_POST["pass"]) && !empty($_POST["pass"]) &&
			isset($_POST["pass2"]) && !empty($_POST["pass2"]))
			{
				$login = clearData($_POST["login"]);
				$mail = clearData($_POST["mail"]);
				$pass = clearData($_POST["pass"]);
				$pass2 = clearData($_POST["pass2"]);
				$date = $_POST["date"];
				if (chek_login($login))
					exit("$ini_array['this_login']");
				if (chek_mail($mail))
					exit("$ini_array['this_mail']");
				if (strlen($pass) < 6 || strlen($pass) > 16)
					exit("$ini_array['pass']");
				if ($pass == $pass2){
					$pass = md5(md5($pass));
				if (!(valid_email($mail)))
					exit("$ini_array['mail']");
				//зберігаємо користувача в БД
				save_user($login, $mail, $pass, $date);				
				//зберігаємо користувача в сесію
				save_session ($login, $pass);
				//отримуємо id користувача
				$log = $_SESSION["login"];
				$result = select_user($log);
				$assoc = mysql_fetch_assoc ($result);
				$uid = $assoc["uid"];
				//надаємо роль користувачеві
				user_role_reg($uid);
				$result = select_roles($uid);
				$assoc = mysql_fetch_assoc ($result);
				$rid = $assoc["rid"];				
				//записуємо ролі в сесію
				save_session_role($uid, $rid);
				header ("Location: ../index.php");
					exit();
				}else{
					echo "<p>".$ini_array['Passwords_do_not_match']."</p>";
				}
			}else{
			echo "<p>".$ini_array['Incorrectly_filled_fields']."</p>";
		}
	}
?>