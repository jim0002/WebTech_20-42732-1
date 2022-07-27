<!DOCTYPE html>
<html>
<?php
require('../controllers/login.php');
?>
<head>
  <title>LOGIN</title>
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

<div class="container" style="width:600px;">  
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
 <fieldset>
  <legend>
   <b><h3> LOGIN </h3></b>
  </legend> 
    <label for="username"> User Name : </label>
	<input type="text" id="username" name="username" value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username']; } ?>" >
    <span style="color: #FF0000">*<?php echo $unameErr?></span>
    <br> <br>
    <label for="password"> Password : </label>
	<input type="text" id="password" name="password" value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password'];} ?>" >
    <span style="color: #FF0000">*<?php echo $passErr?></span> <br>
    <span class="underline"> _____________________________________________________________________ </span>
	<br> <br>
    <input type="checkbox" name="remember" value=er> Remember Me
    <br> <br>
	<input type="submit" name="submit" value="Submit"> &nbsp
    <span> <a href="D.php">Forgot Password?</a> </span>
	<br> <br>
	<h3> <span style="color:  #FF0000"> <?php echo $err ?> </span> </h3><br>
 </fieldset>
</form>
</div> <br> 
</main>
<?php include '_footer.php';?>
</body>
</html>
