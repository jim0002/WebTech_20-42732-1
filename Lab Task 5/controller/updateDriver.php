<?php  
require_once '../model/model.php';


if (isset($_POST['updateDriver'])) {
	$data['name'] = $_POST['name'];
	$data['username'] = $_POST['username'];
	$data['age'] = $_POST['age'];
	$data['phone'] = $_POST['phone'];
	$data['image'] = basename($_FILES["image"]["name"]);

	$target_dir = "../uploads/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);


  if (updateDriver($_POST['id'], $data)) {
  	echo 'Successfully updated!!';
  	//redirect to showDriver
  	header('Location: ../view/showDriver.php?id=' . $_POST["id"]);
  }
} else {
	echo 'You are not allowed to access this page.';
}


?>