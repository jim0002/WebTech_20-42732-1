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
$em = "";

if(isset($_POST['submit']))
{
	$em = $_POST['email'];
	if(empty($em))
	{
	   $emailErr = "[!] Please enter your email ";
	}
	else {  
	if(!filter_var($em, FILTER_VALIDATE_EMAIL))
	{ 
	   $emailErr ="[!] Invalid email. Please re-enter your email ";
	}
	else
	{
       $match = "jb";
       $info = file_get_contents("data.json");
       $info = json_decode($info);
       foreach($info as $Info) 
	   {
          $un = $Info-> Email;
          if($un == $em)
		  {
            $match = "";
          }
        }
        if(empty($match))
		{
           $er = "A code has been sent on your email.";
        }
        else
		{
          $er = "Sorry! We haven't find any account with this email.";
        }
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