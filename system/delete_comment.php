<?php
	header ("Content-type: text/html; charset=utf-8");
	session_start();
	//підключаємо бібліотеки
	require ("../libraries/lib_func.inc.php");
	require ("../libraries/lib_db.inc.php");
	require ("../libraries/lib_func_db.inc.php");
	require ("../configuration.php");
	include ("../language/language.inc");
	if (isset($_GET["id"]) && !empty($_GET["id"])){
		$id = $_GET["id"];
		delete_comment($id, $db);
		header("Location:".$_SERVER['HTTP_REFERER']);
	}
?>