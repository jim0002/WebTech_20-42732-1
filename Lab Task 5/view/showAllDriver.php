<?php  
require_once '../controller/DriverInfo.php';

$students = fetchAllDriver();


    include "nav.php";



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Username</th>
			<th>Age</th>
			<th>Phone</th>
			<th>Image</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($students as $i => $student): ?>
			<tr>
				<td><a href="showDriver.php?id=<?php echo $student['ID'] ?>"><?php echo $student['Name'] ?></a></td>
				<td><?php echo $student['Username'] ?></td>
				<td><?php echo $student['Age'] ?></td>
				<td><?php echo $student['Phone'] ?></td>
				<td><img width="100px" src="../uploads/<?php echo $student['image'] ?>" alt="<?php echo $student['Name'] ?>"></td>
				<td><a href="editDriver.php?id=<?php echo $student['ID'] ?>">Edit</a>&nbsp<a href="../controller/deleteDriver.php?id=<?php echo $student['ID'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>


</body>
</html>