<!DOCTYPE html>
<html>

<head>
  <title>CHANGE PASSWORD</title>
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

<?php
require('../controllers/userInfo.php');
$cp = $np = $rp = "";
$cpErr = $npErr = $rpErr = $Err = "";
$confirm = "";   
if(isset( $_SESSION['uname']))
{
	$name = $_SESSION['uname'];
}
if(empty($uname))
{
	header("location:C.php");
}
if(isset($_POST['submit']))
{
	$cp = $_POST['currentPsw'];
	$np = $_POST['newPsw'];
	$rp = $_POST['retypePsw'];
    if(empty($cp) || empty($np) || empty($rp))
    {
		$Err = "[!] Please fill out";
	}
	else 
	{ 
	   if(!preg_match(	"/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $np))
	   {
		 $npErr =" Minimum eight characters, at least one letter, one number and one special character!";
	   }
	   else
	   {  
		 $match = "jb";
         $info = file_get_contents("data.json");
         $info = json_decode($info);
         foreach ($info as $Info) 
		 {
            $u = $Info-> User_Name;
            $p = $Info-> Password;
            if($u == $uname && $p == $cp)
			{
               $match = "";
            }
         }
	   if(!empty($match))
	   {
          $cpErr ="Current password is wrong.";
	   }
	   else
	   {
	      if($cp == $np)
		  {
			 $npErr = "Should not be same as the current password.";
		  }
	   else
	   {
	      if($np != $rp)
		  {
	         $rpErr = "Must match with the new password.";
	      }
	    else
	    {
	      require("user.class.php");
          $user = new User('data.json');
          $user-> updateUser($uname,'Password',$np);
          $confirm = "Your Password Has Been Reset Successfully!";
	    }
	   }
	   }  
	  }
	}
}
?>

<form method= "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<div class="column2">
<fieldset>
  <legend>
  <b><h3> CHANGE PASSWORD </h3></b>
  </legend> 
      <label for="currentPsw"> Current Password &nbsp &nbsp &nbsp &nbsp &nbsp : </label>
      <input type="text" name="currentPsw"> 
	  <span style="color: #FF0000"> <?php echo $Err?> <?php echo $cpErr?> </span>
	  <br><br>
	  <label for="newPsw" style="color: #00D100"> New Password &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp : </label>
	  <input type="text" name="newPsw">
	  <span style="color: #FF0000"> <?php echo $Err?> <?php echo $npErr?> </span>
	  <br><br>
	  <label for="retypePsw" style="color: #D2042D"> Retype New Password &nbsp : </label>
	  <input type="text" name="retypePsw">
	  <span style="color: #FF0000"> <?php echo $Err?> <?php echo $rpErr?> </span>
	  <br>
      <span class="underline"> _____________________________________________ </span> 
	  <br><br> 
      <input type="submit" name="submit" value="Submit">
	  <br> <br>
 </fieldset>
</form>
<br> <br>
<?php
echo $confirm;
?>	
</div>
</main>
<?php include '_footer.php';?>
</body>
</html>