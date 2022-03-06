<?php

/*
Tao table: 

CREATE TABLE `users_online` (
`visitor` VARCHAR( 15 ) NOT NULL ,
`lastvisit` INT( 14 ) NOT NULL,
`username` VARCHAR( 100 ) NOT NULL );
*/
$uo_sessionTime = 5; //length in **minutes** to keep the user online before deleting
$uo_sqluser = "root";     //mysql username
$uo_sqlpass = "";     //mysql password
$uo_sqlhost = "localhost";    //mysql host
$uo_sqlbase = "digital_life"; //mysql database

error_reporting(E_ERROR | E_PARSE);
mysql_connect($uo_sqlhost,$uo_sqluser,$uo_sqlpass);
mysql_select_db($uo_sqlbase);
//@mysql_connect($uo_sqlhost, $uo_sqluser, $uo_sqlpass) or die("Users online can't connect to MySQL");
//@mysql_select_db($uo_sqlbase) or die("Users online can't select database");

$uo_ip = $_SERVER['REMOTE_ADDR'];


//cleanup part
$uo_query = "DELETE FROM users_online WHERE unix_timestamp() - lastvisit >= $uo_sessionTime * 60";
mysql_query($uo_query);

//check/insert part
$uo_query = "SELECT lastvisit FROM users_online WHERE visitor = '$uo_ip'";
$un=$_SESSION['kt_login_user'];
$uo_result = mysql_query($uo_query) or die (mysql_error());
if(mysql_num_rows($uo_result) == 0) { //no match
	$uo_query = "INSERT INTO users_online VALUES('$uo_ip', unix_timestamp(),'$un' )";
	mysql_query($uo_query) or die(mysql_error());
} else { //matched, update them
	$uo_query = "UPDATE users_online SET lastvisit = unix_timestamp(), username='$un' WHERE visitor = '$uo_ip'";
	mysql_query($uo_query);
}

//count part
if($uo_keepquiet == FALSE) {
	$uo_query = "SELECT count(*) FROM users_online";
	$uo_result = mysql_query($uo_query);
	$uo_count = mysql_fetch_row($uo_result);
	echo $uo_count[0];
	
}
//mysql_close();
?>