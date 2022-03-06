<?php
/*
#4.3.0 2007 02 06
# 
# Script: poll-options.php
#################################################################################################
## Copright (c) 2007 - PHPjabbers.com - webmasters tools and help http://www.phpjabbers.com/   ##
## Not for resale										                                       ##
## info@phpjabbers.com                                                             			   ##
#################################################################################################
##        Custom Web Development - Dynamic Content - Website scripts                           ##
##                          www.phpjabbers.com                                                 ##
#################################################################################################
## This code is protected by international copyright.                                          ##
## DO NOT POST or distribute portions of code on any site / forum etc.                         ##
#################################################################################################
#
#
*/

$SETTINGS = Array ( 

"hostname"   => 'localhost',  /////// MySQL server, usually `localhost`. It can also be IP address, or valid domain name

"mysql_user" => 'root',  ////////////// username for MySQL server

"mysql_pass" => 'root',  ////////////// password for MySQL server

"mysql_database" => 'digital_life', //////////// MySQL database name

"admin_username" => 'admin', ////////  ADMIN USERNAME

"admin_password" => 'admin',  ////////  ADMIN PASSWORD

"installURL" => 'http://localhost/star_computer/WebPoll/',

"useCookie" => true,

"maxAnswers" => '15'

);
///////////////////////////////////////////////////////////////////////
///				DO NOT EDIT BELOW THIS LINE			   			//////
//////////////////////////////////////////////////////////////////////
$TABLES["QUESTIONS"] = 'webpoll_questions_ver';
$TABLES["ANSWERS"] = 'webpoll_answers_ver';
$TABLES["COLORS"] = 'webpoll_colors_ver';
$TABLES["VOTES"] = 'webpoll_votes_ver';

if ($install != '1') {
	$connection = mysql_connect($SETTINGS["hostname"], $SETTINGS["mysql_user"], $SETTINGS["mysql_pass"]) or die ('request "Unable to connect to MySQL server."');
	$db = mysql_select_db($SETTINGS["mysql_database"], $connection) or die ('request "Unable to select database."');
};

$monthnames_arr = Array("","January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
?>
