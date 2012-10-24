<?php
	header ("Content-type: text/html; charset=utf-8");
	session_start();
	//підключаємо бібліотеки
	require ("../libraries/lib_func.inc.php");
	require ("../libraries/lib_db.inc.php");
	require ("../libraries/lib_func_db.inc.php");
	require ("../configuration.php");
	include ("../language/language.inc");
	//Переміщаємо аватарку в папку користувача
	if (isset($_SESSION['login']) && !empty($_SESSION['login'])){
		if(isset($_FILES) && !empty($_FILES)){
			if($_FILES["userfile"]["error"] == 0){
				if (($_FILES["userfile"]["type"] == "image/png") or 
					($_FILES["userfile"]["type"] == "image/jpeg") or 
					($_FILES["userfile"]["type"] == "image/gif")){
						$tmp_name = $_FILES["userfile"]["tmp_name"];
						$f_name = $_FILES["userfile"]["name"];
						$dir = "../images/ava/".$_SESSION['login'];
						remove_dir($dir,"");
						if (!file_exists($dir)){
							mkdir($dir);
						}
						move_uploaded_file($tmp_name, $dir."/".$f_name);						
						echo $ini_array['image_update']."<br>";
				}else{
					exit ($ini_array['file_type_error']);
				}
			}
		}
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$log = $_SESSION["login"];
		$name = clearData($_POST["name"]);
		$lname = clearData($_POST["lname"]);
		$mail = clearData($_POST["mail"]);
		update_user($name, $lname, $mail, $log, $db);
		echo $ini_array['update_successfully'];		
	}
	echo "<p><a href='../index.php?page=user_account'>".$ini_array['back']."</a></p>";
?>