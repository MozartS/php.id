<?php
	//функція збереження користувача в БД
	function save_user($login, $mail, $pass, $date, $db){
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
		$db->prepare($sql)->execute();
	}
	//Перевірка чи існує корустувач в БД 
	function chek_user($login, $pass, $db){
		$sql = "SELECT 
					login, 
					pass 
				FROM 
					users 
				WHERE 
					login=:login and pass=:pass
					";
		$result = $db->prepare($sql);
		$result->bindParam(':login',$login, PDO::PARAM_STR);
		$result->bindParam(':pass',$pass, PDO::PARAM_STR);
		$result->execute();	
		$i=0;
		while($arr = $result->fetch(PDO::FETCH_ASSOC)){
			foreach ($arr as $v){
				$i++;
			}
		}
		return $i;
	}
	//Перевірка логіна
	function chek_login($login, $db){
				$sql = "SELECT 
							login, 
							pass 
						FROM 
							users 
						WHERE 
							login=:login
					";
		$result = $db->prepare($sql);
		$result->bindParam(':login',$login, PDO::PARAM_STR);
		$result->execute();	
		$i=0;
		while($arr = $result->fetch(PDO::FETCH_ASSOC)){
			foreach ($arr as $v){
				$i++;
			}
		}
		return $i;
	}
	//Перевірка логіна
	function chek_mail($mail, $db){
				$sql = "SELECT 
							mail
						FROM 
							users 
						WHERE 
							mail=:mail
					";
		$result = $db->prepare($sql);
		$result->bindParam(':mail',$mail, PDO::PARAM_STR);
		$result->execute();	
		$i=0;
		while($arr = $result->fetch(PDO::FETCH_ASSOC)){
			foreach ($arr as $v){
				$i++;
			}
		}
		return $i;
	}
	//функція збереження новин в БД
	function save_news($title, $date, $text, $author, $db){
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
		$db->prepare($sql)->execute();
	}
	//функція збереження новин в БД на англійській мові
	function save_news_en ($title_en, $date_en, $text_en, $author_en, $db){
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
		$db->prepare($sql)->execute();
	}
	//Вивід всіх новин
	function select_news($db){
		$sql = "SELECT 
						id,
						title,
						date,
						text,
						author 
					FROM 
						news";
		$result = $db->query($sql);
		return $result;
	}
	//Вивід всіх новин на англійській
	function select_news_en($db){
		$sql = "SELECT 
						id,
						title,
						date,
						text,
						author 
					FROM 
						news_en";
		$result = $db->query($sql);
		return $result;
	}
	//Вивід вказаної новини
	function select_news_id($id, $db){
		$sql = "SELECT 
						id,
						title,
						date,
						text,
						author 
					FROM 
						news
					WHERE
						id=:id
						";
		$result = $db->prepare($sql);
		$result->bindParam(':id',$id, PDO::PARAM_INT);
		$result->execute();		
		return $result;
	}
	//Вивід вказаної новини на англійській
	function select_news_id_en($id, $db){
		$sql = "SELECT 
						id,
						title,
						date,
						text,
						author 
					FROM 
						news_en
					WHERE
						id=:id
						";
		$result = $db->prepare($sql);
		$result->bindParam(':id',$id, PDO::PARAM_INT);
		$result->execute();		
		return $result;
	}
	//Оновлення новин в БД
	function update_news($id, $title, $date, $text, $author, $db){
		$sql = "UPDATE news SET
							title='$title',
							date='$date',
							text='$text',
							author='$author'
						WHERE
							id=:id
								";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id',$id, PDO::PARAM_INT);
		$stmt->execute();
	}
	//Оновлення новин в БД на англійській
	function update_news_en($id, $title, $date, $text, $author, $db){
		$sql = "UPDATE news_en SET
							title='$title',
							date='$date',
							text='$text',
							author='$author'
						WHERE
							id=:id
								";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id',$id, PDO::PARAM_INT);
		$stmt->execute();
	}
	//К-ть користувачів в БД
	function quantity_user($db){
		$sql = "SELECT uid FROM users";
		$stmt = $db->query($sql);
		$i=0;
		while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
			foreach ($res as $v){
				$i++;
			}
		}
		return $i;
	}
	//видалення новин з БД
	function delete_news($id, $db){
		$sql = "DELETE FROM 
						news 
					WHERE 
						id=:id
						";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id',$id, PDO::PARAM_INT);
		$stmt->execute();
	}
	//видалення новин з БД на англійській
	function delete_news_en($id, $db){
		$sql = "DELETE FROM 
						news_en 
					WHERE 
						id=:id
						";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id',$id, PDO::PARAM_INT);
		$stmt->execute();
	}
	//Функція вибірки даних користувача з БД за логіном
	function select_user($log, $db){
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
		$stmt = $db->query($sql);
		return $stmt;
	}
	//Оновлення даних користувача в БД за ллогіном
	function update_user($name, $lname, $mail, $log, $db){
		$sql = "UPDATE users SET
							name='$name',
							lname='$lname',
							mail='$mail'
						WHERE
							login=:log
								";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':log',$log, PDO::PARAM_STR);
		$stmt->execute();
	}
	//видалення користувача з БД за логіном
	function delete_user($log, $db){
		$sql = "DELETE FROM 
						users 
					WHERE 
						login='$log'
						";
		$db->exec($sql);
	}
	//Оновлення останнього візиту користувача в БД
	function update_date($last_date, $log, $db){
		$sql = "UPDATE users SET
							last_date='$last_date'
						WHERE
							login='$log'
								";
		$db->exec($sql);
	}
	//надання ролі користувачеві при реєстрації
	function user_role_reg($uid, $db){
		$sql = "INSERT INTO users_roles (
										uid,
										rid
						) VALUES (
						'$uid',
						'3'
						)";
		$db->exec($sql);
	}
	//вибірка ролів
	function select_roles($uid, $db){
		$sql = "SELECT 
						uid, 
						rid 
					FROM 
						users_roles
					WHERE
						uid='$uid'
						";
		$result = $db->query($sql);
		return $result;
	}
	//Функція вибірки користувачів з БД
	function select_user_all($db){
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
		$result = $db->query($sql);
		return $result;
	}
	//Функція вибірки даних користувача з БД за id
	function select_user_id($id, $db){
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
		$result = $db->query($sql);
		return $result;
	}
	//Оновлення даних користувача в БД за ллогіном
	function update_user_id($name, $lname, $mail, $id, $db){
		$sql = "UPDATE users SET
							name='$name',
							lname='$lname',
							mail='$mail'
						WHERE
							uid='$id'
								";
		$db->exec($sql);
	}
	//видалення користувача з БД за id
	function delete_user_id($id, $db){
		$sql = "DELETE FROM 
						users 
					WHERE 
						uid=:id
						";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id',$id, PDO::PARAM_INT);
		$stmt->execute();
	}
	//видалення користувача з БД за id
	function delete_role_id($id, $db){
		$sql = "DELETE FROM 
						users_roles 
					WHERE 
						uid=:id
						";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id',$id, PDO::PARAM_INT);
		$stmt->execute();
	}
	//Функція вибірки даних користувача з БД за id
	function select_user_id_role($id, $db){
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
		$result = $db->query($sql);
		return $result;
	}
	//вибірка ролей з таблиці role
	function select_roles_all($db){
		$sql = "SELECT 
						rid,
						name
					FROM
						role					
						";
		$result = $db->query($sql);
		return $result;
	}
	//оновлення ролі для користувача
	function update_role($uid, $rid, $db){
		$sql = "UPDATE
						users_roles
					SET
						rid='$rid'
					WHERE
						uid='$uid'
					";
		$db->exec($sql);
	}
	//функція збереження коментарів в БД
	function save_comments($uid, $theme, $comment, $author, $date, $id, $db){
		$sql = "INSERT INTO comments (
								uid,
								theme,
								comment,
								author,
								date,
								id
					) VALUES ( 
						'$uid', 
						'$theme', 
						'$comment',
						'$author',
						'$date',
						'$id'
					)";
		$db->prepare($sql)->execute();
	}
	//вибірка коментарів з БД
	function select_comments_id($id, $db){
		$sql = "SELECT 
					cid,
					uid,
					theme,
					comment,
					author,
					date
				FROM
					comments
				WHERE
					id = '$id'
					";
		$stmt = $db->query($sql);
		return $stmt;
	}
	//видалення коментарію
	function delete_comment($id, $db){
		$sql = "DELETE FROM
						comments
					WHERE
						cid=:id
						";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id',$id, PDO::PARAM_INT);
		$stmt->execute();
	}
	//записуємо дані голосування в БД
	function save_vote($rating, $id, $uid, $quantity, $db){
		$sql = "INSERT INTO vote (
							uid,
							id,
							quantity,
							rating )
					VALUES (
						$uid,
						$id,
						$quantity,
						$rating
						)";
		$db->query($sql);
	}
	//витягуємо все голосування з БД для новини за її id
	function select_vote_nid($id, $db){
		$sql = "SELECT 
					uid,
					id,
					quantity,
					rating
				FROM
					vote
				WHERE
					id=$id
					";
		$stmt = $db->query($sql);
		return $stmt;
	}
	//видалення оцінки користувача для даної новини
	function delete_vote($id, $uid, $db){
		$sql = "DELETE FROM
						vote
					WHERE
						id=:id and
						uid=:uid
						";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id',$id, PDO::PARAM_INT);
		$stmt->bindParam(':uid',$uid, PDO::PARAM_INT);
		$stmt->execute();
	}
	//витягуємо все голосування з БД для новини за її id
	function select_vote_nid_id($id, $db){
		$sql = "SELECT 
					uid,
					id,
					quantity,
					rating
				FROM
					vote
				WHERE
					id=$id
					";
		$stmt = $db->query($sql);
		$i=0;
		while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
			foreach ($res as $v){
				$i++;
			}
		}
		return $i;
	}
	//шукаємо оцінку користувача до даної новини 
	function select_vote_uid($id, $uid, $db){
		$sql = "SELECT 
					uid,
					id,
					quantity,
					rating
				FROM
					vote
				WHERE
					id=$id and
					uid=$uid
					";
		$stmt = $db->query($sql);
		$i=0;
		while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
			foreach ($res as $v){
				$i++;
			}
		}
		return $i;
	}
	//видалення всього голосування для новини
	function delete_vote_admin($id, $db){
		$sql = "DELETE FROM
						vote
					WHERE
						id=:id
						";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id',$id, PDO::PARAM_INT);
		$stmt->execute();		
	}
?>