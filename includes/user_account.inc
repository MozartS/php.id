<?php
	$log = $_SESSION["login"];
	select_user($log);
	$result = select_user($log);
	$assoc = mysql_fetch_assoc ($result);
?>
<table border="0" cellspacing="0" cellpadding="0">
	<tr>				
		<td>
			<img src="system/ava_create.php" class="image">
			<td>
				<p class = "author">mail: <?=$assoc["mail"]?></p>
				<p class = "author"><?=$ini_array["name"]?>: <?=$assoc["name"]?></p>
				<p class = "author"><?=$ini_array["family_name"]?>: <?=$assoc["lname"]?></p>
				<p class = "author"><?=$ini_array["date_registration"]?>: <?=$assoc["date"]?></p>
				<p class = "author"><?=$ini_array["last_visit"]?>: <?=$assoc["last_date"]?></p>			
				<p class = "prof"><a href="index.php?page=user_account_edit"><?=$ini_array["edit_profile"]?></a></p>
				<p class = "prof"><a href="index.php?page=user_account_del"><?=$ini_array["del_profile"]?></a></p>
			</td>
		</td>
	</tr>
</table>