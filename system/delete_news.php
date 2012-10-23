<?php
	header ("Content-type: text/html; charset=utf-8");
	session_start();
	//підключаємо бібліотеки
	require ("../libraries/lib_func.inc.php");
	require ("../libraries/lib_db.inc.php");
	require ("../libraries/lib_func_db.inc.php");
	require ("../configuration.php");
	include ("../language/language.inc");
	//Перевіряємо чи були передані данні і відфільтруємо їх
	if (isset($_GET["id"]) && !empty($_GET["id"])){
		$id = $_GET["id"];
		if ($_SESSION["lang"] == "ua")
			delete_news($id);
		else
			delete_news_en($id);		
		echo $ini_array['News_successfully_removed'];
		echo "<p><a href='../index.php?page=news'>".$ini_array['back']."</a>";
	}
?>