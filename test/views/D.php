<!DOCTYPE html>
<html>
<head>
  <title>FORGOT PASSWORD</title>
  <style>
  h3 {
  font-size: 25px;
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
<?php include '_header_L.php';?>  
<main> 
<br> <br> <br> <br>
<?php

$emailErr = $er = "";
$email = "";

if(isset($_POST['submit']))
{
	$email = $_POST['email'];
	if(empty($email))
	{
	   $emailErr = "[!] Please enter your email ";
	}
	else {  
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{ 
	   $emailErr ="[!] Invalid email. Please re-enter your email ";
	}
	else
	{
        $er = "A code has been sent on your email.";
    }
	}
}
?>

<div class="container" style="width:600px;">  
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
 <fieldset>
  <legend>
   <b><h3> FORGOT PASSWORD </h3></b>
  </legend> 
    <label for="email"> Enter Email : </label>
	<input type="text" id="email" name="email">
    <span style="color: #FF0000"> <?php echo $emailErr?></span> <br>
    <span class="underline"> ______________________________________________________ </span>
	<br> <br>
	<input type="submit" name="submit" value="Submit">
	<br> <br>
 </fieldset>
</form> <br> <br>
<?php
   echo "<br>";
   echo $er; 
?>
</div> <br>
</main>
<?php include '_footer.php';?>
</body>
</html>
