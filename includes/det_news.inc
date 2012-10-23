<?php
	$id = (int)strip_tags($_GET["id"]);
		if ($_SESSION["lang"] == "ua")
			$result = select_news_id($id);
		else
			$result = select_news_id_en($id);	
	while ($assoc = mysql_fetch_assoc($result)){
?>
<div class="news" >
		<p class="title"><?=$assoc["title"]?></p>
		<p class="date"><?=$ini_array["date"]?>: <?=$assoc["date"]?></p>
		<p class="author_news"><?=$ini_array["author"]?>: <?=$assoc["author"]?></p><br>
		<p class="desc"><?=$assoc["text"]?></p><br><br>	
		<p><a href="index.php?page=news" class="decor"><< <?=$ini_array["previous_page"]?></a>		
		<?php
			if (isset($_SESSION["rid"])):
				$rid = $_SESSION["rid"];
				switch ($rid){
					case 1:?>
							<a href="index.php?page=edit_news&id=<?=$id?>" class="decor"><?=$ini_array["edit_newss"]?></a>
							<a href="system/delete_news.php?id=<?=$id?>" class="decor"><?=$ini_array["delete"]?></a>
					<?php break;
					case 2:?>
							<a href="index.php?page=edit_news&id=<?=$id?>" class="decor"><?=$ini_array["edit_newss"]?></a>
							<a href="system/delete_news.php?id=<?=$id?>" class="decor"><?=$ini_array["delete"]?></a>
					<?php break;
				}
			endif;
		?>
		</p>
</div><br>
<?php
	}
?>