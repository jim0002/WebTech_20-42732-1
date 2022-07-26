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


<div class="container" style="width:640px;">  
<form method= "post" class="register-form"  action="../controllers/reg.php" enctype="multipart/form-data">       
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
	<fieldset>
	<legend> Gender </legend>
	   <input type="radio" name="gender" value="Male"> Male                 
	   <input type="radio" name="gender" value="Female"> Female
	   <input type="radio" name="gender" value="Other"> Other
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
</div> 
<br> <br> <br> <br> <br>
</main>
<?php include '_footer.php';?>
</body>
</html>
