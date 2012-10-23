<?php
	$_SESSION["lang"] = isset($_SESSION["lang"])? $_SESSION["lang"]: "ua";
	$lang = $_SESSION["lang"];
	$lang = strip_tags($lang);
	$ini_array = parse_ini_file($lang.".ini");
?>