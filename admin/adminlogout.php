<?php
session_start();

if(!isset($_SESSION['user']))
{
	header("Location: adminlogin.php");
}
else
{
	unset($_SESSION['user']);
	unset($_SESSION['sellerid']);
	session_destroy();
	header("Location: adminlogin.php");
}

?>