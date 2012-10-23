<?php
	header ("Content-type: text/html; charset=utf-8");
	session_start();
	//підключаємо бібліотеки
	require ("../libraries/lib_func.inc.php");
	require ("../libraries/lib_db.inc.php");
	require ("../libraries/lib_func_db.inc.php");
	require ("../configuration.php");
	$log = $_SESSION["login"];
	$last_date = $_SESSION["date"];
	update_date($last_date, $log);
	destroy_sesion();
	header ("Location: ../index.php");
?>