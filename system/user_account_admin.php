<?php
	header ("Content-type: text/html; charset=utf-8");
	session_start();
	//підключаємо бібліотеки
	require ("../libraries/lib_func.inc.php");
	require ("../libraries/lib_db.inc.php");
	require ("../libraries/lib_func_db.inc.php");
	require ("../configuration.php");
	include ("../language/language.inc");
	//приємаємо нові дані та зберігаємо їх
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$id = $_POST["id"];
		$name = clearData($_POST["name"]);
		$lname = clearData($_POST["lname"]);
		$mail = clearData($_POST["mail"]);
		$role = clearData($_POST["role"]);
		update_user_id($name, $lname, $mail, $id);
		update_role($id, $role);
		echo $ini_array["update_successfully"];		
	}
	echo "<p><a href='../index.php?page=edit_users'>".$ini_array['back']."</a></p>";
	//Переміщаємо аватарку в папку користувача
	if (isset($_POST["id"]) && !empty($_POST["id"])){
		if(isset($_FILES) && !empty($_FILES)){
			if($_FILES["userfile"]["error"] == 0){
				if (($_FILES["userfile"]["type"] == "image/png") or 
					($_FILES["userfile"]["type"] == "image/jpeg") or 
					($_FILES["userfile"]["type"] == "image/gif")){
						$tmp_name = $_FILES["userfile"]["tmp_name"];
						$f_name = $_FILES["userfile"]["name"];
						$result = select_user_id($id);
						$assoc = mysql_fetch_assoc ($result);
						$login = $assoc["login"];
						$dir = "../images/ava/".$login;
						remove_dir($dir,"");
						if (!file_exists($dir)){
							mkdir($dir);
						}						
						move_uploaded_file($tmp_name, $dir."/".$f_name);						
						echo $ini_array['image_update']."<br>";
				}else{
					exit ("$ini_array['file_type_error']");
				}
			}
		}
	}
?>