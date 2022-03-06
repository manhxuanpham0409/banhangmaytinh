<?php   
// Code này được tải từ : www.sharecode.org 
$host="localhost";
$user="root";
$pass="";
$db="www.sharecode.org";
$connection=mysql_connect($host,$user,$pass) or die("Lỗi kết nối CSDl");
mysql_select_db($db)or die("Kết nối database không thành công");
mysql_query("SET NAMES 'utf8'");
?>