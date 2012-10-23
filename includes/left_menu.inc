<table border="0">
	<tr>
		<td>
			<h3 class = "menu_t"><?=$ini_array["menu"]?></h3>
			<div id="menu">				
				<?php
					if (isset($_SESSION["rid"])):
						$rid = $_SESSION["rid"];
						switch ($rid){
							case 1:?>
								<a href="index.php"><?=$ini_array["home"]?></a>
								<a href="index.php?page=news"><?=$ini_array["news"]?></a>
								<a href="index.php?page=add_news"><?=$ini_array["add_news"]?></a>
								<a href="index.php?page=edit_news"><?=$ini_array["edit_news"]?></a>
								<a href="index.php?page=edit_users"><?=$ini_array["admin_panel"]?></a>
							<?php break;
							case 2:?>
								<a href="index.php"><?=$ini_array["home"]?></a>
								<a href="index.php?page=news"><?=$ini_array["news"]?></a>
								<a href="index.php?page=add_news"><?=$ini_array["add_news"]?></a>
								<a href="index.php?page=edit_news"><?=$ini_array["edit_news"]?></a>
							<?php break;
							case 3:?>
								<a href="index.php"><?=$ini_array["home"]?></a>
								<a href="index.php?page=news"><?=$ini_array["news"]?></a>
							<?php 
							case 4:?>								
							<?php break;
						}
					else :?>
						<a href="index.php"><?=$ini_array["home"]?></a>
						<a href="index.php?page=news"><?=$ini_array["news"]?></a>
						<?php 
					endif;
				?>
			<div>
		</td>	
	</tr>
</table>