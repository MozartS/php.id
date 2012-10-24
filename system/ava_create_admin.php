<?php	
	header ("Content-type: text/html; charset=utf-8");
	session_start();
	//підключаємо бібліотеки
	require ("../libraries/lib_func.inc.php");
	require ("../libraries/lib_db.inc.php");
	require ("../libraries/lib_func_db.inc.php");
	require ("../configuration.php");
	
	if (isset($_GET["id"])){
		$id = (int)strip_tags($_GET["id"]);
		$result = select_user_id($id, $db);
		$assoc = $result->fetch(PDO::FETCH_ASSOC);
		$login = $assoc["login"];
	}
	//отримання імені картинки
	
	$dir = "../images/ava/".$login;
	$ava_name = name_file($dir);
	
	//малюємо картинку 
	if (empty($ava_name)){
		create_image();
	}
	$filename = $dir."/".$ava_name;
	$width = 150;
	$height = 150;
	// визначення розмрів картинки
	list($width_orig, $height_orig) = getimagesize($filename);
	$orig = $width_orig/$height_orig;

	if ($width/$height > $orig){
	   $width = $height*$orig;
	}else{
	   $height = $width/$orig;
	}
	
//визначення типу картинки та зменшення
	$size = getimagesize($filename);  
	switch ($size['mime']) { 
		case "image/gif": 					
				header ("Content-Type: image/gif");
				$img = imagecreatetruecolor($width, $height);
				$im = imageCreateFromGif ($filename);
				imagecopyresampled($img, $im, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
				imagegif($img, $filename);
				imagegif($img);
			break; 
		case "image/jpeg": 
				header ("Content-Type: image/jpeg");
				$img = imagecreatetruecolor($width, $height);
				$im = imageCreateFromJpeg ($filename);					
				imagecopyresampled($img, $im, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
				imagejpeg($img, $filename, 100);
				imagejpeg($img);
			break; 
		case "image/png": 
				header ("Content-Type: image/png");
				$img = imagecreatetruecolor($width, $height);
				$im = imageCreateFromPng ($filename);					
				imagecopyresampled($img, $im, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
				imagepng($img, $filename, 9);
				imagepng($img);
			break;
	}
?>