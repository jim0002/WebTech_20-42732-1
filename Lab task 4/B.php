<!DOCTYPE html>
<html>
<head>
  <title>REGISTRATION</title>
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
<?php include '_header_R.php';?>  
<main> 
    <br> <br> <br> <br>            
<?php
$confirm = "";
if(isset ($_POST['submit']))
{
 $data = array 
        (
          "Name" =>$_POST['name'],
          "Email" =>$_POST['email'],
          "User_Name" =>$_POST['un'],
          "Password" =>$_POST['pass'],
          "Gender" =>$_POST['gender'],
          "Date_of_Birth" =>$_POST['dob'],
          "Image" => "images/images.png"
        );
           require("user.class.php");
           $user = new User('data.json');
           $user-> insertNewUser($data);
           $confirm = "Your account has been created successfully. Please go to login page.";
}
else if(isset ($_POST['Reset']))
{
        $_POST['name'] = "";
        $_POST['email'] = "";
        $_POST['un'] = "";
        $_POST['pass'] = "";
        $_POST['Cpass'] = "";
        $_POST['gender'] = "";
        $_POST['dob'] = "";  
}
?>	

<div class="container" style="width:640px;">  
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">       
<fieldset>
    <legend> <b><h3> REGISTRATION </h3></b>
	</legend>  
    <label for="name"> Name &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp : </label>  
    <input type="text" name="name" class="form-control"> <br>  
	<span class="underline"> _____________________________________________ </span> <br><br>	
	<label for="email"> E-mail &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp : </label>
	<input type="text" name="email" class="form-control"> <br>
	<span class="underline"> _____________________________________________ </span> <br><br>	
	<label for="un"> User Name &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp : </label>
	<input type="text" name="un" class="form-control"> <br>
	<span class="underline"> _____________________________________________ </span> <br><br>	
	<label for="pass"> Password &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp : </label>
	<input type="password" name="pass" class="form-control"> <br>
	<span class="underline"> _____________________________________________ </span> <br><br>	
	<label for="Cpass"> Confirm Password &nbsp : </label>
	<input type="password" name="Cpass" class="form-control"> <br>
	<span class="underline"> _____________________________________________ </span> <br><br>	
	<fieldset>
	<legend> Gender </legend>
	   <input type="radio" name="gender" value="male"> Male                 
	   <input type="radio" name="gender" value="female"> Female
	   <input type="radio" name="gender" value="other"> Other
	</fieldset>
    <span class="underline"> _____________________________________________ </span> <br><br>	
	<fieldset>
	<legend> Date of Birth </legend>
	   <input type="date" name="dob"><br>
    </fieldset> 
	<span class="underline"> _____________________________________________ </span> <br><br>	
	<input type="submit" name="submit" value="Submit">
    <input type="reset" name="reset" value="Reset">	
	<br> <br> 
</fieldset>	
</form> <br> 
<?php
echo $confirm;
?>	
</div> 
<br> <br> <br> <br> <br>
</main>
<?php include '_footer.php';?>
</body>
</html>