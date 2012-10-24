<?php
	//видалення користувача з БД та папки з авою і знищення сесії
	if (isset($_GET["id"]) && !empty($_GET["id"])){
		$id = (int)strip_tags($_GET["id"]);
		$result = select_user_id($id, $db);
		$assoc = $result->fetch(PDO::FETCH_ASSOC);
		$login = $assoc["login"];
		$dir = "images/ava/".$login;
		remove_dir($dir, "del_dir");
		delete_user_id($id, $db);
		delete_role_id($id, $db);
		echo "<html>
			<head>
			<meta http-equiv='Refresh' content='0; URL=index.php'>
			</head>
		</html>";
	}
?>