<?php
ob_start();
echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
/*
 * ADOBE SYSTEMS INCORPORATED
 * Copyright 2007 Adobe Systems Incorporated
 * All Rights Reserved
 * 
 * NOTICE:  Adobe permits you to use, modify, and distribute this file in accordance with the 
 * terms of the Adobe license agreement accompanying it. If you have received this file from a 
 * source other than Adobe, then your use, modification, or distribution of it requires the prior 
 * written permission of Adobe.
 */

/*
	Copyright (c) InterAKT Online 2000-2006. All rights reserved.
*/

	require_once('../common/KT_common.php');
	KT_setServerVariables();
	KT_session_start();

	if (!isset($_SESSION['KT_backArr'])) {
		if (isset($_SERVER['HTTP_REFERER'])) {
			$_SESSION['KT_backArr'] = array();
			array_push($_SESSION['KT_backArr'],$_SERVER['HTTP_REFERER']);
		} else {
			//TODO
			die('Trang này không tự quay về được. Vui lòng click Link sau <a href="javascript: history.go(-1)">Quay về tại đây</a>');
		}
	} else {
		if (count($_SESSION['KT_backArr']) < 1) {
			if (isset($_SESSION['KT_exBack'])) {
				array_push($_SESSION['KT_backArr'], $_SESSION['KT_exBack']);
			} else {
				//TODO
				die('Internal Error');
			}
		}
	}
	$KT_back = array_pop($_SESSION['KT_backArr']);
	if (count($_SESSION['KT_backArr']>0) && isset($_GET['KT_back']) && $_GET['KT_back'] == -2) {
		$KT_back = array_pop($_SESSION['KT_backArr']);
	}
	$_SESSION['KT_exBack'] = $KT_back;
	$KT_back = KT_addReplaceParam($KT_back, '/^totalRows_.*$/i');
	KT_redir($KT_back);
	exit;
?>
