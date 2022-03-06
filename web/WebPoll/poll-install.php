<?php
/*
#4.3.0 2007 02 06
# 
# Script: poll-install.php
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

error_reporting(0);
$install = 1;
include("poll-options.php");
?>
<html>
<head>
<title>Web Poll - Installation</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="javascript" src="poll.js"></script>
<link href="poll.css" rel="stylesheet" type="text/css" />
</head>
<body bgcolor="#7F9274">
<center>
<table width="780" height="31" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border-bottom:2px solid #373737">
<tr>
  <td align="left" valign="top" style="padding:20px">
<?php
if (!isset($_REQUEST["step"])){
	$$errorMessage = '';
	$connection = mysql_connect($SETTINGS["hostname"], $SETTINGS["mysql_user"], $SETTINGS["mysql_pass"]);
	if (!$connection) {
		$errorMessage = "MySQL login details that you've prodived are incorrect. Please, check your login details or contact your HOSTING COMPANY to verify them. Please, ask your hosting company for a working PHP script which connects to MySQL so we can be sure that you have the correct details. OR just send us login details for your hosting account control panel and we will install the script for you.
		<br><strong>error message: " . mysql_error()."</strong>";
	} else {
		$db = mysql_select_db($SETTINGS["mysql_database"], $connection);;
		if (!$db) {
			$errorMessage = "Unable to select database. Your MySQL username and password are correct but your MySQL database name is incorrect. Please check database name.";
		};
	};
?>
<form action="poll-install.php" method="post">
<input type="hidden" name="step" value="2" />
<table width="550" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td colspan="2"><strong>
		<?php
		if ($errorMessage<>'') {
			echo $errorMessage;
		} else {
			echo "These are the login details that Web Poll will use to install and run:";
		};
		?>
		</strong>
        </td>
        </tr>
      <tr>
        <td width="119">Hostname:</td>
        <td width="423"><?php echo $SETTINGS["hostname"]; ?></td>
      </tr>
      <tr>
        <td>MySQL database name: </td>
        <td><?php echo $SETTINGS["mysql_database"]; ?></td>
      </tr>
      <tr>
        <td>MySQL username: </td>
        <td><?php echo $SETTINGS["mysql_user"]; ?></td>
      </tr>
      <tr>
        <td>MySQL password: </td>
        <td><?php echo $SETTINGS["mysql_pass"]; ?></td>
      </tr>
	<?php 	if ($errorMessage=='') {  ?>
      <tr>
        <td colspan="2"><input type="submit" name="Submit" value="Install poll" /></td>
        </tr>
	<?php }; ?>	
    </table>
</form>	
<?php
} elseif ($_REQUEST["step"]=='2') {

	$connection = mysql_connect($SETTINGS["hostname"], $SETTINGS["mysql_user"], $SETTINGS["mysql_pass"]);
	if (!$connection) {
		echo "Unable to connect to MySQL server. Please, check your login details! <br><strong>error message: " . mysql_error()."</strong>";
	} else {
		$db = mysql_select_db($SETTINGS["mysql_database"], $connection);;
		if (!$db) {
			echo "Unable to select database. Please check database name.";
		} else {
		
			$sql = "DROP TABLE IF EXISTS `".$TABLES["COLORS"]."`;";
			$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);

			$sql = "CREATE TABLE `".$TABLES["COLORS"]."` (                     
                       `ID` int(11) NOT NULL auto_increment,                  
                       `SET_NAME` varchar(200) default NULL,                      
                       `POLL_BG` varchar(7) default NULL,                     
                       `QUESTION_BG` varchar(7) default NULL,                 
                       `QUESTION_TXT` varchar(7) default NULL,                
                       `ANSWER_TXT` varchar(7) default NULL,                  
                       `MOUSE_OVER` varchar(7) default NULL,                  
                       `MOUSE_OUT` varchar(7) default NULL,                   
                       `VOTE_BTN_BG` varchar(7) default NULL,                 
                       `VOTE_BTN_TXT` varchar(7) default NULL,                
                       `TOTAL_VOTES` varchar(7) default NULL,                 
                       `VOTES_BAR` varchar(7) default NULL,                   
                       PRIMARY KEY  (`ID`))";
			$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);

			$sql = "INSERT INTO `".$TABLES["COLORS"]."` 
						SET `ID` = null, 
							`SET_NAME` = 'Default Color Set', 
						    `POLL_BG` = '999966', 
						    `QUESTION_BG` = '000000', 
						    `QUESTION_TXT` = 'FFFFFF', 
						    `ANSWER_TXT` = 'FFFFFF', 
						    `MOUSE_OVER` = '999966', 
						    `MOUSE_OUT` = 'FFFFFF', 
						    `VOTE_BTN_BG` = '000000', 
						    `VOTE_BTN_TXT` = 'FFFFFF', 
						    `TOTAL_VOTES` = '000000', 
						    `VOTES_BAR` = '000000'";
							
			$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);

			$sql = "DROP TABLE IF EXISTS `".$TABLES["QUESTIONS"]."`;";
			$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);

			$sql = "CREATE TABLE `".$TABLES["QUESTIONS"]."` (                      
                      `ID` int(11) NOT NULL auto_increment,                  
                      `COLOR_SET_ID` varchar(11) default NULL,                   
                      `DAYS` varchar(5) default NULL,                        
                      `WIDTH` varchar(10) default NULL,                      
                      `HEIGHT` varchar(10) default NULL,                     
                      `QUESTION` varchar(100) default NULL,                  
                      `SHOW_RESULT` varchar(100) default NULL,               
                      `ON_VOTE` varchar(100) default NULL,                   
                      `CUSTOM_MSG` varchar(100) default NULL,                   
                      `BTN_MSG` varchar(100) default NULL,                  
                      `TOTAL_MSG` varchar(100) default NULL,                 
                      `POLL_START` datetime default NULL,                    
                      `POLL_END` datetime default NULL,                      
                      `ALLOW_VOTE` varchar(5) default NULL,                  
					  `USE_TIME_INTERVAL` varchar(5) default NULL,                   
                      `VIEW_RESULTS` varchar(5) default NULL,                
                      `VIEW_RESULTS_TITLE` varchar(100) default NULL,					                   
                      PRIMARY KEY  (`ID`))";
			$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);		  
		
			$sql = "INSERT INTO `".$TABLES["QUESTIONS"]."`
						SET `ID` = null,
							`COLOR_SET_ID` = '1',
							`DAYS` = '0',
							`WIDTH` = '200',
							`HEIGHT` = '400',
							`QUESTION` = 'Question?',
							`SHOW_RESULT` = 'amount_percent',
							`ON_VOTE` = 'total',
							`CUSTOM_MSG` = '',
							`BTN_MSG` = 'Vote me!',
							`TOTAL_MSG` = 'Total votes:',
							`POLL_START` = 0,
							`POLL_END` = 0,
							`ALLOW_VOTE` = 'true',
							`USE_TIME_INTERVAL` = 'false',
							`VIEW_RESULTS` = 'true',
							`VIEW_RESULTS_TITLE` = 'view results'";
				
			$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);

			$sql = "DROP TABLE IF EXISTS `".$TABLES["ANSWERS"]."`;";
			$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
			
			$sql = "CREATE TABLE `".$TABLES["ANSWERS"]."` (    
                        `ID` int(11) NOT NULL auto_increment,  
                        `QUESTION_ID` int(11) default NULL,    
                        `ORDER_ID` int(10) default NULL,          
                        `ANSWER` text,                         
                        `COUNT` int(11) default NULL,          
                        PRIMARY KEY  (`ID`))";
			$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
			
			$sql = "INSERT INTO `".$TABLES["ANSWERS"]."`    
                    	SET `ID` = null,  
                        	`QUESTION_ID` = 1,    
                        	`ORDER_ID` = 0,          
                        	`ANSWER` = 'Answer 1',                         
                        	`COUNT` = 0";          
			$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
			
			$sql = "INSERT INTO `".$TABLES["ANSWERS"]."`    
                    	SET `ID` = null,  
                        	`QUESTION_ID` = 1,    
                        	`ORDER_ID` = 1,          
                        	`ANSWER` = 'Answer 2',
                        	`COUNT` = 0";          
			$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);

			$sql = "DROP TABLE IF EXISTS `".$TABLES["VOTES"]."`;";
			$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
			
			$sql = "CREATE TABLE `".$TABLES["VOTES"]."` (   
                      `ID` int(11) NOT NULL auto_increment,  
                      `QUESTION_ID` int(11) default NULL,    
                      `ANSWER_ID` int(11) default NULL,      
                      `IP` varchar(25) default NULL,         
                      `DT` datetime default NULL,            
                      PRIMARY KEY  (`ID`))";
			$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);


			echo "Web poll successfully installed. <br>Please, delete poll-install.php from your web server.<br><br> Login admin page <a href='poll-admin.php'>here</a>.";
			mysql_close($connection);
		};
	};
?>
<?php
};
?>	
	
	</td>
</tr>
</table>
</center>
</body>
</html>
