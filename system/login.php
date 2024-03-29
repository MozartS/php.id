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
			isset($_POST["pass"]) && !empty($_POST["pass"])){
				$login = clearData($_POST["login"]);
				$pass = md5(md5(clearData($_POST["pass"])));
				if((chek_user($login, $pass, $db) == 0) ) {
					echo $ini_array['information_error'];
					echo "<p><a href='../index.php'>".$ini_array['back']."</a></p>";
				}else{
					save_session ($login, $pass);
					//отримуємо id користувача
					$log = $_SESSION["login"];
					$stmt = select_user($log, $db);
					$assoc = $stmt->fetch(PDO::FETCH_ASSOC);
					$uid = $assoc["uid"];
					save_id ($uid);
					//надаємо роль користувачеві					
					$result = select_roles($uid, $db);
					$assoc = $result->fetch(PDO::FETCH_ASSOC);
					$rid = $assoc["rid"];				
					//записуємо ролі в сесію
					save_session_role($uid, $rid);
					header ("Location: ../index.php");
				}
		}else{
			echo $ini_array['information_error'];
			echo "<p><a href='../index.php'>".$ini_array['back']."</a></p>";
		}
	}
?>