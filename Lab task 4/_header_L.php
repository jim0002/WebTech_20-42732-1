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
	background-color: pink;
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
	li a {
	display: block;
	color: #808080;
	text-align: center;
	padding: 14px 24px;
	text-decoration: none;
	overflow: hidden;
	}
	.active {
	background-color: #D8D8D8;
    border-bottom: 3px solid #008000;
	}
	li a:hover {
	background: #A1F1A1;
    color: #008000;
	border-bottom: 2.5px solid #008000;
    }
  </style>
</head>

<body>
<header>
<div class="nav">
    <li> <img src="SmartCity.jpg" height="85px" width="100px"> </li>
	<li> <h2> Smart City </h2> <li>
	<li style="float:right"><a href="B.php"> Registration </a></li>
	<li class="active" style="float:right"><a href="C.php"> Login </a></li>
	<li style="float:right"><a href="A.php"> Home </a></li>
</div>
</header>
</body>
</html>