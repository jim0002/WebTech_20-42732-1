<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <?php 
        include "nav.php";

     ?>
   

 <form action="../controller/createDriver.php" method="POST" enctype="multipart/form-data">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name"><br>
  <label for="username">User Name:</label><br>
  <input type="text" id="username" name="username"><br>
  <label for="age">Age:</label><br>
  <input type="text" id="age" name="age"><br>
  <label for="phone">Phone:</label><br>
  <input type="text" id="phone" name="phone"><br>
  <input type="file" name="image"><br><br>
  <input type="submit" name = "createDriver" value="Create">
  <input type="reset"> 
</form> 

</body>
</html>

