<table border="0" width="100%">
	<tr>
		<td>
			<?php
				if (!(isset($_GET["id"]))){
						if ($_SESSION["lang"] == "ua")
							$result = select_news();
						else
							$result = select_news_en();	
					$i = 0;
					while($assoc = mysql_fetch_assoc($result)){
						printf ("<p>%s. <a href='index.php?page=edit_news&id=%s'>%s</a></p>",++$i,$assoc["id"],$assoc["title"]);
					}
				}else{
					$id = (int)strip_tags($_GET["id"]);
					if ($_SESSION["lang"] == "ua")
						$result = select_news_id($id);
					else
						$result = select_news_id_en($id);					
					$assoc = mysql_fetch_assoc($result);
				?>
				<form action="system/update_news.php" method="post">
					<p><?=$ini_array["pres_name_news"]?>: <br><input type="text" name="title" value="<?=$assoc["title"]?>"></p>
					<p><?=$ini_array["press_date"]?>: <br><input type="text" name="date" value="<?=$assoc["date"]?>"></p>					
					<p><?=$ini_array["press_text_news"]?>: <br><textarea name="text" id="text" cols="36" rows="5" ><?=$assoc["text"]?></textarea></p>
					<p><?=$ini_array["press_author_news"]?>: <br><input type="text" name="author" value="<?=$assoc["author"]?>"></p>
					<input type="hidden" name="id" value="<?=$assoc["id"]?>">
					<p><input type="submit" value="<?=$ini_array["update"]?>"></p>
				</form>
			<?php
				}
			?>
		</td>
	</tr>
</table>