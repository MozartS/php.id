<table border="0" width="100%">
	<tr>
		<td>
			<form action="system/save_add_news.php" method="post">
				<h3><?=$ini_array["Fill_in_Ukrainian"]?></h3>
				<p><?=$ini_array["pres_name_news"]?>: <br><input type="text" name="title"></p>
				<p><?=$ini_array["press_date"]?>: <br><input type="text" name="date" value="<?=date('Y-m-d')?>"></p>				
				<p><?=$ini_array["press_text_news"]?>: <br><textarea name="text" id="text" cols="36" rows="5" ></textarea></p>
				<hr>
				<h3><?=$ini_array["Fill_in_UEnglish"]?></h3>
				<p><?=$ini_array["pres_name_news"]?>: <br><input type="text" name="title_en"></p>
				<p><?=$ini_array["press_date"]?>: <br><input type="text" name="date_en" value="<?=date('Y-m-d')?>"></p>				
				<p><?=$ini_array["press_text_news"]?>: <br><textarea name="text_en" id="text_en" cols="36" rows="5" ></textarea></p>
				<p><input type="submit" value="<?=$ini_array["add"]?>"></p>
			</form>
		</td>
	</tr>
</table>