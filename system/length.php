<?php
	header ("content-type: text/html; charset=utf-8");
	session_start ();
	//підключаємо бібліотеки
	require ("../configuration.php");
	if ($_SESSION["lang"] == "ua")
		$_SESSION["lang"] = "en";
	else
		$_SESSION["lang"] = "ua";	
	header("Location:".$_SERVER['HTTP_REFERER']);
?>
