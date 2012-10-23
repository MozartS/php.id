<table border="0">
	<tr>
		<td>
			<h3 class = "menu_t"><?=$_SESSION["login"]?></h3>
			<div class="right_menu">
			<?php if (isset($_SESSION["rid"])){
						$rid = $_SESSION["rid"];
						if ($rid != 4){
						?>
							<a href="index.php?page=user_account"><?=$ini_array["my_profile"]?></a>
						<?php
						}
					}
			?>
			<a href="system/logout.php"><?=$ini_array["logout"]?></a>
			</div>
		</td>
	</tr>
</table>