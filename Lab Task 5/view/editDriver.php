<?php 

require_once '../controller/DriverInfo.php';
$student = fetchDriver($_GET['id']);


 include "nav.php";



 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

 <form action="../controller/updateDriver.php" method="POST" enctype="multipart/form-data">
  <label for="name">Name:</label><br>
  <input value="<?php echo $student['Name'] ?>" type="text" id="name" name="name"><br>
  <label for="username">User Name:</label><br>
  <input value="<?php echo $student['Username'] ?>" type="text" id="username" name="username"><br>
  <label for="age">Age:</label><br>
  <input value="<?php echo $student['Age'] ?>" type="text" id="age" name="age"><br>
  <label for="phone">Phone:</label><br>
  <input value="<?php echo $student['Phone'] ?>" type="text" id="phone" name="phone"><br>
  <input type="file" name="image"><br><br>
  <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
  <input type="submit" name = "updateDriver" value="Update">
  <input type="reset"> 
</form> 

</body>
</html>

