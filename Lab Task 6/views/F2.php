<!DOCTYPE html>
<html>

<?php
session_start();
require('../controllers/userInfo.php');

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
  <title>EDIT PROFILE</title>
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
	</style>
</head>

<body>
<?php include '_headerL_as.php';?>  
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
  <li><a href="C2.php"> Logout </a></li> <br> 
</ul>  
</div>

<form action="F2.php" method="post">
<div class="column2">
<fieldset>
    <legend> <b><h3> EDIT PROFILE </h3></b>
	</legend>
    <label for="name"> Name &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp:   
    <input type="text" name="name" value = "<?php echo $name?>"> </label> <br>  
	<span class="underline"> _____________________________________________ </span> <br><br>	
	<label for="email"> E-mail &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp : 
	<input type="text" name="email" value = "<?php echo $email?>"> </label> <br>
	<span class="underline"> _____________________________________________ </span> <br><br>	
    <label for="gender"> Gender &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp :  
       <input type="radio" name="gender" value="male" required <?php if($gender == "male"){echo "checked";}?>> Male                 
	   <input type="radio" name="gender" value="female" required <?php if($gender == "female"){echo "checked";}?> > Female
	   <input type="radio" name="gender" value="other" required <?php if($gender == "other"){echo "checked";}?>> Other
    </label> <br> 
	<span class="underline"> _____________________________________________ </span> <br><br>	
    <label for="dob"> Date of Birth &nbsp &nbsp :  
	<input type="date" name="dob" value = "<?php echo $dob?>"> </label> <br>
	<span class="underline"> _____________________________________________ </span> <br><br>
    <input type="submit" name="submit" value="Submit">
	<br> <br>
</fieldset>
</form>
</div>
</main>
<?php include '_footer.php';?>
</body>
</html>