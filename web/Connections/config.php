
<?php
// Code này được tải từ : www.sharecode.org 
session_start();
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_config = "localhost";
$database_config = "www.sharecode.org";
$username_config = "root";
$password_config = "";
$config = mysql_pconnect($hostname_config, $username_config, $password_config) or trigger_error(mysql_error(),E_USER_ERROR); 
ob_start();
mysql_query("set names 'utf8'");
?>