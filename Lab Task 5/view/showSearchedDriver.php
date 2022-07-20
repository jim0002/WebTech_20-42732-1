
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		table,td,th{
			border:1px solid black;
		}
	</style>
</head>
<body>

<?php 
    include "nav.php";

?>

<table>
	<thead>
		<tr>
			<th>User_id</th>
			<th>User_name</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($allSearchedDriver as $i => $user): ?>
			<tr>
				<td><a href="../showDriver.php?id=<?php echo $user['ID'] ?>"><?php echo $user['ID'] ?></a></td>
				<td><?php echo $user['Username'] ?></td>
				<td><a href="../editDriver.php?id=<?php echo $user['ID'] ?>">Edit</a>&nbsp<a href="/..controller/deleteDriver.php?id=<?php echo $user['ID'] ?>">Delete</a></td>
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>


</body>
</html>