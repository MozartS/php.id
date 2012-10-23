<?php	
	header ("Content-type: text/html; charset=utf-8");
	session_start();
	//підключаємо бібліотеки
	require ("../configuration.php");
	require ("../libraries/lib_func.inc.php");
	header ('Content-Type: image/png');
	$im = imagecreatetruecolor(30, 16);
	imageantialias($im, true);
	$yellow = imagecolorallocate($im, 255, 255, 0);
	$blue = imagecolorallocate($im, 0, 200, 255);
	$dark_blue = imagecolorallocate($im, 0, 9, 228);
	$white = imagecolorallocate($im, 255, 255, 255);
	imagefilledrectangle($im, 0, 0, 30, 16, $yellow);
	imagefilledrectangle($im, 0, 0, 30, 8, $blue);
	imagepng($im);
	imagedestroy($im);
?>