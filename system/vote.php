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
		$rating = $_POST["rating"];
		$id = $_POST["news_id"];
		$uid = $_SESSION["id"];
		$quantity = 1;	
		save_vote($rating, $id, $uid, $quantity, $db);
		header("Location:".$_SERVER['HTTP_REFERER']);		
	}
?>