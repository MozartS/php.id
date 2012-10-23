<?php
	header ("Content-type: text/html; charset=utf-8");
	session_start();
	//підключаємо бібліотеки
	require ("../libraries/lib_func.inc.php");
	require ("../libraries/lib_db.inc.php");
	require ("../libraries/lib_func_db.inc.php");
	require ("../configuration.php");
	include ("../language/language.inc");
	//Перевіряємо чи була відправлена форма і фільтруємо данні
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if (isset($_POST["title"]) && !empty($_POST["title"]) &&
			isset($_POST["date"]) && !empty($_POST["date"]) &&			
			isset($_POST["text"]) && !empty($_POST["text"]) &&
			isset($_POST["author"]) && !empty($_POST["author"]))
			{
				$id = $_POST["id"];
				$title = clearData($_POST["title"]);
				$date = clearData($_POST["date"]);				
				$text = clearData($_POST["text"]);
				$author = clearData($_POST["author"]);
				if ($_SESSION["lang"] == "ua")
					update_news ($id, $title, $date, $text, $author);
				else
					update_news_en ($id, $title, $date, $text, $author);				
				echo $ini_array["News_successfully_updated"];
				echo "<p><a href='../index.php?page=det_news&id=$id'>".$ini_array['back']."</a></p>";
			}else{
			echo $ini_array['Incorrectly_filled_fields'];
			echo "<p><a href='../index.php?page=edit_news&id=$id'>".$ini_array['back']."</a></p>";
		}	
	}
?>