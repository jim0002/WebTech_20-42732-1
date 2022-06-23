<?php
session_start();
if(isset( $_SESSION['username']))
{
	session_destroy();
	header("location:C.php");
}
else
{
	header("location:C.php");
}
?>