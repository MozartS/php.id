<?php
	header ("Content-type: text/html; charset=utf-8");
	session_start();
	//підключаємо бібліотеки
	require ("libraries/lib_db.inc.php");
	require ("libraries/lib_func.inc.php");	
	require ("libraries/lib_func_db.inc.php");
	require ("configuration.php");
	include ("language/language.inc");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ID</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="65%" border="1px" align="center">
	<tr>
		<td colspan="3" align="center">
			<!-- Верхня частина сторінки -->
			<? include ("includes/header.inc")?>
		</td>
	</tr>
	<tr>
		<td valign="top" width="20%" align="center">
			<!-- Меню зліва -->
			<?php include ("includes/left_menu.inc")?>
		</td>
		<td valign="top" width="60%">
			<!-- Основний контент -->
			<?php
				if (isset($_GET["page"]) & !empty($_GET["page"])){
					$page = strip_tags($_GET["page"]);
					switch($page){
						case "reg_form":
							include ("includes/reg_form.inc");break;
						case "add_news":
							include ("includes/add_news.inc");break;	
						case "news":
							include ("includes/news.inc");break;			
						case "det_news":
							include ("includes/det_news.inc");break;
						case "edit_news":
							include ("includes/edit_news.inc");break;
						case "user_account":
							include ("includes/user_account.inc");break;
						case "user_account_edit":
							include ("includes/user_account_edit.inc");break;
						case "user_account_del":
							include ("includes/user_account_del.inc");break;
						case "edit_users":						
							include ("includes/edit_users.inc");break;
						case "user_account_del_admin":						
							include ("includes/user_account_del_admin.inc");break;
						default: include ("includes/content.inc");
					}					
				}else{										
					include ("includes/content.inc");
				}
				if (!empty($array_error)){
					show_error($array_error);
				}				
			?>
		</td>
		<td valign="top" width="20%"  align="center">
			<!-- Меню справа -->
			<?php
				if (isset($_SESSION["on"]) && $_SESSION["on"] == "on")
					include ("includes/ses_right_menu.inc");
				else	
					include ("includes/right_menu.inc");
			?>
		</td>
	</tr>
	<tr>
		<td colspan="3" align="center">
			<!-- Нижня частина сторінки -->
			<? include ("includes/footer.inc")?>
		</td>
	</tr>
</table>
</body>
</html>