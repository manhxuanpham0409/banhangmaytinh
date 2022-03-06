<?php
/*
#4.3.0 2007 02 06
# 
# Script: poll.php
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
include("poll-options.php");

//////////////////////
//////////////////////
/////    VOTE  ///////
//////////////////////
//////////////////////
if ($_REQUEST["ac"] == 'vote') {
	$orderId = $_REQUEST["a"] + 1;
	$sql = "UPDATE ".$TABLES["ANSWERS"]."
		      SET `COUNT` = `COUNT`+1 
			    WHERE `QUESTION_ID` = '".$_REQUEST["id"]."' 
			    AND `ORDER_ID` = $orderId";
	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
	$access_ip = (getenv(HTTP_X_FORWARDED_FOR)) ?  getenv(HTTP_X_FORWARDED_FOR) :  getenv(REMOTE_ADDR);
	
	$sql = "SELECT ID FROM ".$TABLES["ANSWERS"]." 
    			                   WHERE `QUESTION_ID` = '".$_REQUEST["id"]."' 
				                     AND `ORDER_ID` = '$orderId'";
	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
	$answer = mysql_fetch_assoc($sql_result);
	
	$sql = "INSERT INTO `".$TABLES["VOTES"]."` 
			    SET `ID` = null,
      				`QUESTION_ID` = '".$_REQUEST["id"]."', 
      				`ANSWER_ID` = (".$answer["ID"]."),
      				`IP` = '$access_ip',
      				`DT` = now()";
	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
//////////////////////
//////////////////////
///  GENERATE XML ////
//////////////////////
//////////////////////
} elseif ($_REQUEST["ac"] == 'xml') {
	$sql = "SELECT * FROM ".$TABLES["QUESTIONS"]." WHERE ID='".$_REQUEST["id"]."'";
	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
	$QUESTION = mysql_fetch_assoc($sql_result);

	$sql = "SELECT * FROM ".$TABLES["COLORS"]." WHERE ID='".$QUESTION["COLOR_SET_ID"]."'";
	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
	$COLORSET	 = mysql_fetch_assoc($sql_result);
	
	if ( mysql_num_rows($sql_result) == 0 ){
  	$sql = "SELECT * FROM ".$TABLES["COLORS"]." WHERE ID='1'";
  	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
  	$COLORSET	 = mysql_fetch_assoc($sql_result);
  }

	$POLL_BG 	 = str_replace("#","",$COLORSET["POLL_BG"]);
	$QUESTION_BG = str_replace("#","",$COLORSET["QUESTION_BG"]);
	$QUESTION_TXT= str_replace("#","",$COLORSET["QUESTION_TXT"]);
	$ANSWER_TXT  = str_replace("#","",$COLORSET["ANSWER_TXT"]);
	$MOUSE_OVER  = str_replace("#","",$COLORSET["MOUSE_OVER"]);
	$MOUSE_OUT 	 = str_replace("#","",$COLORSET["MOUSE_OUT"]);
	$VOTE_BTN_BG = str_replace("#","",$COLORSET["VOTE_BTN_BG"]);
	$VOTE_BTN_TXT= str_replace("#","",$COLORSET["VOTE_BTN_TXT"]);
	$TOTAL_VOTES = str_replace("#","",$COLORSET["TOTAL_VOTES"]);
	$VOTES_BAR 	 = str_replace("#","",$COLORSET["VOTES_BAR"]);
	header("Content-type: text/xml; charset=UTF-8"); 
	
	if($QUESTION["USE_TIME_INTERVAL"] == "true"){
		$currentTime = time();
		$sTime = strtotime($QUESTION["POLL_START"]);
		$eTime = strtotime($QUESTION["POLL_END"]);
		if(($currentTime < $sTime) or ($currentTime > $eTime)) $QUESTION["ALLOW_VOTE"] = "false";
	}
?>
<poll id="<?php echo $QUESTION["ID"]; ?>" backTitle="0x<?php echo $QUESTION_BG; ?>" colorTitle="0x<?php echo $QUESTION_TXT; ?>" colorBackground="0x<?php echo $POLL_BG; ?>" colorAnswers="0x<?php echo $ANSWER_TXT; ?>" btnColor="0x<?php echo $VOTE_BTN_BG; ?>" btnTitle="0x<?php echo $VOTE_BTN_TXT; ?>" overColor="0x<?php echo $MOUSE_OVER; ?>" outColor="0x<?php echo $MOUSE_OUT; ?>" totalColor="0x<?php echo $TOTAL_VOTES; ?>" colorBar="0x<?php echo $VOTES_BAR; ?>" days="<?php echo $QUESTION["DAYS"]; ?>" results="<?php echo $QUESTION["SHOW_RESULT"]; ?>" onvote="<?php echo $QUESTION["ON_VOTE"]; ?>" allowVote="<?php echo $QUESTION["ALLOW_VOTE"]; ?>">
	<question><?php echo stripslashes(utf8_decode($QUESTION["QUESTION"])); ?></question>
	<answers>
<?php
	$sql = "SELECT * FROM ".$TABLES["ANSWERS"]." 
    			WHERE QUESTION_ID='".$QUESTION["ID"]."' 
    			ORDER BY `ORDER_ID`";
	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
	while ($ANSWER = mysql_fetch_assoc($sql_result)) {
?>
	<answer id="<?php echo $ANSWER["ORDER_ID"]-1; ?>" votes="<?php echo $ANSWER["COUNT"]; ?>"><?php echo stripslashes(utf8_decode($ANSWER["ANSWER"])); ?></answer>
<?php
}
?>
	</answers>
	<message><?php echo stripslashes(utf8_decode($QUESTION["CUSTOM_MSG"])); ?></message>
	<voteMsg><?php echo stripslashes(utf8_decode($QUESTION["BTN_MSG"])); ?></voteMsg>
	<totalMsg><?php echo stripslashes(utf8_decode($QUESTION["TOTAL_MSG"])); ?></totalMsg>
	<viewResult enable="<?php echo $QUESTION["VIEW_RESULTS"]; ?>"><?php echo stripslashes(utf8_decode($QUESTION["VIEW_RESULTS_TITLE"])); ?></viewResult>
</poll>
<?php
};
?>
