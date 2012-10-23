<?php
define ("DB_HOST","localhost");
define ("DB_LOGIN","root");
define ("DB_PASS","");
define ("DB_NAME","phpid");

$link = mysql_connect (DB_HOST, DB_LOGIN, DB_PASS) or die ("Помилка з'єднання з базою");
mysql_select_db (DB_NAME) or die (mysql_error());
?>