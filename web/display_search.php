<?php ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="js/sdmenu/sdmenu.css" rel="stylesheet" type="text/css">
<link href="css/star_computer.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="ax.js"></script>
<title>Star_computer</title>
</head>
<body>
<div id="starcomputer">
	<div id="top"><?php include('banner.php'); ?></div>
	<div id="menutrai"><?php include('menu_left.php');?></div>
	<div id="noidung"><?php require_once('result_search.php'); ?></div>
    <div id="menuphai" style="float:left"><?php include('menu_right.php');?></div>
 	<div id="footer"><?php include('footer.php'); ?></div>
</div>
</body>
</html>
