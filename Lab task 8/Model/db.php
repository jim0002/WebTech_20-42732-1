<?php 
function getConnection()
   {
		$host = "localhost";
		$dbname= "smartcity";
		$dbuser = "root";
		$dbpass = "";
		$con = mysqli_connect($host, $dbuser, $dbpass, $dbname) or die();
		return $con;
	}
?>