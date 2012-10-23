<?php
	if ($_SESSION["lang"] == "ua")
		$result = select_news();
	else
		$result = select_news_en();		
	while ($assoc = mysql_fetch_assoc($result)){
?>
<div class="news" >
		<p class="title"><a href="index.php?page=det_news&id=<?=$assoc["id"]?>" class="decor_b"><?=$assoc["title"]?></a></p>
		<p class="date"><?=$ini_array["date"]?>: <?=$assoc["date"]?></p>
		<p class="author_news"><?=$ini_array["author"]?>: <?=$assoc["author"]?></p><br>
		<p class="desc"><?php		
							$text = $assoc["text"];
							if (strlen($text) < 150){
								echo $text;
							}else{
								//echo mb_substr($text,0,150)."...";
								echo substr($text,0,150)."...";
							}
						?></p><br>
		<p><a href="index.php?page=det_news&id=<?=$assoc["id"]?>" class="decor"><?=$ini_array["more"]?>...</a></p>
</div><br>
<?php
	}
?>