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

<table>
	<tr>
		<th>Name</th>
		<th>Username</th>
		<th>Age</th>
		<th>Phone</th>
		<th>Image</th>
	</tr>
	<tr>
		<td><a href="../showDriver.php?id=<?php echo $student['ID'] ?>"><?php echo $student['Name'] ?></a></td>
		<td><?php echo $student['Username'] ?></td>
		<td><?php echo $student['Age'] ?></td>
		<td><?php echo $student['Phone'] ?></td>
		<td><img width="100px" src="../uploads/<?php echo $student['image'] ?>" alt="<?php echo $student['Name'] ?>"></td>
	</tr>

</table>


</body>
</html>