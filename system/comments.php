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
		if (isset($_POST["comment"]) && !empty($_POST["comment"])){
				$theme = clearData($_POST["theme"]);
				$comment = clearData($_POST["comment"]);				
				$author = $_SESSION["login"];
				$uid = $_SESSION["uid"];
				$date = date('Y-m-d,H-i-s');
				$id = $_POST["news_id"];
				save_comments($uid, $theme, $comment, $author, $date, $id, $db);
				echo "<html>
						<head>
						<meta http-equiv='Refresh' content='0; URL=../index.php?page=det_news&id=".$id."'>
						</head>
					</html>";				
			}else{
			
		}
	}
?>