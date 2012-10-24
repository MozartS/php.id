<?php
	//видалення користувача з БД та папки з авою і знищення сесії
	$log = $_SESSION["login"];	
	$dir = "images/ava/".$log;
	remove_dir($dir, "del_dir");
	delete_user($log, $db);
	destroy_sesion();
	echo "<html>
			<head>
			<meta http-equiv='Refresh' content='0; URL=index.php'>
			</head>
		</html>";
?>