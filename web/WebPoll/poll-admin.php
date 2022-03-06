<?php
/*
#4.3.0 2007 02 06
# 
# Script: poll-admin.php
#################################################################################################
## Copright (c) 2007 - PHPjabbers.com - webmasters tools and help http://www.phpjabbers.com/   ##
## Not for resale                   					                                       ##
## info@phpjabbers.com                                                                	  	   ##
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
session_start();
include("poll-options.php");

if(isset($_REQUEST["ac"])) {
if ($_REQUEST["ac"] == 'logout') {
		if( $SETTINGS["useCookie"] == false ){
			$_SESSION["webPollAdmin"] = "";
			unset($_SESSION["webPollAdmin"]);
		}
		else{
			setCookie("webPollAdmin", "", 0);
			$_COOKIE["webPollAdmin"] = "";
		}
} elseif ($_REQUEST["ac"] == 'login') {
  	if ($_REQUEST["user"] == $SETTINGS["admin_username"] and $_REQUEST["pass"] == $SETTINGS["admin_password"]) {
		if( $SETTINGS["useCookie"] == false )
			$_SESSION["webPollAdmin"] = "logged";
		else{
			setCookie("webPollAdmin", "logged", time()+3600);
			$_COOKIE["webPollAdmin"] = "logged";
		}
 		$_REQUEST["ac"]='current_polls';
	} else {
		$message = '<strong style="color:#FF0000">Incorrect login details.</strong>';
	};
	};
};
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Web Poll - ADMIN</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<script language="javascript" src="poll.js"></script>
<link href="poll.css" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="#7F9274">
<center>
<?php 
$isLogged = false;
if ( $SETTINGS["useCookie"] == false ){
	if ((isset($_SESSION["webPollAdmin"])) and ($_SESSION["webPollAdmin"]=="logged")) $isLogged = true;
}
else{
	if ((isset($_COOKIE["webPollAdmin"])) and ($_COOKIE["webPollAdmin"]=="logged")) $isLogged = true;
}

if ( $isLogged ){
?>

<table width="780" border="0" cellpadding="0" cellspacing="0" style="border-bottom:2px solid #373737">
  <tr align="center">
    <td height="30" colspan="4" align="right" bgcolor="#FFFFFF"><strong style="font-size:18px">Web Poll v4.3 </strong> by <a href="http://www.phpjabbers.com" target="_blank">phpjabbers.com</a>&nbsp;&nbsp;</td>
  </tr>
  <tr>
	<td width="15%" height="30" align="center"bgcolor="#A6B39D"><a href="poll-admin.php?ac=current_polls" style="color:#FFFFFF"><strong>My Polls </strong></a></td>
	<td width="15%" align="center" bgcolor="#A6B39D"><a href="poll-admin.php?ac=poll" style="color:#FFFFFF"><strong>Create a Poll </strong></a></td>
	<td width="15%" align="center" bgcolor="#A6B39D"><a href="poll-admin.php?ac=color_sets" style="color:#FFFFFF"><strong>Color Sets </strong></a></td>
	<td align="right" bgcolor="#A6B39D">
	<a href="poll-admin.php?ac=logout" style="color:#FFFFFF"><strong>LOGOUT</strong></a>
	&nbsp;&nbsp;</td>
  </tr>
</table>

<?php
if ($_REQUEST["ac"] == 'save_poll') {

  	if ($_REQUEST["width"] < 100 ) $_REQUEST["width"] = 100;
	if ( $_REQUEST["useTimeInterval"] == "" ) {
		$_REQUEST["useTimeInterval"] = "false";		
		$sDate = '0000-00-00 00:00:00';
		$eDate = '0000-00-00 00:00:00';
	}
	else{
		$sDate = date("Y-m-d-G-i", mktime($_REQUEST["sHour"],$_REQUEST["sMin"],0,$_REQUEST["sMonth"],$_REQUEST["sDay"],$_REQUEST["sYear"]));
		$eDate = date("Y-m-d-G-i", mktime($_REQUEST["eHour"],$_REQUEST["eMin"],0,$_REQUEST["eMonth"],$_REQUEST["eDay"],$_REQUEST["eYear"]));
	}
	if ( $_REQUEST["pollDisable"] == "" ) $_REQUEST["pollDisable"] = "true";
	if ( $_REQUEST["view_results"] == "" ) $_REQUEST["view_results"] = "false";
	if (($_REQUEST["view_results"] == "true" ) && ($_REQUEST["view_results_title"]=="")) $_REQUEST["view_results_title"] = "view results";

  	if ( $_REQUEST["qid"] > 0 ) {
  		$sql = "UPDATE ".$TABLES["QUESTIONS"]." 
              SET `COLOR_SET_ID` = '".$_REQUEST["color_set_id"]."',                    
                  `DAYS` = '".$_REQUEST["days"]."',                       
                  `WIDTH` = '".$_REQUEST["width"]."',                      
                  `HEIGHT` = '".$_REQUEST["height"]."',                     
                  `QUESTION` = '".mysql_escape_string(utf8_encode($_REQUEST["question"]))."',                  
                  `SHOW_RESULT` = '".$_REQUEST["results"]."',               
                  `ON_VOTE` = '".$_REQUEST["onvote"]."',                   
                  `CUSTOM_MSG` = '".mysql_escape_string(utf8_encode($_REQUEST["msg"]))."',                   
                  `BTN_MSG` = '".mysql_escape_string(utf8_encode($_REQUEST["voteMsg"]))."',                  
                  `TOTAL_MSG` = '".mysql_escape_string(utf8_encode($_REQUEST["totalMsg"]))."',                 
                  `POLL_START` = '".$sDate."',
                  `POLL_END` = '".$eDate."',                      
                  `ALLOW_VOTE` = '".$_REQUEST["pollDisable"]."',                  
		          `USE_TIME_INTERVAL` = '".$_REQUEST["useTimeInterval"]."',
				  `VIEW_RESULTS` = '".$_REQUEST["view_results"]."',
				  `VIEW_RESULTS_TITLE` = '".mysql_escape_string(utf8_encode($_REQUEST["view_results_title"]))."'
              WHERE ID ='".$_REQUEST["qid"]."'";
      $sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);

      for($i=0;$i<$_REQUEST["aNum"];$i++){
        $answer = "answer" . $i;
        $count  = "start" . $i;
        if ($_REQUEST[$answer] == "") {
    		$sql = "SELECT * FROM ".$TABLES["ANSWERS"]."
	                WHERE QUESTION_ID = '".$_REQUEST["qid"]."'
    	            AND ORDER_ID = '".($i+1)."'";
 	        $sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);        
			$temp = mysql_fetch_assoc($sql_result);
    		$sql = "DELETE FROM ".$TABLES["ANSWERS"]."
	                WHERE QUESTION_ID = '".$_REQUEST["qid"]."'
    	            AND ORDER_ID = '".($i+1)."'";
 	        $sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);        
    		$sql = "DELETE FROM ".$TABLES["VOTES"]."
	                WHERE QUESTION_ID = '".$_REQUEST["qid"]."'
    	            AND ANSWER_ID = '".$temp["ID"]."'";
 	        $sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);        
			break;
		};
    		$sql = "SELECT * FROM ".$TABLES["ANSWERS"]."
	                WHERE QUESTION_ID = '".$_REQUEST["qid"]."'
    	            AND ORDER_ID = '".($i+1)."'";
 	        $sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);        
			
			if ( mysql_num_rows($sql_result) > 0 ) $isUpdate = "true";
			else $isUpdate = "false";
				
			if ( $isUpdate == "true" ){
				$sql = "UPDATE ".$TABLES["ANSWERS"]."
						SET `ANSWER` = '".mysql_escape_string(utf8_encode($_REQUEST[$answer]))."',
							`COUNT`  = '".$_REQUEST[$count]."'
						WHERE QUESTION_ID = '".$_REQUEST["qid"]."'
						AND ORDER_ID = '".($i+1)."'";
				$sql_result = mysql_query ($sql, $connection );        
			}
			else{
				$sql = "INSERT INTO ".$TABLES["ANSWERS"]."
						SET `ID` = null,
							`QUESTION_ID` = '".$_REQUEST["qid"]."',
							`ORDER_ID` = '".($i+1)."',
							`ANSWER` = '".mysql_escape_string(utf8_encode($_REQUEST[$answer]))."',
							`COUNT`  = '".$_REQUEST[$count]."'";
				$sql_result = mysql_query ($sql, $connection );        
			}	
      }


		$k = 1;
		$sql = "SELECT * FROM ".$TABLES["ANSWERS"]."
				WHERE QUESTION_ID = '".$_REQUEST["qid"]."' ORDER BY ORDER_ID ASC";
		$sql_result = mysql_query ($sql, $connection );        
		while ($temp = mysql_fetch_assoc($sql_result)) {
				$sql = "UPDATE ".$TABLES["ANSWERS"]."
						SET ORDER_ID = '".$k."'
						WHERE ID = '".$temp["ID"]."'";
				$sql_resultT = mysql_query ($sql, $connection );        
				$k++;
		};
		  
  	} else {
    		$sql = "INSERT INTO ".$TABLES["QUESTIONS"]." 
               			SET `COLOR_SET_ID` = '".$_REQUEST["color_set_id"]."',                    
							`DAYS` = '".$_REQUEST["days"]."',                       
							`WIDTH` = '".$_REQUEST["width"]."',                      
							`HEIGHT` = '".$_REQUEST["height"]."',                     
							`QUESTION` = '".mysql_escape_string(utf8_encode($_REQUEST["question"]))."',                  
							`SHOW_RESULT` = '".$_REQUEST["results"]."',               
							`ON_VOTE` = '".$_REQUEST["onvote"]."',                   
							`CUSTOM_MSG` = '".mysql_escape_string(utf8_encode($_REQUEST["msg"]))."',                   
							`BTN_MSG` = '".mysql_escape_string(utf8_encode($_REQUEST["voteMsg"]))."',                  
							`TOTAL_MSG` = '".mysql_escape_string(utf8_encode($_REQUEST["totalMsg"]))."',                 
							`POLL_START` = '".$sDate."',
							`POLL_END` = '".$eDate."',
							`ALLOW_VOTE` = '".$_REQUEST["pollDisable"]."',                  
							`USE_TIME_INTERVAL` = '".$_REQUEST["useTimeInterval"]."',
							`VIEW_RESULTS` = '".$_REQUEST["view_results"]."',
							`VIEW_RESULTS_TITLE` = '".mysql_escape_string(utf8_encode($_REQUEST["view_results_title"]))."'";
      $sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);              
      $_REQUEST["qid"] = mysql_insert_id();
                    
      for($i=0;$i<$_REQUEST["aNum"];$i++){
        $answer = "answer" . $i;
        $count  = "start" . $i;
        if ($_REQUEST[$answer] == "") break;
    		$sql = "INSERT INTO ".$TABLES["ANSWERS"]."
    		        SET `ID` = null,
    		            `QUESTION_ID` = '".$_REQUEST["qid"]."',
    		            `ORDER_ID` = '".($i+1)."',
                    	`ANSWER` = '".mysql_escape_string(utf8_encode($_REQUEST[$answer]))."',
	                    `COUNT`  = '".$_REQUEST[$count]."'";
        $sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);                                 
      }
  	}
  	$_REQUEST["ac"] = 'poll'; $message = '<strong style="color:#FF0000">Web poll saved.</strong><br>';

} elseif ($_REQUEST["ac"] == 'del_poll') {
  	$sql = "DELETE FROM ".$TABLES["QUESTIONS"]." WHERE ID = '".$_REQUEST["qid"]."'";
  	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
  	$sql = "DELETE FROM ".$TABLES["ANSWERS"]." WHERE QUESTION_ID ='".$_REQUEST["qid"]."'";
  	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
  	$sql = "DELETE FROM ".$TABLES["VOTES"]." WHERE QUESTION_ID ='".$_REQUEST["qid"]."'";
  	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
  	$_REQUEST["ac"] = 'current_polls'; $message = '<strong style="color:#FF0000">Web poll deleted.</strong><br>';
} elseif ($_REQUEST["ac"] == 'save_color_set') {
	if ($_REQUEST["color_set_id"] > 0) { 
		$sql = "UPDATE ".$TABLES["COLORS"]."
    				SET `SET_NAME`     ='".mysql_escape_string(utf8_encode($_REQUEST["set_name"]))."', 
    				 	  `POLL_BG`	     ='".str_replace("#","",$_REQUEST["poll_bg"])."', 
    					  `QUESTION_BG`  ='".str_replace("#","",$_REQUEST["question_bg"])."', 
    					  `QUESTION_TXT` ='".str_replace("#","",$_REQUEST["question_txt"])."', 
    					  `ANSWER_TXT`   ='".str_replace("#","",$_REQUEST["answer_txt"])."', 
    					  `MOUSE_OVER`   ='".str_replace("#","",$_REQUEST["mouse_over"])."', 
    					  `MOUSE_OUT`    ='".str_replace("#","",$_REQUEST["mouse_out"])."', 
    					  `VOTE_BTN_BG`  ='".str_replace("#","",$_REQUEST["vote_btn_txt"])."', 
    					  `VOTE_BTN_TXT` ='".str_replace("#","",$_REQUEST["vote_btn"])."', 
    					  `TOTAL_VOTES`  ='".str_replace("#","",$_REQUEST["total_votes"])."', 
    					  `VOTES_BAR`    ='".str_replace("#","",$_REQUEST["votes_bar"])."' 
    				WHERE ID='".$_REQUEST["color_set_id"]."'";
		$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
	} else {
		$sql = "INSERT INTO ".$TABLES["COLORS"]."
    				SET `ID`		       = null,	
      					`SET_NAME`     ='".mysql_escape_string(utf8_encode($_REQUEST["set_name"]))."', 
      					`POLL_BG` 	   ='".str_replace("#","",$_REQUEST["poll_bg"])."', 
      					`QUESTION_BG`  ='".str_replace("#","",$_REQUEST["question_bg"])."', 
      					`QUESTION_TXT` ='".str_replace("#","",$_REQUEST["question_txt"])."', 
      					`ANSWER_TXT`   ='".str_replace("#","",$_REQUEST["answer_txt"])."', 
      					`MOUSE_OVER`   ='".str_replace("#","",$_REQUEST["mouse_over"])."', 
      					`MOUSE_OUT`    ='".str_replace("#","",$_REQUEST["mouse_out"])."', 
      					`VOTE_BTN_BG`  ='".str_replace("#","",$_REQUEST["vote_btn_txt"])."', 
      					`VOTE_BTN_TXT` ='".str_replace("#","",$_REQUEST["vote_btn"])."', 
      					`TOTAL_VOTES`  ='".str_replace("#","",$_REQUEST["total_votes"])."', 
      					`VOTES_BAR`    ='".str_replace("#","",$_REQUEST["votes_bar"])."'";
	
		$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
		$_REQUEST["color_set_id"] = mysql_insert_id();
	};
	$_REQUEST["ac"] = 'color_sets'; $message = '<strong style="color:#FF0000">Color set saved.</strong><br>';
} elseif ($_REQUEST["ac"] == 'del_color_set') {
  if($_REQUEST["color_set_id"]==1){
    $message = '<strong style="color:#FF0000">You are not allowed to delete the Default Color Set.</strong><br>';
  }
  else{
  	$sql = "DELETE FROM ".$TABLES["COLORS"]."
  			    WHERE ID='".$_REQUEST["color_set_id"]."'";
  	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
  	$_REQUEST["color_set_id"] = 1;
	  $message = '<strong style="color:#FF0000">Color set deleted.</strong><br>';
	}
	$_REQUEST["ac"] = 'color_sets';
};


if (($_REQUEST["ac"]=='html' OR $_REQUEST["ac"]=='stats' OR $_REQUEST["ac"]=='poll' OR $_REQUEST["ac"]=='view_votes' OR $_REQUEST["ac"]=='save_poll') AND $_REQUEST["qid"]>0 ) {
	$sql = "SELECT * FROM ".$TABLES["QUESTIONS"]." WHERE id='".$_REQUEST["qid"]."'";
	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
	$QUESTION = mysql_fetch_assoc($sql_result);
?>

<table width="780" border="0" cellpadding="0" cellspacing="0" bgcolor="#26619E" style="border-bottom:2px solid #373737">
  <tr>
    <td colspan="4" align="left" bgcolor="#FFFFFF" style="padding:5px">Poll question: <strong><?php echo stripslashes(utf8_decode($QUESTION["QUESTION"])); ?></strong>
      <ul>
        <li>To edit the poll click  on 'Edit Poll' link below and then click on the buttons to change various poll options </li>
        <li>To put the poll on your web pages click on 'HTML Code' link below and follow the instructions. </li>
        <li>To view vote statistic for the poll click on 'Vote Statistic' link below.' </li>
      </ul></td>
    </tr>
  <tr>
    <td width="15%" height="30" align="center" bgcolor="#C4CCBD"><a href="poll-admin.php?ac=poll&qid=<?php  echo $_REQUEST["qid"]; ?>" style="color:#000000"><strong>Edit Poll </strong></a></td>
    <td width="15%" align="center" bgcolor="#C4CCBD"><a href="poll-admin.php?ac=html&qid=<?php  echo $_REQUEST["qid"]; ?>" style="color:#000000"><strong>HTML code</strong></a></td>
    <td width="15%" align="center" bgcolor="#C4CCBD"><a href="poll-admin.php?ac=stats&qid=<?php  echo $_REQUEST["qid"]; ?>" style="color:#000000"><strong>Vote Statistic</strong></a></td>
    <td width="55%" align="center" bgcolor="#C4CCBD">&nbsp;</td>
  </tr>
</table>
<?php 
};
?>

<table width="780" height="31" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border-bottom:2px solid #373737">
<tr><td align="left" valign="top" style="padding:20px">
<?php
if(isset($message)) echo $message;
//////////////////////
//////////////////////
///   VIEW POLLS /////
//////////////////////
//////////////////////
if ( $_REQUEST["ac"] == 'current_polls') {
?>
Below you can see all the polls that you've created. You can create UNLIMITED amount of polls.
<li>To create a new poll, click on the Create a Poll link at the top.</li>
<li>To edit a poll click on the Edit Poll link next to the poll question.</li>
<li>To put a poll on your web page click on the HTML code link next to the poll question and follow the instructions.</li>
<li>To view Vote statistic for each poll click on the Vote Statistic link next to the poll question.</li>
<li>To delete a poll click on the 'DELETE' link next to the poll question.</li>
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="344" valign="top" bgcolor="#DFE4E8"><strong>Polls</strong></td>
    <td width="85" valign="top" bgcolor="#DFE4E8"><strong>Today votes </strong></td>
    <td bgcolor="#DFE4E8" colspan="4">&nbsp;</td>
  </tr>

<?php
	$sql = "SELECT * FROM ".$TABLES["QUESTIONS"]." 
    			WHERE ID > 1	 
    			ORDER BY QUESTION ASC";
	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
	while ($POLL = mysql_fetch_assoc($sql_result)) {

		$sql = "SELECT COUNT(*) as cnt FROM ".$TABLES["VOTES"]." WHERE QUESTION_ID = '".$POLL["ID"]."'";
		$sql_result_total = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
		$total_votes = mysql_fetch_assoc($sql_result_total);
?>
  <tr>
    <td style="border-bottom:1px solid #DFE4E8"><?php echo stripslashes(utf8_decode($POLL["QUESTION"])); ?></td>
    <td style="border-bottom:1px solid #DFE4E8"><?php echo $total_votes["cnt"]; ?></td>
    <td width="54" align="left" style="border-bottom:1px solid #DFE4E8"><a href='poll-admin.php?ac=poll&qid=<?php echo $POLL["ID"]; ?>'><strong>Edit Poll </strong></a></td>
	<td width="74" align="left" style="border-bottom:1px solid #DFE4E8"><a href='poll-admin.php?ac=html&qid=<?php echo $POLL["ID"]; ?>'><strong>HTML code</strong></a></td>
    <td width="87" align="left" style="border-bottom:1px solid #DFE4E8"><a href='poll-admin.php?ac=stats&qid=<?php echo $POLL["ID"]; ?>'><strong>Vote Statistic</strong></a></td>
    <td width="58" align="left" style="border-bottom:1px solid #DFE4E8"><a href='#' onClick='pass=confirm("Bạn có muốn xóa không you want to delete it?",""); if (pass) window.location="poll-admin.php?ac=del_poll&qid=<?php echo $POLL["ID"]; ?>";'><strong style='color:red'>DELETE</strong></a></td>
  </tr>
  <?php
	};
?>
</table>
<?php
//////////////////////
//////////////////////
/// VOTES STATS  ////
//////////////////////
//////////////////////
} elseif ($_REQUEST["ac"] == 'stats') {
	$sql = "SELECT * FROM ".$TABLES["QUESTIONS"]." 
		    	WHERE ID = '".$_REQUEST["qid"]."'";
	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
	$POLL = mysql_fetch_assoc($sql_result);
?>
&nbsp;&nbsp;&nbsp;&nbsp;Below you can see voting statistic. Please, note that this is the actual voting statistic and does not include the starting vote's amount for your answers. To view detailed voting statistic including IP address, date &amp; time and selected answers <a href="poll-admin.php?ac=view_votes&amp;qid=<?php echo $_REQUEST["qid"]; ?>">click here</a>.
<table width="600" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="205" bgcolor="#DFE4E8">Total votes: </td>
    <td colspan="2" style="border-bottom:1px solid #DFE4E8"><strong>
      <?php
      	$sql = "SELECT ID FROM ".$TABLES["VOTES"]." WHERE QUESTION_ID = '".$POLL["ID"]."'";
      	$sql_result_votes = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
      	echo $total = mysql_num_rows($sql_result_votes);
      ?>
    </strong></td>
    </tr>
  <tr>
    <td bgcolor="#DFE4E8">Todays votes: </td>
    <td colspan="2" style="border-bottom:1px solid #DFE4E8"><strong>
      <?php
	$sql = "SELECT * FROM ".$TABLES["VOTES"]." WHERE QUESTION_ID = '".$POLL["ID"]."' AND DATE_FORMAT(DT, '%Y-%m-%d') = CURDATE()";
	$sql_result_votes = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
	echo mysql_num_rows($sql_result_votes);
?>
    </strong></td>
    </tr>
  <tr>
    <td bgcolor="#DFE4E8"><strong>Answers votes </strong></td>
    <td width="56" bgcolor="#DFE4E8" style="border-bottom:1px solid #DFE4E8"><strong>Percent</strong></td>
    <td width="319" bgcolor="#DFE4E8" style="border-bottom:1px solid #DFE4E8"><strong>Amount</strong></td>
  </tr>
  
  <?php
    	$sql = "SELECT * FROM ".$TABLES["ANSWERS"]." 
              WHERE QUESTION_ID = '".$POLL["ID"]."'
              ORDER BY ORDER_ID";
    	$sql_result_answers = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
      while ($ANSWER = mysql_fetch_assoc($sql_result_answers)) {
    		$sql = "SELECT * FROM ".$TABLES["VOTES"]." 
                WHERE QUESTION_ID ='".$POLL["ID"]."' 
                AND ANSWER_ID ='".$ANSWER["ID"]."'";
    		$sql_resultC = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
    		$count = mysql_num_rows($sql_resultC);
    		
    		$percent = round(($count / $total) * 100,2);
  ?>
  <tr>
    <td bgcolor="#DFE4E8"><?php echo stripslashes(utf8_decode($ANSWER["ANSWER"])); ?></td>
    <td style="border-bottom:1px solid #DFE4E8"><?php echo $percent.'%'; ?></td>
    <td style="border-bottom:1px solid #DFE4E8"><?php echo $count; ?></td>
  </tr>
<?php
	};
?>
</table>

<?php
//////////////////////
//////////////////////
// DETAILED STATS  ///
//////////////////////
//////////////////////
} elseif ($_REQUEST["ac"] == 'view_votes') {
	$sql = "SELECT * FROM ".$TABLES["QUESTIONS"]." 
          WHERE ID = '".$_REQUEST["qid"]."'";
	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
	$QUESTION = mysql_fetch_assoc($sql_result);
?>
<a href="poll-admin.php?ac=stats&qid=<?php echo $_REQUEST["qid"]; ?>">back to statistic summary </a>
<table width="700" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="112" valign="top" bgcolor="#DFE4E8"><strong>Date &amp; time </strong></td>
    <td width="124" valign="top" bgcolor="#DFE4E8"><strong>IP address </strong></td>
    <td width="444" valign="top" bgcolor="#DFE4E8"><strong>Answer</strong></td>
  </tr>
<?php
	if (!isset($_REQUEST["st"])) $st=0;
	else $st = $_REQUEST["st"];
	$sql = "SELECT * FROM ".$TABLES["VOTES"]." 
          WHERE QUESTION_ID = '".$_REQUEST["qid"]."' 
          ORDER BY dt DESC LIMIT $st,25";
	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
	while ($VOTES = mysql_fetch_assoc($sql_result)) {
		$sql = "SELECT * FROM ".$TABLES["ANSWERS"]." WHERE ID ='".$VOTES["ANSWER_ID"]."'";
		$sql_result_answer = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
		$ANAME = mysql_fetch_assoc($sql_result_answer);
?>
  <tr>
    <td style="border-bottom:1px solid #DFE4E8"><?php echo $VOTES["DT"]; ?></td>
    <td style="border-bottom:1px solid #DFE4E8"><?php echo $VOTES["IP"]; ?></td>
    <td style="border-bottom:1px solid #DFE4E8"><?php echo stripslashes(utf8_decode($ANAME["ANSWER"])); ?></td>
  </tr>
<?php
	};
?>
  <tr>
    <td bgcolor="#DFE4E8" colspan="3">
<?php
	if ($st>0) { 
		$prev=$st-25; 
		echo "<a href='poll-admin.php?ac=view_votes&qid=".$_REQUEST["qid"]."&st=0'><<</a>&nbsp;&nbsp;"; 
		echo "<a href='poll-admin.php?ac=view_votes&qid=".$_REQUEST["qid"]."&st=$prev'><</a>&nbsp;&nbsp;"; 
	};

	$sql = "SELECT * FROM ".$TABLES["VOTES"]." 
          WHERE QUESTION_ID ='".$_REQUEST["qid"]."' 
          ORDER BY DT DESC";
	$sql_result_count = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
	$count_rows = mysql_num_rows($sql_result_count);
	$total_pages = ceil($count_rows/25);
	$current_page = $st / 25 + 1;
	echo " <strong>page $current_page of $total_pages</strong> ";
	if ($st<$count_rows-25) {
		$next=$st+25;
		echo "<a href='poll-admin.php?ac=view_votes&qid=".$_REQUEST["qid"]."&st=$next'>></a>&nbsp;&nbsp;";
		$lastid=0;
		while ($lastid<$count_rows-25) {
			$lastid=$lastid+25;
		};
		echo "<a href='poll-admin.php?ac=view_votes&qid=".$_REQUEST["qid"]."&st=$lastid'>>></a>&nbsp;&nbsp;"; 
	};
?></td>
  </tr>
</table>
<?php
//////////////////////
//////////////////////
///   ADD POLL   /////
//////////////////////
//////////////////////
} elseif ( $_REQUEST["ac"] == 'poll') {
if ($_REQUEST["qid"]>0) {
	$sql = "SELECT * FROM ".$TABLES["QUESTIONS"]." 
          WHERE ID = '".$_REQUEST["qid"]."'";
	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
	$QUESTION = mysql_fetch_assoc($sql_result);
} else {
	$QUESTION["COLOR_SET_ID"] = 1; 
	$QUESTION["DAYS"] = 0;
	$QUESTION["HEIGHT"] = 170;
	$QUESTION["WIDTH"] = 167;
	$QUESTION["BTN_MSG"] = 'Bình chọn';
	$QUESTION["TOTAL_MSG"] = 'Total: ';
	$QUESTION["ON_VOTE"] = 'total';
	$QUESTION["VIEW_RESULTS"] = "true";
	$QUESTION["VIEW_RESULTS_TITLE"] = "Kết quả bình chọn";
};
?>
<form action="poll-admin.php" method="post" name="frm">
  <input type="hidden" name="ac" value="save_poll">
  <input type="hidden" name="qid" value="<?php echo $_REQUEST["qid"]; ?>">
  <input type="hidden" name="openme" value="<?php echo $_REQUEST["openme"]; ?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td width="50%" valign="top">

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="49%" valign="top">
    	  <input type="button" name="btnStep1" id="btnStep1" style='width:130px' value="Question & answers" onclick="LoadStep('1'); document.frm.openme.value='1';" />
    	  <input type="button" name="btnStep2" id="btnStep2" style='width:60px' value="Options" onclick="LoadStep('2'); document.frm.openme.value='2';" />
    	  <input type="button" name="btnStep3" id="btnStep3" style='width:90px' value="Start / Stop" onclick="LoadStep('3'); document.frm.openme.value='3';" />
    	  <input type="submit" name="btnStep4" id="btnStep4" style='width:80px' value="Save poll" />
	   </td>
	   </tr>
	</table>  
		  <div id="step1" style='display:block'>	
  	  <table width="100%" border="0" cellspacing="4" cellpadding="5">
        <tr>
          <td bgcolor="#DFE4E8"  style="border:1px solid #5D5D5D">Below you can enter poll question, select number of answers and enter them. You can set starting vote amount for each of your answers in case you do not want to have an answer with 0 votes. </td>
        </tr>
        <tr>
          <td bgcolor="#DFE4E8"  style="border:1px solid #5D5D5D">             Poll question:<br>
            <input name="question" type="text"  id="question" size="50" value="<?php echo str_replace('"','&quot;',stripslashes(utf8_decode($QUESTION["QUESTION"]))); ?>"> 
          <br>
<?php
  $txt = "";
  if ($_REQUEST["qid"]>0) {
  	$sql = "SELECT * FROM ".$TABLES["ANSWERS"]."
            WHERE QUESTION_ID = '".$_REQUEST["qid"]."'  
            ORDER BY ORDER_ID";
  	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
  	while ($ANSWER = mysql_fetch_assoc($sql_result)) {
  	  $answerNum = $ANSWER["ORDER_ID"] - 1;   
      $txt = $txt . '<input name="answer'.$answerNum.'" type="text"  id="answer'.$answerNum.'" size="30" value="'.str_replace('"','&quot;',stripslashes(utf8_decode($ANSWER["ANSWER"]))).
                    '"> votes count <input name="start'.$answerNum.'" type="text"  id="start'.$answerNum.'" size="2" maxlength="4" value="'.$ANSWER["COUNT"].'"><br>';
  	}
	$_REQUEST["aNum"] = mysql_num_rows($sql_result) - 2;
  }
  else{
    if (!isset($_REQUEST["aNum"])) $_REQUEST["aNum"] = $SETTINGS["maxAnswers"] - 2;
    for($i=0;$i<$_REQUEST["aNum"]+2;$i++){
      $txt = $txt . '<input name="answer'.$i.'" type="text"  id="answer'.$i.'" size="30" value=""> votes count <input name="start'.$i.'" type="text"  id="start'.$i.'" size="2" maxlength="4" value="0"><br>';
    }
  }	
?>
           <br /> How many answers do you want: 
             <select name="aNum" onchange='FillAnswerArea(this.value)'>
													
					<?php
						for ($i=0;$i<($SETTINGS["maxAnswers"]-1);$i++){
							echo '<option value="'.($i+2).'" '; 
							if($_REQUEST["aNum"] == $i) echo "selected"; 
							echo '>'.($i+2).'</option>';
						}
					?>
                        </select><br />
            <div id="answerArea">
              <?php echo $txt; ?>
           </div>   
		   </td>
        </tr>
        </table>
        
	  	  <table width="100%" border="0" cellspacing="4" cellpadding="5">
        <tr>
          <td width="50%" bgcolor="#DFE4E8"  style="border:1px solid #5D5D5D"><input type="button" name="btnDivOption" id="btnDivOption" value="Options" onclick="LoadStep('2'); document.frm.openme.value='2'; ">          </td>
          <td width="50%" align="right" bgcolor="#DFE4E8"  style="border:1px solid #5D5D5D"><input type="submit" name="btnStep42" id="btnStep42" style='width:80px' value="Save poll" /></td>
        </tr>
       </table>
        
  		  </div>	
        <div id="step2" style='display:none'>
	  <table width="100%" border="0" cellspacing="4" cellpadding="5">
         <tr>
				  <td bgcolor="#DFE4E8"  style="border:1px solid #5D5D5D" colspan="2">Below you can set various poll options. You can either select a color set from the available ones. To create a new color set click on the 'Color Sets' link on the top but be sure to save your poll before this because all changes you've done will be lost. Poll height depends on the length of your answers, question and width chosen so you may need to adjust it so all  result bars are visible when you vote. 'Limit votes' is used to prevent multiple votes using the same computer. You can set number of days between each vote. You can set it to 0 and this will allow unlimited votes using the same computer. At the end, you can configure poll messages and the way your poll will display them. </td>
				  </tr>
         <tr>
          <td bgcolor="#DFE4E8"  style="border:1px solid #5D5D5D">
            <table width="100%" border="0" cellspacing="0" cellpadding="2">
                  
                  <tr>
                    <td >Color Set:</td>
                    <td ><select name="color_set_id" >
                      <?php
	$sql = "SELECT * FROM ".$TABLES["COLORS"]." ORDER BY SET_NAME ASC";
	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
	while ($COLOR = mysql_fetch_assoc($sql_result)) {
		if ($QUESTION["COLOR_SET_ID"] == $COLOR["ID"]) { $selected=' selected'; } else { $selected=''; };
		echo "<option value='".$COLOR["ID"]."'$selected>".utf8_decode($COLOR["SET_NAME"])."</option>";
	};
?>
                    </select></td>
                  </tr>
                  <tr>
                    <td width="43%" >Poll Width:</td>
              <td width="57%" ><input name="width" type="text" id="width" value="<?php echo $QUESTION["WIDTH"]; ?>" size="3" maxlength="3" />
                pixels </td>
                  </tr>
                  <tr>
                    <td >Poll Height:</td>
              <td ><input name="height" type="text" size="3" maxlength="3" value="<?php echo $QUESTION["HEIGHT"]; ?>" />
                pixels</td>
                  </tr>
                  <tr>
                    <td >Limit votes: </td>
              <td ><input name="days" type="text" size="3" maxlength="3" value="<?php echo $QUESTION["DAYS"]; ?>" />
                days</td>
                  </tr>
                  <tr>
              <td style="border-top:1px solid #5D5D5D">Allow &quot;View Results&quot;</td>
              <td style="border-top:1px solid #5D5D5D"><input type="checkbox" name="view_results" value="true" <?php if ( $QUESTION["VIEW_RESULTS"] == "true" ) echo "checked"; ?> /></td>
            </tr>
            <tr>
              <td>"View results" link title</td>
  <td><input type="text" name="view_results_title" size="20" maxlength="30" value="<?php echo str_replace('"','&quot;',stripslashes(utf8_decode($QUESTION["VIEW_RESULTS_TITLE"]))); ?>" /></td>
            </tr>
  <tr>
    <td colspan="2"  style="border-top:1px solid #5D5D5D">When people vote show results as:<br />
                      <?php if ($QUESTION["SHOW_RESULT"]=='') $QUESTION["SHOW_RESULT"]='amount_percent'; ?>
        <input type="radio" name="results" value="amount"<?php if ($QUESTION["SHOW_RESULT"]=='amount') { echo ' checked="checked"'; }; ?> />
					  number<br />
      <input type="radio" name="results" value="percent"<?php if ($QUESTION["SHOW_RESULT"]=='percent') { echo ' checked="checked"'; }; ?> />
					  percent<br />
      <input type="radio" name="results" value="amount_percent"<?php if ($QUESTION["SHOW_RESULT"]=='amount_percent') { echo ' checked="checked"'; }; ?> />
					  number and percent<br />
      <input type="radio" name="results" value="nothing"<?php if ($QUESTION["SHOW_RESULT"]=='nothing') { echo ' checked="checked"'; }; ?> />
					  do	not	show	results		</td>
                    </tr>
                  <tr>
    <td colspan="2"  style="border-top:1px solid #5D5D5D">When people vote replace Vote button with:<br />
					<?php if ($QUESTION["ON_VOTE"]=='') $QUESTION["ON_VOTE"]='total'; ?>
        <input type="radio" name="onvote" value="message"<?php if ($QUESTION["ON_VOTE"]=='message') { echo ' checked="checked"'; }; ?> />
                        with custom message 
                        <input name="msg" type="text" size="20" maxlength="30" value="<?php echo str_replace('"','&quot;',stripslashes(utf8_decode($QUESTION["CUSTOM_MSG"]))); ?>" />
                      <br />
      <input type="radio" name="onvote" value="total"<?php if ($QUESTION["ON_VOTE"]=='total') { echo ' checked="checked"'; }; ?> />
					  total votes and custom message 
                      <input name="totalMsg" type="text"  id="totalMsg" value="<?php echo str_replace('"','&quot;',stripslashes(utf8_decode($QUESTION["TOTAL_MSG"]))); ?>" size="20" maxlength="30" />
                      <br />
      <input type="radio" name="onvote" value="nothing"<?php if ($QUESTION["ON_VOTE"]=='nothing') { echo ' checked="checked"'; }; ?> />
                      nothing					  </td>
                    </tr>
                  <tr>
                    <td style="border-top:1px solid #5D5D5D">Vote button title: </td>
    <td style="border-top:1px solid #5D5D5D"><input name="voteMsg" type="text"  id="voteMsg" value="<?php echo str_replace('"','&quot;',stripslashes(utf8_decode($QUESTION["BTN_MSG"]))); ?>" size="30" maxlength="30" /></td>
                  </tr>
              </table>
			  </td>
			  </tr>
        </table>	

	  	  <table width="100%" border="0" cellspacing="4" cellpadding="5">
        <tr>
          <td width="50%" bgcolor="#DFE4E8"  style="border:1px solid #5D5D5D">
           <input type="button" name="btnDivSS" id="btnDivSS" value="Start / Stop" onclick="LoadStep('3'); document.frm.openme.value='3';">          </td>
          <td width="50%" align="right" bgcolor="#DFE4E8"  style="border:1px solid #5D5D5D"><input type="submit" name="btnStep42" id="btnStep42" style='width:80px' value="Save poll" /></td>
        </tr>
       </table>
        
	     </div>
             <div id="step3" style='display:none'>
				  <?php
				  	$sYear  = $QUESTION["POLL_START"][0].$QUESTION["POLL_START"][1].$QUESTION["POLL_START"][2].$QUESTION["POLL_START"][3];
						$sMonth = $QUESTION["POLL_START"][5].$QUESTION["POLL_START"][6];
						$sDay   = $QUESTION["POLL_START"][8].$QUESTION["POLL_START"][9];
						$sHour  = $QUESTION["POLL_START"][11].$QUESTION["POLL_START"][12];
						$sMin   = $QUESTION["POLL_START"][14].$QUESTION["POLL_START"][15];
						
				  	$eYear  = $QUESTION["POLL_END"][0].$QUESTION["POLL_END"][1].$QUESTION["POLL_END"][2].$QUESTION["POLL_END"][3];
						$eMonth = $QUESTION["POLL_END"][5].$QUESTION["POLL_END"][6];
						$eDay   = $QUESTION["POLL_END"][8].$QUESTION["POLL_END"][9];
						$eHour  = $QUESTION["POLL_END"][11].$QUESTION["POLL_END"][12];
						$eMin   = $QUESTION["POLL_END"][14].$QUESTION["POLL_END"][15];
				  ?>
             	  <table width="100%" border="0" cellspacing="4" cellpadding="5">
                  <tr>
                    <td bgcolor="#DFE4E8"  style="border:1px solid #5D5D5D">Here you can specify start and stop time for your poll. To do this, click on 'Enable Start / Stop' and select start and stop dates and times. 'Current server time' is the one used to calculate start and stop times. You can also stop the poll and only let people see poll results by clicking on 'Stop poll' checkbox. </td>
                  </tr>
                  <tr>
		            <td bgcolor="#DFE4E8"  style="border:1px solid #5D5D5D">
	                <table width="100%" border="0" cellspacing="0" cellpadding="2">
  		  	      <tr>
  		  	        <td width="42%">Stop poll:</td>
  		  	        <td width="58%"><input name="pollDisable" type="checkbox" id="pollDisable" value="false" <?php if ( $QUESTION["ALLOW_VOTE"] == "false" ) echo "checked"; ?> />
  		  	          </td>
		  	        </tr>
  		  	      <tr>
  		  	        <td>Enable Start / Stop:</td>
  		  	        <td><input name="useTimeInterval" type="checkbox" id="useTimeInterval" value="true" <?php if ( $QUESTION["USE_TIME_INTERVAL"] == "true" ) echo "checked"; ?> onclick="useTime(this.checked)" /></td>
		  	        </tr>
  		  	      <tr>
					<td>Current server time: </td>
					<td><?php echo date("dS \of F Y G:i", time()); ?></td>
				</tr>

					<?php if( $QUESTION["USE_TIME_INTERVAL"] == "true" ) $isDisabled = "";
						    else $isDisabled = "disabled=\"true\"";
						    
						    if(($sYear==0) and ($sMonth==0) and ($sDay==0) and ($eYear==0) and ($eMonth==0) and ($eDay==0)){
    						    $cDate = date("Y-m-d", time());
    						    list($sYear, $sMonth, $sDay) = split("-",$cDate);
    						    $eYear = $sYear; 
                    $eMonth = $sMonth;
    						    $eDay = $sDay + 1;
						    }
					?>
	                <tr>
                    <td>Start date:</td>
					<td>
						<table width="100%">
							<tr>
								<td>
								  <select name="sMonth" id="sMonth" <?php echo $isDisabled; ?>>
									<?php
										  for ($i=1; $i<13; $i++) {
											if ($sMonth==$i) { $selected=' selected="selected"'; } else { $selected=''; };
											echo '<option value="'.$i.'"'.$selected.'>'.$monthnames_arr[$i].'</option>';
										  };
									?>
								  </select>
								  <select name="sDay" id="sDay" <?php echo $isDisabled; ?>>
								  <?php
								  for ($i=1; $i<32; $i++) {
									if ($sDay==$i) { $selected=' selected="selected"'; } else { $selected=''; };
									echo '<option value="'.$i.'"'.$selected.'>'.$i.'</option>';
								  };
								  ?>
								  </select>
								  <select name="sYear" id="sYear" <?php echo $isDisabled; ?>>
								  <?php
								  for ($i=2007; $i<2012; $i++) {
									if ($sYear==$i) { $selected=' selected="selected"'; } else { $selected=''; };
									echo '<option value="'.$i.'"'.$selected.'>'.$i.'</option>';
								  };
								  ?>
								  </select>								</td>
							 </tr>
						 </table>					</td>	
                  </tr>
                  <tr>
                    <td>Start time:</td>
					<td>
						<table width="100%">
							<tr>
								<td>
								  <select name="sHour" id="sHour" <?php echo $isDisabled; ?>>
									<?php
										  for ($i=0; $i<24; $i++) {
											if ($sHour==$i) { $selected=' selected="selected"'; } else { $selected=''; };
											echo '<option value="'.$i.'"'.$selected.'>'.$i.'</option>';
										  };
									?>
								  </select>
								  <select name="sMin" id="sMin" <?php echo $isDisabled; ?>>
								  <?php
									  for ($i=0; $i<60; $i = ($i+5)) {
										if ($sMin==$i) { $selected=' selected="selected"'; } else { $selected=''; };
										echo '<option value="'.$i.'"'.$selected.'>';
										if($i == 0) echo "00";
										else echo $i;
										echo '</option>';
									  };
								  ?>
								  </select>								</td>
							</tr>
						</table>					</td>	
                  </tr>
                  <tr>
                    <td >Stop date: </td>
					<td>
						<table width="100%">
							<tr>
								<td>
								  <select name="eMonth" id="eMonth" <?php echo $isDisabled; ?>>
									<?php
										  for ($i=1; $i<13; $i++) {
											if ($eMonth==$i) { $selected=' selected="selected"'; } else { $selected=''; };
											echo '<option value="'.$i.'"'.$selected.'>'.$monthnames_arr[$i].'</option>';
										  };
									?>
								  </select>
								  <select name="eDay" id="eDay" <?php echo $isDisabled; ?>>
								  <?php
								  for ($i=1; $i<32; $i++) {
									if ($eDay==$i) { $selected=' selected="selected"'; } else { $selected=''; };
									echo '<option value="'.$i.'"'.$selected.'>'.$i.'</option>';
								  };
								  ?>
								  </select>
								  <select name="eYear" id="eYear" <?php echo $isDisabled; ?>>
								  <?php
								  for ($i=2007; $i<2012; $i++) {
									if ($eYear==$i) { $selected=' selected="selected"'; } else { $selected=''; };
									echo '<option value="'.$i.'"'.$selected.'>'.$i.'</option>';
								  };
								  ?>
								  </select>								</td>
							</tr>
						</table>					</td>	
                  </tr>
                  <tr>
                    <td>Stop time:</td>
					<td>
						<table width="100%">
							<tr>
								<td>
								  <select name="eHour" id="eHour" <?php echo $isDisabled; ?>>
									<?php
										  for ($i=0; $i<24; $i++) {
											if ($eHour==$i) { $selected=' selected="selected"'; } else { $selected=''; };
											echo '<option value="'.$i.'"'.$selected.'>'.$i.'</option>';
										  };
									?>
								  </select>
								  <select name="eMin" id="eMin" <?php echo $isDisabled; ?>>
								  <?php
									  for ($i=0; $i<60; $i = ($i+5)) {
										if ($eMin==$i) { $selected=' selected="selected"'; } else { $selected=''; };
										echo '<option value="'.$i.'"'.$selected.'>';
										if($i == 0) echo "00";
										else echo $i;
										echo '</option>';
									  };
								  ?>
								  </select>								</td>
							</tr>
						</table>					</td>	
                  </tr>
              </table>
			  </td>
        </tr>
        </table>

	  	  <table width="100%" border="0" cellspacing="4" cellpadding="5">
        <tr>
          <td width="50%" bgcolor="#DFE4E8"  style="border:1px solid #5D5D5D">&nbsp;</td>
          <td width="50%" align="right" bgcolor="#DFE4E8"  style="border:1px solid #5D5D5D"><input type="submit" name="btnStep42" id="btnStep42" style='width:80px' value="Save poll" /></td>
        </tr>
       </table>
	  </div>

<?php if ($_REQUEST["openme"]>0) { ?>
<script language="javascript">
LoadStep(<?php echo $_REQUEST["openme"]; ?>);
</script>  
<?php }; ?>
			  
</td><td width="50%" valign="top" align="center">

<?php
if ($_REQUEST["qid"] > 0) {
	$sql = "SELECT * FROM ".$TABLES["COLORS"]." WHERE ID='".$QUESTION["COLOR_SET_ID"]."'";
	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
	$COLORSET	 = mysql_fetch_assoc($sql_result);

?>
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="<?php echo $QUESTION["WIDTH"]; ?>" height="<?php echo $QUESTION["HEIGHT"]; ?>" align="middle">
          <param name="movie" value="<?php echo $SETTINGS["installURL"]; ?>poll.swf?pollid=<?php echo $QUESTION["ID"]; ?>&owner=phpjabbers.com&phpURL=<?php echo $SETTINGS["installURL"]; ?>" />
          <param name="quality" value="high" />
          <param name="bgcolor" value="#<?php echo $COLORSET["POLL_BG"]; ?>" />
          <embed src="<?php echo $SETTINGS["installURL"]; ?>poll.swf?pollid=<?php echo $QUESTION["ID"]; ?>&owner=phpjabbers.com&phpURL=<?php echo $SETTINGS["installURL"]; ?>" quality="high" bgcolor="#ffffff" width="<?php echo $QUESTION["WIDTH"]; ?>" height="<?php echo $QUESTION["HEIGHT"]; ?>" align="middle" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
        </object>
<?php } ?>         
</td></tr></table>
</form>
       
<?php
//////////////////////
//////////////////////
//// HTML CODE ///////
//////////////////////
//////////////////////
} elseif ($_REQUEST["ac"] == 'html') {
	$sql = "SELECT * FROM ".$TABLES["COLORS"]." WHERE ID='".$QUESTION["COLOR_SET_ID"]."'";
	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
	$COLORSET	 = mysql_fetch_assoc($sql_result);
?>        
 &nbsp;&nbsp;&nbsp;&nbsp; Select the HTML code below and copy it. Open your web page using some web page editing software and paste the code where you want the poll to appear on the page. Once you put this code on your web page, you can make changes to your poll using the administration page but there is no need to update the HTML code. Please, note that you should NOT change the code below. In case you do so, it is quite possible that your poll will not work properly.</p>
<textarea name="textarea" rows="16" style="width:720px" >
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="<?php echo $QUESTION["WIDTH"]; ?>" height="<?php echo $QUESTION["HEIGHT"]; ?>" align="middle">
<param name="movie" value="<?php echo $SETTINGS["installURL"]; ?>poll.swf?setWIDTH=<?php echo $QUESTION["WIDTH"]; ?>&pollid=<?php echo $QUESTION["ID"]; ?>&owner=phpjabbers.com&phpURL=<?php echo $SETTINGS["installURL"]; ?>" />
<param name="quality" value="high" />
<param name="bgcolor" value="#<?php echo $COLORSET["POLL_BG"]; ?>" />
<embed src="<?php echo $SETTINGS["installURL"]; ?>poll.swf?setWIDTH=<?php echo $QUESTION["WIDTH"]; ?>&pollid=<?php echo $QUESTION["ID"]; ?>&owner=phpjabbers.com&phpURL=<?php echo $SETTINGS["installURL"]; ?>" quality="high" bgcolor="#ffffff" width="<?php echo $QUESTION["WIDTH"]; ?>" height="<?php echo $QUESTION["HEIGHT"]; ?>" align="middle" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
  </textarea>
<?php
//////////////////////
//////////////////////
//// COLOR SETS  /////
//////////////////////
//////////////////////
} elseif ($_REQUEST["ac"] == 'color_sets') {

	if ($_REQUEST["color_set_id"] > 0) {
  		$sql = "UPDATE ".$TABLES["QUESTIONS"]." 
	            SET `COLOR_SET_ID` = '".$_REQUEST["color_set_id"]."'
                WHERE ID ='1'";
        $sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
	}
?>You can create unlimited amount of color sets and use them when creating a poll. You can change color sets at any time and changes will apply to all polls using the changed color set.
	      <li>To create new Color Set enter its' name and the HTML color codes for all poll parts.</li>
	      <li>To edit a Color Set select it from the drop down menu below and click on 'Edit' button, edit colors and save it. </li>
	      <li>To delete a Color Set select it from the drop down menu below and click on 'Delete' button </li>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="50%" valign="top">
	    <table width="100%" border="0" cellspacing="4" cellpadding="5">
        <tr>
          <td bgcolor="#DFE4E8"  style="border:1px solid #5D5D5D"><form action="poll-admin.php" method="post" style="margin:0px; padding:0px" name="frmac">
			<input type="hidden" name="ac" value="">
            <select name="color_set_id" >
<?php
	$sql = "SELECT * FROM ".$TABLES["COLORS"]." ORDER BY SET_NAME ASC";
	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
	while ($COLOR = mysql_fetch_assoc($sql_result)) {
		if ($_REQUEST["color_set_id"] == $COLOR["ID"]) { $selected=' selected'; } else { $selected=''; };
		echo "<option value='".$COLOR["ID"]."'$selected>".stripslashes(utf8_decode($COLOR["SET_NAME"]))."</option>";
	};
?>			
			</select>
            <input name="submit2" type="submit" onclick="document.frmac.ac.value='color_sets'" value="Edit" />
            <input name="submit" type="submit" onclick="document.frmac.ac.value='del_color_set'" value="Delete" />
		  	</form>		   </td>
        </tr>
        <tr>
          <td bgcolor="#DFE4E8"  style="border:1px solid #5D5D5D">

<?php
if ($_REQUEST["color_set_id"] > 0) {
	$sql = "SELECT * FROM ".$TABLES["COLORS"]." WHERE ID='".$_REQUEST["color_set_id"]."'";
	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
	$COLOR_SET_DATA = mysql_fetch_assoc($sql_result);
	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
};
?>	
	  	<form action="poll-admin.php" method="post" style="margin:0px; padding:0px" name="frm">
		<input type="hidden" name="ac" value="save_color_set">
		<input type="hidden" name="color_set_id" value="<?php echo $_REQUEST["color_set_id"]; ?>">
		  <table width="100%" border="0" cellspacing="0" cellpadding="2">
            <tr>
              <td colspan="2" ><strong>Manage color set </strong></td>
              </tr>
            <tr>
              <td >Color set name </td>
              <td ><label>
                <input name="set_name" type="text"  id="set_name" value="<?php echo str_replace('"','&quot;',stripslashes(utf8_decode($COLOR_SET_DATA["SET_NAME"]))); ?>" size="30" maxlength="30">
              </label></td>
            </tr>
            <tr>
              <td width="43%" >Poll background</td>
              <td width="57%" ><input name="poll_bg" type="text"  id="poll_bg" size="7" maxlength="7" value="<?php echo $COLOR_SET_DATA["POLL_BG"]; ?>">
                <a href="#" onClick="cp.select(frm.poll_bg,'pick2');return false;" name="pick2" id="pick2">select 
        colour</a></td>
            </tr>
            <tr>
              <td >Question background</td>
              <td ><input name="question_bg" type="text"  id="question_bg" size="7" maxlength="7" value="<?php echo $COLOR_SET_DATA["QUESTION_BG"]; ?>">
                <a href="#" onClick="cp.select(frm.question_bg,'pick2');return false;" name="pick2" id="pick2">select 
        colour</a></td>
            </tr>
            <tr>
              <td >Question 
            text</td>
              <td ><input name="question_txt" type="text"  id="question_txt" size="7" maxlength="7" value="<?php echo $COLOR_SET_DATA["QUESTION_TXT"]; ?>">
                <a href="#" onClick="cp.select(frm.question_txt,'pick2');return false;" name="pick2" id="pick2">select 
        colour</a></td>
            </tr>
            <tr>
              <td >Answers text</td>
              <td ><input name="answer_txt" type="text"  id="answer_txt" size="7" maxlength="7" value="<?php echo $COLOR_SET_DATA["ANSWER_TXT"]; ?>">
                <a href="#" onClick="cp.select(frm.answer_txt,'pick2');return false;" name="pick2" id="pick2">select 
        colour</a></td>
            </tr>
            <tr>
              <td >On mouse over (uses opacity)</td>
              <td ><input name="mouse_over" type="text"  id="mouse_over" size="7" maxlength="7" value="<?php echo $COLOR_SET_DATA["MOUSE_OVER"]; ?>">
                <a href="#" onClick="cp.select(frm.mouse_over,'pick2');return false;" name="pick2" id="pick2">select 
        colour</a></td>
            </tr>
            <tr>
              <td >On mouse out</td>
              <td ><input name="mouse_out" type="text"  id="mouse_out" size="7" maxlength="7" value="<?php echo $COLOR_SET_DATA["MOUSE_OUT"]; ?>">
                <a href="#" onClick="cp.select(frm.mouse_out,'pick2');return false;" name="pick2" id="pick2">select 
        colour</a></td>
            </tr>
            <tr>
              <td >Vote button background</td>
              <td ><input name="vote_btn_txt" type="text"  id="vote_btn_txt" size="7" maxlength="7" value="<?php echo $COLOR_SET_DATA["VOTE_BTN_BG"]; ?>">
                <a href="#" onClick="cp.select(frm.vote_btn_txt,'pick2');return false;" name="pick2" id="pick2">select 
        colour</a></td>
            </tr>
            <tr>
              <td >Vote button
            text</td>
              <td ><input name="vote_btn" type="text"  id="color6" size="7" maxlength="7" value="<?php echo $COLOR_SET_DATA["VOTE_BTN_TXT"]; ?>">
                <a href="#" onClick="cp.select(frm.vote_btn,'pick2');return false;" name="pick2" id="pick2">select 
        colour</a></td>
            </tr>
            <tr>
              <td >Total votes color                </td>
              <td ><input name="total_votes" type="text"  id="total_votes" size="7" maxlength="7" value="<?php echo $COLOR_SET_DATA["TOTAL_VOTES"]; ?>">
                <a href="#" onClick="cp.select(frm.total_votes,'pick2');return false;" name="pick2" id="pick2">select 
        colour</a></td>
            </tr>
            <tr>
              <td >Votes bar                </td>
              <td ><input name="votes_bar" type="text"  id="votes_bar" size="7" maxlength="7" value="<?php echo $COLOR_SET_DATA["VOTES_BAR"]; ?>">
                <a href="#" onClick="cp.select(frm.votes_bar,'pick2');return false;" name="pick2" id="pick2">select 
        colour</a></td>
            </tr>
            <tr>
              <td colspan="2" align="center" ><input type="submit" name="Submit2" value="Save color set">
			  <?php
			  if ($_REQUEST["color_set_id"] > 0) {
			  ?>
                <br /><input type="submit" name="Submit22" value="Save as new color set" onClick="document.frm.color_set_id.value=''">
			 <?php }; ?>				</td>
              </tr>
          </table>
		  </form>		  </td>
        </tr>
	</table>
	</td>
	<td align="center" valign="top">
	Demo poll to preview colors<br />
      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="200" height="350" align="middle">
          <param name="movie" value="<?php echo $SETTINGS["installURL"]; ?>poll.swf?pollid=1&owner=phpjabbers.com&phpURL=<?php echo $SETTINGS["installURL"]; ?>" />
          <param name="quality" value="high" />
          <param name="bgcolor" value="#ffffff" />
          <embed src="<?php echo $SETTINGS["installURL"]; ?>poll.swf?pollid=1&owner=phpjabbers.com&phpURL=<?php echo $SETTINGS["installURL"]; ?>" quality="high" bgcolor="#ffffff" width="200" height="350" align="middle" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
        </object>	</td>
	</tr>
	</table>
<?php
}
?>
</td>
</tr>
</table>	  
<?php	
//////////////////////////////////// LOGED ////////////////////////////
} else { /////////// LOGIN BOX
?>
          <form action="poll-admin.php" method="post">
            <input type="hidden" name="ac" value="login">
            <table width="300" border="0" cellpadding="4" cellspacing="0" bordercolor="#000000" bgcolor="#EDEFF1">
              <tr align="center">
                <td colspan="2"><strong style="font-size:18px">Web Poll v4.3 </strong><br>
				by <a href="http://www.phpjabbers.com" target="_blank">phpjabbers.com</a></td>
              </tr>
              <tr align="center">
                <td colspan="2"><?php  if(isset($message)) echo $message; ?></td>
              </tr>
              <tr align="center" bgcolor="#FD9003">
                <td colspan="2" bgcolor="#A6B39D">Admin login </td>
              </tr>
              <tr>
                <td width="91">Username:</td>
                <td width="193" align="left"><input name="user" type="text" id="user" size="15"></td>
              </tr>
              <tr>
                <td>Password:</td>
                <td align="left"><input name="pass" type="password" id="pass" size="15"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="Submit" value="Login"></td>
              </tr>
            </table>
          </form>
<?php
};
?>
</center>
</body>
</html>
