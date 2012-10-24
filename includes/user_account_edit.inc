<table border="0">
	<tr>
		<td>
			<?php
				$log = $_SESSION["login"];
				$dir = "images/ava/".$log;
				$filename = name_file($dir);
				$dir .= "/".$filename;		
				$result = select_user($log, $db);
				$assoc = $result->fetch(PDO::FETCH_ASSOC);
			?>
			<form enctype="multipart/form-data" action="system/user_account.php" method="POST">
			<img src="system/ava_create_admin.php?id=<?=$assoc["uid"]?>" class="image_admin">
			<p><?=$ini_array["select_ava"]?>: <br><input type="file" name="userfile"></p>
			<p><?=$ini_array["name"]?>: <br><input type="text" name="name" value="<?=$assoc["name"]?>"></p>
			<p><?=$ini_array["family_name"]?>: <br><input type="text" name="lname" value="<?=$assoc["lname"]?>"></p>
			<p>Mail: <br><input type="text" name="mail" value="<?=$assoc["mail"]?>"></p>
			<p><input type="submit">
			</form>
		</td>
	</tr>
</table>