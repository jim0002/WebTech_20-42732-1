<!DOCTYPE html>
<html>
<body>
<?php
$unameErr = $passErr = "";
$uname = $psword = "";

if(isset($_POST['submit']))
{
	$uname = $_POST['username'];
	$psword = $_POST['password'];
	if(empty($uname))
	{
	   $unameErr = "[!] Please fill out your name ";
	}
	else 
	{  if(strlen($uname)<2)
	   {
	      $unameErr = "Must contain at least two characters.";
	   }
	   else{if(!preg_match("/^[a-zA-Z0-9_]+([a-zA-Z0-9_]*[.-]?[a-zA-Z0-9_]*)*[a-zA-Z0-9_]+$/", $uname))
	   {
		  $unameErr ="Can contain alpha numeric characters, period, dash or underscore only.";
	   }
	  }
	}
	
	if(empty($psword))
	{
		$passErr = "[!] Please fill out your password";
	}
	else {if(strlen($psword)<8)
	   {
	      $passErr = "Must not be less than eight characters.";
	   }
	   else{
		if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/',$psword))
	   {
	  	 //$passErr ="Must contain at least one of the special characters.";
	   }
	  }
	}
}
?>

<div class="container" style="width:600px;">  
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
 <fieldset>
  <legend>
   <b><h3> LOGIN </h3></b>
  </legend> 
    <label for="username"> User Name : </label>
	<input type="text" id="username" name="username">
    <span style="color: #FF0000">*<?php echo $unameErr?></span>
    <br> <br>
    <label for="password"> Password : </label>
	<input type="text" id="password" name="password">
    <span style="color: #FF0000">*<?php echo $passErr?></span> <br>
    <span class="underline"> _______________________________________________________________ </span>
	<br> <br>
    <input type="checkbox" name="remember"> Remember Me
    <br> <br>
	<input type="submit" name="submit" value="Submit"> &nbsp
    <span> <a href="Task_3.2.php">Forgot Password?</a> </span>
	<br> <br>
 </fieldset>
</form>
</div>

<?php
   echo "<br>";
   echo $uname; 
   echo "<br>" ;
   echo $psword;
?>
</body>
</html>