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
			isset($_POST["author"]) && !empty($_POST["author"]) &&
			isset($_POST["title_en"]) && !empty($_POST["title_en"]) &&
			isset($_POST["date_en"]) && !empty($_POST["date_en"]) &&
			isset($_POST["text_en"]) && !empty($_POST["text_en"]) &&
			isset($_POST["author_en"]) && !empty($_POST["author_en"])){
				$title = clearData($_POST["title"]);
				$date = clearData($_POST["date"]);
				$text = clearData($_POST["text"]);
				$author = clearData($_POST["author"]);
				save_news ($title, $date, $text, $author);
				$title_en = clearData($_POST["title_en"]);
				$date_en = clearData($_POST["date_en"]);
				$text_en = clearData($_POST["text_en"]);
				$author_en = clearData($_POST["author_en"]);
				save_news_en ($title_en, $date_en, $text_en, $author_en);
				echo "<p>".$ini_array['News_successfully_add']."</p>";
				echo "<p><a href='../index.php'>".$ini_array['back']."</a></p>";
			}else{
			echo "<p>".$ini_array['Incorrectly_filled_fields']."</p>";
			echo "<p><a href='../index.php?page=add_news'>".$ini_array['back']."</a></p>";
		}
	}
?>