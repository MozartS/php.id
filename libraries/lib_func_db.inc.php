<?php
	//функція збереження користувача в БД
	function save_user($login, $mail, $pass, $date){
		$sql = "INSERT INTO users (
								login,
								mail,
								pass,
								date
					) VALUES ( 
						'$login', 
						'$mail', 
						'$pass',
						'$date'
					)";
		mysql_query ($sql) or die (mysql_error());
	}
	//Перевірка чи існує корустувач в БД 
	function chek_user($login, $pass){
		$sql = "SELECT 
					login, 
					pass 
				FROM 
					users 
				WHERE 
					login='$login' and pass='$pass'
					";
		$result = mysql_query ($sql) or die (mysql_error());
		if(mysql_num_rows($result) == 1){
			$assoc = mysql_fetch_assoc($result);
			return $assoc;
		}else
			return false;
	}
	//Перевірка логіна
	function chek_login($login){
				$sql = "SELECT 
					login, 
					pass 
				FROM 
					users 
				WHERE 
					login='$login'
					";
		$result = mysql_query ($sql) or die (mysql_error());
		if(mysql_num_rows($result) == 1)		
			return true;
		else
			return false;
	}
	//Перевірка логіна
	function chek_mail($mail){
				$sql = "SELECT 
					mail
				FROM 
					users 
				WHERE 
					mail='$mail'
					";
		$result = mysql_query ($sql) or die (mysql_error());
		if(mysql_num_rows($result) == 1)		
			return true;
		else
			return false;
	}
	//функція збереження новин в БД
	function save_news($title, $date, $text, $author){
		$sql = "INSERT INTO news (
								title,
								date,
								text,
								author
					) VALUES (
						'$title',
						'$date',
						'$text',
						'$author'
					)";
		mysql_query ($sql) or die (mysql_error());
	}
	//функція збереження новин в БД на англійській мові
	function save_news_en ($title_en, $date_en, $text_en, $author_en){
		$sql = "INSERT INTO news_en (
								title,
								date,
								text,
								author
					) VALUES (
						'$title_en',
						'$date_en',
						'$text_en',
						'$author_en'
					)";
		mysql_query ($sql) or die (mysql_error());
	}
	//Вивід всіх новин
	function select_news(){
		$sql = "SELECT 
						id,
						title,
						date,
						text,
						author 
					FROM 
						news";
		$result = mysql_query ($sql) or die (mysql_error());
		return $result;
	}
	//Вивід всіх новин на англійській
	function select_news_en(){
		$sql = "SELECT 
						id,
						title,
						date,
						text,
						author 
					FROM 
						news_en";
		$result = mysql_query ($sql) or die (mysql_error());
		return $result;
	}
	//Вивід вказаної новини
	function select_news_id($id){
		$sql = "SELECT 
						id,
						title,
						date,
						text,
						author 
					FROM 
						news
					WHERE
						id=$id
						";
		$result = mysql_query ($sql) or die (mysql_error());
		return $result;
	}
	//Вивід вказаної новини на англійській
	function select_news_id_en($id){
		$sql = "SELECT 
						id,
						title,
						date,
						text,
						author 
					FROM 
						news_en
					WHERE
						id=$id
						";
		$result = mysql_query ($sql) or die (mysql_error());
		return $result;
	}
	//Оновлення новин в БД
	function update_news($id, $title, $date, $text, $author){
		$sql = "UPDATE news SET
							title='$title',
							date='$date',
							text='$text',
							author='$author'
						WHERE
							id='$id'
								";
		mysql_query ($sql) or die (mysql_error());
	}
	//Оновлення новин в БД на англійській
	function update_news_en($id, $title, $date, $text, $author){
		$sql = "UPDATE news_en SET
							title='$title',
							date='$date',
							text='$text',
							author='$author'
						WHERE
							id='$id'
								";
		mysql_query ($sql) or die (mysql_error());
	}
	//К-ть користувачів в БД
	function quantity_user(){
		$sql = "SELECT uid FROM users";
		$result = mysql_query ($sql) or die (mysql_error());
		return mysql_num_rows ($result);
	}
	//видалення новин з БД
	function delete_news($id){
		$sql = "DELETE FROM 
						news 
					WHERE 
						id='$id'
						";
		mysql_query ($sql) or die (mysql_error());
	}
	//видалення новин з БД на англійській
	function delete_news_en($id){
		$sql = "DELETE FROM 
						news_en 
					WHERE 
						id='$id'
						";
		mysql_query ($sql) or die (mysql_error());
	}
	//Функція вибірки даних користувача з БД за логіном
	function select_user($log){
		$sql = "SELECT 
						uid, 
						name, 
						lname, 
						mail,
						date,
						last_date
					FROM 
						users
					WHERE
						login='$log'
						";
		$result = mysql_query ($sql) or die (mysql_error());
		return $result;
	}
	//Оновлення даних користувача в БД за ллогіном
	function update_user($name, $lname, $mail, $log){
		$sql = "UPDATE users SET
							name='$name',
							lname='$lname',
							mail='$mail'
						WHERE
							login='$log'
								";
		mysql_query ($sql) or die (mysql_error());
	}
	//видалення користувача з БД за логіном
	function delete_user($log){
		$sql = "DELETE FROM 
						users 
					WHERE 
						login='$log'
						";
		mysql_query ($sql) or die (mysql_error());
	}
	//Оновлення останнього візиту користувача в БД
	function update_date($last_date, $log){
		$sql = "UPDATE users SET
							last_date='$last_date'
						WHERE
							login='$log'
								";
		mysql_query ($sql) or die (mysql_error());
	}
	//надання ролі користувачеві при реєстрації
	function user_role_reg($uid){
		$sql = "INSERT INTO users_roles (
										uid,
										rid
						) VALUES (
						'$uid',
						'3'
						)";
		mysql_query ($sql) or die (mysql_error());
	}
	//вибірка ролів
	function select_roles($uid){
		$sql = "SELECT 
						uid, 
						rid 
					FROM 
						users_roles
					WHERE
						uid='$uid'
						";
		$result = mysql_query ($sql) or die (mysql_error());
		return $result;
	}
	//Функція вибірки користувачів з БД
	function select_user_all(){
		$sql = "SELECT 
						uid, 
						name, 
						lname,
						login,
						mail,
						date,
						last_date
					FROM 
						users
						";
		$result = mysql_query ($sql) or die (mysql_error());
		return $result;
	}
	//Функція вибірки даних користувача з БД за id
	function select_user_id($id){
		$sql = "SELECT 
						uid, 
						name, 
						lname, 
						login,
						mail,
						date,
						last_date
					FROM 
						users
					WHERE
						uid='$id'
						";
		$result = mysql_query ($sql) or die (mysql_error());
		return $result;
	}
	//Оновлення даних користувача в БД за ллогіном
	function update_user_id($name, $lname, $mail, $id){
		$sql = "UPDATE users SET
							name='$name',
							lname='$lname',
							mail='$mail'
						WHERE
							uid='$id'
								";
		mysql_query ($sql) or die (mysql_error());
	}
	//видалення користувача з БД за id
	function delete_user_id($id){
		$sql = "DELETE FROM 
						users 
					WHERE 
						uid='$id'
						";
		mysql_query ($sql) or die (mysql_error());
	}
	//видалення користувача з БД за id
	function delete_role_id($id){
		$sql = "DELETE FROM 
						users_roles 
					WHERE 
						uid='$id'
						";
		mysql_query ($sql) or die (mysql_error());
	}
	//Функція вибірки даних користувача з БД за id
	function select_user_id_role($id){
		$sql = "SELECT 
						u.uid, 
						u.name, 
						u.lname, 
						u.login,
						u.mail,
						u.date,
						u.last_date,
						r.rid,
						r.name,
						ur.uid,
						ur.rid
					FROM 
						users u,
						role r,
						users_roles ur
					WHERE
						u.uid='$id' and ur.uid='$id' and ur.rid=r.rid
						";
		$result = mysql_query ($sql) or die (mysql_error());
		return $result;
	}
	//вибірка ролей з таблиці role
	function select_roles_all(){
		$sql = "SELECT 
						rid,
						name
					FROM
						role					
						";
		$result = mysql_query ($sql) or die (mysql_error());
		return $result;
	}
	//оновлення ролі для користувача
	function update_role($uid, $rid){
		$sql = "UPDATE
						users_roles
					SET
						rid='$rid'
					WHERE
						uid='$uid'
					";
		mysql_query ($sql) or die (mysql_error());
	}
?>