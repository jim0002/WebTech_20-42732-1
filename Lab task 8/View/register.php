<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>REGISTRATION</title>
    <style>
    body {
    height: 870px;
    }
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
    
  <?php include 'HomeHeader.php';?>  
   <br> <br> <br> <br>
   <div class="container" style="width:640px;">              
    <form method="post" action="../Controller/regCheck.php" onsubmit="validateRegistration(this)">
    <fieldset>
    <legend> <b><h3> REGISTRATION </h3></b>
	  </legend>  
      <label for="name"> Name: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </label>
      <input type="text" id="name" name="name" class="form-control" onblur="checkName()" onkeyup="checkName()"> <br>
      <span class="underline">________________________________________</span> <br><br>	   
      <label for="email"> EMAIL: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </label>
      <input type="text" autocomplete="off" id="email" name="email" class="form-control"> <br>
	    <span class="underline">________________________________________</span> <br><br>	
      <label for="username"> User Name: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </label>
      <input type="text" autocomplete="off" id="username" name="username" class="form-control"> 
      <span class="underline">________________________________________</span> <br><br>	
      <label for="password"> Password: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </label>
      <input type="password" autocomplete="off" id="password" name="password" class="form-control">
      <span class="underline">________________________________________</span> <br><br>	
      <label for="department"> Department: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </label>
      <input type="text" id="department" name="department" class="form-control"> <br>
      <span class="underline">________________________________________</span> <br><br>
      <label for="phoneNo"> Phone: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </label>
      <input type="text" autocomplete="off" id="phoneNo" name="phoneNo" class="form-control"> <br>
      <span class="underline">________________________________________</span> <br><br>	   	  
      <label for="hiredate"> Joining Date: &nbsp &nbsp &nbsp &nbsp &nbsp </label>
      <input type="date" id="hiredate" name="hiredate" class="form-control"> <br>
      <span class="underline">________________________________________</span> <br><br>	
      <label for="gender"> Gender: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </label> <br><br>
        <input type="radio" id="gender" name="gender" value="male"> Male                 
	      <input type="radio" id="gender" name="gender" value="female"> Female
	      <input type="radio" id="gender" name="gender" value="other"> Other <br>
      <span class="underline">________________________________________</span>
      <br><br><br><br>	
      <input type="submit" name="submit" value="Submit" onClick="onRegister()">
  </fieldset>	
  </form> </div>
  <br><br>
  <?php include 'footer.php';?>  
 </body>
</html>