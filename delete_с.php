<?php
	require_once "include/session.php";
	require_once "include/mysqli.php";
	
	db_connect();
	
	$id = $_GET["custom"];
	db_delete_c($id);
	
	header("Refresh: 2; url=" . $_SERVER['HTTP_REFERER']);
	
	db_close();


?>