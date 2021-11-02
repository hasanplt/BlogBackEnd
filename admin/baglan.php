<?php
session_start();
ob_start();

try {

	$db=new PDO("mysql:host=localhost;dbname=basitblog;charset=utf8",'root','35460hasan');
	
} catch (PDOException $e) {

	echo $e->getmessage();
	
}

 ?>