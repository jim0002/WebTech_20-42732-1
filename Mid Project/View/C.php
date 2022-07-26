<!DOCTYPE html>
<html>
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
<?php
$unameErr = $passErr = $er = "";
$uname = $psword = "";
if(isset($_POST['submit']))
{
	$uname = $_POST['username'];
	$psword = $_POST['password'];
	if(empty($uname))
	{
	   $unameErr = "Please fill out your User Name.";
	}
	else 
	{  if(strlen($uname)<2)
	   {
	      $unameErr = "Must contain at least two characters.";
	   }
	   if(!preg_match("/^[a-zA-Z0-9_]+([a-zA-Z0-9_]*[.-]?[a-zA-Z0-9_]*)*[a-zA-Z0-9_]+$/", $uname))
	   {
		  $unameErr ="Can contain Alpha Numeric characters, Period, Dash or Underscore only.";
	   }
	}
	
	if(empty($psword))
	{
		$passErr = "Please fill out your Password.";
	}
	else 
	{
	   if(!preg_match(	"/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $psword))
	   {
	  	 $passErr ="Must contain minimum eight characters; at least one Alphabic letter, one Numeric number and at least one Special character.";
	   }
	   else
	   {
          $match = $mp = "jb";
          $info = file_get_contents("data.json");
          $info = json_decode($info);
          foreach($info as $Info) 
		  {
            $un = $Info-> User_Name;
            if($un == $uname)
			{
               $match = "";
            }
          }
          foreach($info as $Info2) 
		  {
            $pn = $Info2-> Password;
            if($pn == $psword)
			{
               $mp = "";
            }
          }            
          if(empty($match) && empty($mp))
		  {
            session_start();
            $_SESSION['username'] = $uname; 
            if(isset($_POST['remember']))
			{
              setcookie("username", $uname, time() +500);
              setcookie("password", $psword, time() +500);
            }
        header("location:E.php");
           }
        else
		{
          $er = "Invalid User Name Or Password!";
		  unset($_COOKIE["username"]);
		  unset($_COOKIE["password"]);
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
	<input type="text" id="username" name="username" value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username']; } ?>" >
    <span style="color: #FF0000">*<?php echo $unameErr?></span>
    <br> <br>
    <label for="password"> Password : </label>
	<input type="password" id="password" name="password" value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password'];} ?>" >
    <span style="color: #FF0000">*<?php echo $passErr?></span> <br>
    <span class="underline"> ______________________________________________________________________ </span>
	<br> <br>
    <input type="checkbox" name="remember" value=er> Remember Me
    <br> <br>
	<input type="submit" name="submit" value="Submit"> &nbsp
    <span> <a href="D.php">Forgot Password?</a> </span>
	<br> <br>
	<h3> <span style="color:  #FF0000"> <?php echo $er ?> </span> </h3><br>
 </fieldset>
</form>
</div> <br> 
</main>
<?php include '_footer.php';?>
</body>
</html>