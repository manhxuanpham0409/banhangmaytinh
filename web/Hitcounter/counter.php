<?php session_start();?>
<?php
$digit_dir = "./";
$min_width = 5;
$lifetime = 30;
if($_SESSION['counter']!=1)
{ 
mysql_query("update counter set counter=counter+1");
$_SESSION['counter']=1;
}
$kq=mysql_query("select * from counter");
$row=mysql_fetch_assoc($kq);
$count=$row["counter"];
echo $count;
?>
