<?php 

require_once ('../Model/Model.php');
$st='';
$allSearchedData = searchData($_POST['name']);
?>
<?php if(empty($allSearchedData)){
	echo"<tr><td>0 results</td></tr>";
}
?>
<?php foreach ($allSearchedData as $i => $data): ?>

			               <tr>
				           <td><?php echo $data['CarModel'] ?></td>
				           <td><?php echo $data['CarID'] ?></td>
				           <td><?php echo $data['Date'] ?></td>
				           <td><?php echo $data['Time'] ?></td>
				           <?php
				           if($data['Status'] =='1'){
				           	$st = "Available";
				           }
				           else{
				           	$st = "Unavailable";
				           }
				           ?>
				           <td><?php echo $st?></td>
                           <td><a href="EditCarInfo.php?id=<?php echo $data['ID'] ?>">Edit</a></td>
                           <td><a href="../Controller/DeleteData.php?id=<?php echo $data['ID'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
			               </tr>
		                 <?php endforeach; ?>      	

