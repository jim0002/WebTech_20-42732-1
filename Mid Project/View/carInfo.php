<!DOCTYPE html>
<html>
<?php
$name = $email = $gender = $dob = $dp = ""; 
$uanme = "";

session_start();
if(isset( $_SESSION['username']))
{
	$uname = $_SESSION['username'];
}
if(empty($uname))
{
    header("location:C.php");
}
      $info = file_get_contents("data.json");
      $info = json_decode($info);
      foreach ($info as $Info) 
	  {
          $un = $Info-> User_Name;
          if($un==$uname)
		  {
            $name = $Info-> Name;
            $email = $Info-> Email ;
            $gender = $Info-> Gender ;
            $dob =$Info-> Date_of_Birth ;
			$dp = $Info-> Image ;
          }
       }
?>

<head>
  <title>VIEW PROFILE</title>
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
	height: 450px; 
	}
	h3 {
	font-size: 25px;
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
    .Div {
			border: 2px ;
			background-color: lightblue; 
			border: 5px outset gray;   
      text-align : center;
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
<fieldset>
    <legend> <b><h3> CAR INFO </h3></b>
	</legend>
    <div class="Div">
		<h4><a href="ACTaxiCar.php">AC Taxi Car</a></h>
	</div>
    <div class="Div">
		<h4><a href="">Non AC Taxi Car</a></h>
	</div>
    <div class="Div">
		<h4><a href="">CNG Auto Rickshaw</a></h>
	</div>
	
</fieldset>
</div>
</main>
<?php include '_footer.php';?>
</body>
</html>