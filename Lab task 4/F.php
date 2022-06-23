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
    <legend> <b><h3> PROFILE </h3></b>
	</legend>
	<div style="float:right">
    <img src="<?php echo $dp?>" width="240" height="160"> <br>
    <a href ="G.php"> Change </a> <br> <br>
	</div>
 <?php
      echo "Name &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp : &nbsp &nbsp &nbsp" . $name; echo "<br>";
	  echo " _____________________________________________ <br> <br>";
	  echo "E-mail &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp : &nbsp &nbsp &nbsp" . $email; echo "<br>";
	  echo " _____________________________________________ <br> <br>";
      echo "Gender &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp : &nbsp &nbsp &nbsp" . $gender; echo "<br>";
	  echo " _____________________________________________ <br> <br>";
      echo "Date of Birth &nbsp &nbsp : &nbsp &nbsp &nbsp " . $dob; echo "<br>";
	  echo " _______________________________________________________________________________________________________________________ <br> <br> <br>";
 ?>
   <a href="F2.php"> Edit Profile </a> 
   <br> <br>
</fieldset>
</form>
</div>
</main>
<?php include '_footer.php';?>
</body>
</html>