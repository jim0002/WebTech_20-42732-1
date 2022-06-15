<!DOCTYPE html>
<html>
<body>
<?php
$cp = $np = $rp = "";
$cpErr = $npErr = $rpErr = $Err = "";
$confirm = "";
if(isset ($_POST['Submit']))
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
      if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $cp))
	  {
		$cpErr ="Current password is wrong.";
	  }
	  if($cp == $np)
	  {
        $npErr = "Should not be same as the current password.";
	  }
	  if($np != $rp)
	  {
	    $rpErr = "Must match with the new password.";
	  }
	  if(($cp != $np) && ($np == $rp))
	  {
	    $confirm = "Your Password Has Been Reset Successfully!";
	  }
	}
}
?>

<div class="container" style="width:500px;">  
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
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
	  <br><br>
      <span class="underline"> _____________________________________________ </span> 
	  <br><br> 
      <input type="submit" name="Submit" value="Submit">
 </fieldset>
</form>
</div>	

<?php
echo "<br>";
echo $cp;
echo "<br>";
echo $np;
echo "<br>";
echo $rp;
echo "<br><br>";
echo $confirm;
?>

</body>
</html>