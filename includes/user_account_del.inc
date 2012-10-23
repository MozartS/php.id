<?php
	//видалення користувача з БД та папки з авою і знищення сесії
	$log = $_SESSION["login"];	
	$dir = "images/ava/".$log;
	remove_dir($dir, "del_dir");
	delete_user($log);
	destroy_sesion();
	echo $ini_array['profile_del'];
	echo "<p><a href='index.php'>".$ini_array['back']."</a></p>";
?>