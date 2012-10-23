<table border="0">
	<tr>
		<td>
			<h3 align="center" class = "menu_t"><?=$ini_array["authorization"]?></h3>
			<form action="system/login.php" method="POST">				
				<p><?=$ini_array["press_login"]?>: <input type="text" name="login"></p>
				<p><?=$ini_array["press_pass"]?>: <input type="password" name="pass"></p>
				<p><input type="submit" value="<?=$ini_array["login"]?>"></p>
			</form>
			<p><a href="index.php?page=reg_form"><?=$ini_array["registration"]?></a></p>
		</td>
	</tr>
</table>