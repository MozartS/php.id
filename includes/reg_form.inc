<table border="0" width="100%">
	<tr>
		<td>
			<form action="system/save_reg_form.php" method="post">
				<p><?=$ini_array["press_login"]?>: <br><input type="text" name="login"></p>
				<p><?=$ini_array["press_email"]?>: <br><input type="text" name="mail"></p>
				<p><?=$ini_array["press_pass"]?>: <br><input type="password" name="pass"></p>
				<p><?=$ini_array["press_password"]?>: <br><input type="password" name="pass2"></p>
				<input type="hidden" name="date" value="<?=date('Y-m-d')?>">
				<p><input type="submit" value="<?=$ini_array["sign_up"]?>"></p>
			</form>
		</td>
	</tr>
</table>