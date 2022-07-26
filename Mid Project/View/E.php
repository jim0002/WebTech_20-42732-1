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
  <title>DASHBOARD</title>
    <style>
   .column {
	float: left;
    width: 28%;
    padding: 1%;
    height: 400px; 
	}
   .column2 { 
	float: left;
	width: 68%;
	padding: 1%;
	height: 400px; 
	}
	h1 {
	font-size: 50px;
	padding: 4%;
	background-color: #FADADD;
	}
	h4 {
	font-size: 20px;
	}
	div {
    display: block;
	margin-bottom: auto;
	margin-left: auto;
	margin-right: auto;
	}
	a {
	text-decoration: none;
	}
	</style>
</head>

<body>
<?php include '_headerL_as.php';?>  <br><br>
<main> 
    <br> <br> <br>
<div class="column">
<h4><b> Account </b> <br>
<span class="underline"> ___________________________ </span> <br>
</h4>
<ul>
  <li><a href="E.php"> Dashboard </a></li> <br>
  <li><a href="F.php"> View profile </a></li> <br>
  <li><a href="F2.php"> Edit profile </a></li> <br>
  <li><a href="G.php"> Change Profile Picture </a></li> <br>
  <li><a href="H.php"> Change Password </a></li> <br>
  <li><a href="carManager.php"> Car Manager </a></li> <br>
  <li><a href="carInfo.php"> Car Info </a></li> <br>
  <li><a href="driverInfo.php"> Driver Info </a></li> <br>
  <li><a href="C2.php"> Logout </a></li> <br> 
</ul>  
</div>

<div class="column2">
   <h1> <i> WELCOME </i> 
   <a href="F.php" style="color:#DA73D6"> <?php echo $uname?> ! </a>
   </h1>
   <br> 
</div>
</main>
<?php include '_footer.php';?>
</body>
</html>