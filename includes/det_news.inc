<?php
	$id = (int)strip_tags($_GET["id"]);
		if ($_SESSION["lang"] == "ua")
			$result = select_news_id($id, $db);
		else
			$result = select_news_id_en($id, $db);
	while ($assoc = $result->fetch()){
?>
<!-- новини -->
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
		<!-- Результат голосування -->
<div>
	<?php
		if(isset($_SESSION["login"])){
				if(select_vote_nid_id($id, $db) > 0){
					$res2 = select_vote_nid($id, $db);
					$j = 0;
					$sum = 0;
					$you_rating = 0;
					while ($as2 = $res2->fetch()){
						$sum += $as2["rating"];
						$j++;
						if($_SESSION["id"] == $as2["uid"]){
							$you_rating = $as2["rating"];
						}
					}		
					$average = $sum/$j;
					echo "<p class='averge'>".$ini_array['Average_material'].": ".substr($average,0,3);
					echo "<p class='averge'>".$ini_array['Quantity_votes'].": ".$j."</p>";
					echo "<p class='averge'>".$ini_array['Your_rating_of_the_material'].": ".$you_rating;
					echo "<a href='system/del_vote.php?id=$id' class='del_rating'><div  class='right'>".$ini_array['Remove_rating']."</div></a></p>";					
					if($_SESSION["rid"] == 1){
						echo "<a href='system/del_vote_admin.php?id=$id' class='del_rating'><div  align='right'>".$ini_array['Remove_all_rating']."</div></a></p>";
					}
				}else{ ?>
					<p class='averge'><?=$ini_array['For_more_metrial_none']?></p>
				<?php	
				}
				?>	
			<?php		
				$uid = $_SESSION["id"];
				if(select_vote_uid($id, $uid, $db) == 0){ ?>
</div>
<!-- форма голосування -->
				<div class="vote" >
					<form action="system/vote.php" method="post">
						<p class='averge'><?=$ini_array['Vote']?>:</p>
						<input type="radio" name="rating" value="1">1
						<input type="radio" name="rating" value="2">2
						<input type="radio" name="rating" value="3" checked>3
						<input type="radio" name="rating" value="4">4
						<input type="radio" name="rating" value="5">5
						<input type="hidden" name="news_id" value="<?=$id?>">
						<p><input type="submit" value="<?=$ini_array['Vote']?>"></p>
					</form>
				</div>
			<?php
			}
		}
?>
</div>
</div>
<!-- коментарі -->
<?php 
if(isset($_SESSION["login"])){
?>
		<div class="comments" >
			<?php
				$res = select_comments_id($id, $db);
				while($as = $res->fetch(PDO::FETCH_ASSOC)){ ?>
				<table  class="comment_table" width="100%">
					<tr>
						<td width="150" valign="top">
							<img src="system/ava_create_admin.php?id=<?=$as["uid"]?>" class="img_comment">
							<div class="author_comment"><?=$ini_array['author']?>: <a href="index.php?page=user_account&id=<?=$as["uid"]?>"><?=$as["author"]?></a><br>
							<?=$ini_array['date']?>: <?=$as["date"]?></div>
						</td>
						<td  valign="top">
							<?php
								if ($as["theme"] == ""){
									$tx = $as["comment"];
									if(strlen($tx) > 15){
										$pos = strpos($tx, " ", 15);
									}else{
										$pos = 15;
									}
									
									$tm = substr($tx,0,$pos);
								}else{
									$tm = $as["theme"];
								}
							?>
							<div class="theme"><?=$tm?></div>
							<div class="text_comment"><?=$as["comment"]?></div>
							<?php
								if($_SESSION["id"] == $as["uid"] or ($_SESSION["rid"] == 1)){?>
									<br><a href="system/delete_comment.php?id=<?=$as["cid"]?>"class="del_comment">Видалити коментар</a>
								<?php
								}
							?>
						</td>
					</tr>
				</table><br><hr width="100%"><br>
				<?php
				}
			?>
		</div>
		<!-- форма коментарів -->
		<div class="comments" >
			<form action="system/comments.php" method="post">
				<h3><?=$ini_array["Add_a_comment"]?></h3>
				<p><?=$ini_array["Post_a_comment"]?>: <br><input type="text" name="theme"></p>
				<p><?=$ini_array["Comment"]?> <br><textarea name="comment" id="comment" cols="50" rows="8" ></textarea></p>
				<input type="hidden" name="news_id" value="<?=$id?>">
				<p><input type="submit" value="<?=$ini_array["add"]?>"></p>
			</form>
		</div>
		<?php
			}
		?>
<?php
}
?>