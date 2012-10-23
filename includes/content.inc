<table border="0" width="100%">
	<tr>
		<td>
			<h1 align="center"><?=$ini_array["welcome_to"]?>:
				<br>
				<?php
					if(isset($_SESSION["login"])){
						echo $_SESSION["login"]."<br>";
						if (isset($_SESSION["rid"])){
							$rid = $_SESSION["rid"];
							if ($rid == 4){
								echo $ini_array['Your_account_has_been_locked']."!";
							}
						}
					}else	
						echo $ini_array["stranger"];
				?>
			</h1>	
		</td>
	</tr>
</table>