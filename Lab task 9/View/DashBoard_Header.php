<!DOCTYPE html>
<html>
<head>
  <style>
    .nav {
	list-style-type: none;
	margin: 0;
	top:0;
	padding: 0;
	position: fixed;
	background-color: #D5D8DC;
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
	li a , button {
	display: block;
	color: #808080;
	text-align: center;
	padding: 14px 24px;
	text-decoration: none;
	overflow: hidden;
	}
	li a:hover, button:hover {
	background: ;
    color: #008000;
	border-bottom: 2.5px solid #008000;
    }
	.dropdown-content a:hover{
	background: #A1F1A1;
    color: #008000;
    }
	button {
	background-color: #F2FFF2;
	margin: 0;
	border: 0;
	padding-top: 2px;
	}
	.dropdown {
	padding: 14px 24px;
	background-color: #F2FFF2;
	text-decoration: none;
	overflow: hidden;
    }
	.dropdown-content { 
	display: none;
	position: absolute;
	width: 120px;
	background-color: #F2FFF2;
	}
	.dropdown-content a {
	float: none;
	padding: 14px 20px;
	text-decoration: none;
	display: block;
	}
	.dropdown:hover .dropdown-content {
	display: block;
	}
  </style>
</head>

<body>
	<?php
$name =""; 
session_start();
if(isset( $_SESSION['uname'])){
	$name = $_SESSION['uname'];
}

if(empty($name)){
    header("location:LoginPage.php");
}
?>
<header>
<div class="nav">
    <li> <img src="SmartCity.jpg" height="88px" width="100px"> </li>
	<li> <h2> Smart City </h2> <li>
	<li style="float:right"><a href="LogOut.php"> Log Out </a></li>
	<li style="float:right ; padding-top: 14px; color: #808080">Logged in as <?php echo $name?> </li>
	
</div>
</header>
</body>
</html>
