<!DOCTYPE html>
<html>
<?php
$uname =""; 
session_start();
if(isset( $_SESSION['username']))
{
    $uname = $_SESSION['username'];
}
if(empty($uname))
{
	header("location:C.php");
}
?>
<head>
  <style>
    .nav {
	list-style-type: none;
	margin: 0;
	top: 0;
	padding: 0;
	position: fixed;
	background-color: #FFFFFF;
	width: 100%;
    }
	h2 {
	font-family: "Lucida Handwriting", "Courier New", monospace;
	color: #008000;
	padding: 4px;
	letter-spacing: 1px;
	}
	li {
	float: left;
	}
   .li {
	margin: 34px;
    display: block;
    }
    li a{
	text-decoration: none;
	}
  </style>
</head>

<body>
<header>
<div class="nav">
    <li> <img src="meditate.jpg" height="85px" width="100px"> </li>
	<li> <h2> MeditateLife </h2> <li>
	<li style="float:right" class="li"> <a href="C2.php"> Logout </a></li>
	<li style="float:right" class="li"> Logged in as <a href="F.php"><?php echo $uname?></a> &nbsp | </li>
</div>
</header>
</body>
</html>
