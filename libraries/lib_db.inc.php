<?php
define ("DB_HOST","localhost");
define ("DB_LOGIN","root");
define ("DB_PASS","");
define ("DB_NAME","phpid");

try{
	$db = new PDO ("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_LOGIN, DB_PASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
}catch(PDOException $e){
	echo $e->getMessage();
}
?>