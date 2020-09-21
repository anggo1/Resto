<?php
$hostname_conn="localhost";
$username_conn="root";
$password_conn="SQL2016SJ08";
$db_conn="db_humaskum";
mysql_connect($hostname_conn,$username_conn,$password_conn,$db_conn) or die ("Sorry, there's a problem with our database.");
mysql_select_db($db_conn);
?>