<?php
	//видалення користувача з БД та папки з авою і знищення сесії
	if (isset($_GET["id"]) && !empty($_GET["id"])){
		$id = (int)strip_tags($_GET["id"]);
		$result = select_user_id($id);
		$assoc = mysql_fetch_assoc ($result);
		$login = $assoc["login"];
		$dir = "images/ava/".$login;
		remove_dir($dir, "del_dir");
		delete_user_id($id);
		delete_role_id($id);
		echo $ini_array["profile_del_successfully"];
		echo "<p><a href='index.php?page=edit_users'>".$ini_array['back']."</a></p>";
	}
?>