<?php
	if (isset($_GET["id"])){
		$id = (int)strip_tags($_GET["id"]);
		$result = select_user_id($id, $db);
		$assoc = $result->fetch(PDO::FETCH_ASSOC);
	}else{
		$log = $_SESSION["login"];
		$result = select_user($log, $db);
		$assoc = $result->fetch(PDO::FETCH_ASSOC);
	}
?>
<table border="0" cellspacing="0" cellpadding="0">
	<tr>				
		<td>
			<?php
			if (isset($_GET["id"])){
			?>
				<img src="system/ava_create_admin.php?id=<?=$id?>" class="image">
			<?php 
			}else{
			?>
				<img src="system/ava_create.php" class="image">
			<?php
			}
			?>			
			<td>
				<p class = "author">mail: <?=$assoc["mail"]?></p>
				<p class = "author"><?=$ini_array["name"]?>: <?=$assoc["name"]?></p>
				<p class = "author"><?=$ini_array["family_name"]?>: <?=$assoc["lname"]?></p>
				<p class = "author"><?=$ini_array["date_registration"]?>: <?=$assoc["date"]?></p>
				<p class = "author"><?=$ini_array["last_visit"]?>: <?=$assoc["last_date"]?></p>	
			<?php
				if (!isset($_GET["id"])){
			?>				
				<p class = "prof"><a href="index.php?page=user_account_edit"><?=$ini_array["edit_profile"]?></a></p>
				<p class = "prof"><a href="index.php?page=user_account_del"><?=$ini_array["del_profile"]?></a></p>
			<?php
				}
			?>
			</td>
		</td>
	</tr>
</table>