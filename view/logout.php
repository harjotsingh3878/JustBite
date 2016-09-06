<?php
session_start();

if(!isset($_SESSION['user']))
{
	header("Location: login.php");
}
else
{
	unset($_SESSION['user']);
	session_destroy();
	header("Location: login.php");
}

?>