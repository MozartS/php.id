<table border="0" width="100%">			
	<?php
		if (!(isset($_GET["id"]))){
			$result = select_user_all();
			$i = 0;
			while($assoc = mysql_fetch_assoc($result)){?>
				<tr>					
					<td width = "30%">				
						<?php
							$uid = $assoc["uid"];
							$result3 = select_user_id_role($uid);
							$assoc3 = mysql_fetch_assoc ($result3);
							$result2 = select_user_id($uid);
							$assoc2 = mysql_fetch_assoc ($result2);
							$login = $assoc2["login"];
							$dir = "images/ava/".$login;
							$filename = name_file($dir);
							$dir .= "/".$filename;							
						?>	
							<img src="system/ava_create_admin.php?id=<?=$uid?>" class="image">	
						
						<td>
							<?php printf ("<p class = 'prof'>%s. <a href='index.php?page=edit_users&id=%s'>%s</a></p>",++$i,$assoc["uid"],$assoc["login"]);?>
							<p class = "author">mail: <?=$assoc["mail"]?></p>
							<p class = "author"><?=$ini_array["name"]?>: <?=$assoc["name"]?></p>
							<p class = "author"><?=$ini_array["family_name"]?>: <?=$assoc["lname"]?></p>										
							<p class = "author"><?=$ini_array["role"]?>: <?=$assoc3["name"]?></p>			
							<p class = "author"><?=$ini_array["date_registration"]?>: <?=$assoc["date"]?></p>
							<p class = "author"><?=$ini_array["last_visit"]?>: <?=$assoc["last_date"]?></p>
							<p class = "prof"><?php printf ("<a href='index.php?page=edit_users&id=%s'>%s</a>",$assoc["uid"],$ini_array["edit_profile"]);?></p>
							<p class = "prof"><?php printf ("<a href='index.php?page=user_account_del_admin&id=%s'>%s</a>",$assoc["uid"],$ini_array["del_profile"]);?></p>							
						</td>
					</td>
				</tr>
			<?php }
		}else{
			$id = (int)strip_tags($_GET["id"]);
			$result3 = select_user_id_role($id);
			$assoc3 = mysql_fetch_assoc ($result3);
			$result = select_user_id($id);
			$assoc = mysql_fetch_assoc($result);
			
			$login = $assoc["login"];
			$dir = "images/ava/".$login;
			$filename = name_file($dir);
			$dir .= "/".$filename;		
			//вибірка всіх ролей для select
			$result4 = select_roles_all();
	?>
		<div class="lang">
		<form enctype="multipart/form-data" action="system/user_account_admin.php" method="POST">
		<img src="system/ava_create_admin.php?id=<?=$id?>" class="image_admin">		
		<p><?=$ini_array["select_ava"]?>: <br><input type="file" name="userfile"></p>
		<p><?=$ini_array["name"]?>: <br><input type="text" name="name" value="<?=$assoc["name"]?>"></p>
		<p><?=$ini_array["family_name"]?>: <br><input type="text" name="lname" value="<?=$assoc["lname"]?>"></p>
		<p>mail: <br><input type="text" name="mail" value="<?=$assoc["mail"]?>"></p>
		<p><label for="role"><?=$ini_array["role"]?>:</label><br>
		<select name="role" id="role">
		<?php
			while ($assoc4 = mysql_fetch_assoc ($result4)){
				if ($assoc4["name"] == $assoc3["name"]) {
		?>
					<option value="<?=$assoc4["rid"]?>" selected><?=$assoc4["name"]?></option>
				<?php
				}else{
				?>
				<option value="<?=$assoc4["rid"]?>"><?=$assoc4["name"]?></option>
			<?php
				}
			}
			?>
		</select></p>		
		<input type="hidden" name="id" value="<?=$assoc["uid"]?>">
		<p><input type="submit">
		</form>
		</div>
	<?php
		}
	?>
</table>