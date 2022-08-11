<?php  
require_once ('../Model/Model.php');
$st = '';

if (isset($_POST['Submit'])) {
	$data['CarModel'] = $_POST['CarModel'];
	$data['CarID'] = $_POST['CarID'];
	$data['Date'] = $_POST['Date'];
	$data['Time'] = $_POST['Time'];
    if($data['Status'] =='Available'){
	$st =1;
  }
  else{
 	$st =0;
  }
	$data['Status'] = $st;

  if (updateData($_POST['id'], $data)) {
	session_start();
  	$_SESSION['message'] = "Record has been updated."; 
    header('location:../View/CarInfo.php');
  }
} else {
	echo 'You are not allowed to access this page.';
}


?>