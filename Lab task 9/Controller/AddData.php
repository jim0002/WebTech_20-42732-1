<?php  
require_once ('../Model/Model.php');

if (isset($_POST['Submit'])) {
	if(empty($_POST['CarModel']) || empty($_POST['CarID']) || empty($_POST['Date']) || empty($_POST['Time']) || empty($_POST['Status'])){
		session_start();
         $_SESSION['Error'] = "Please Fill Up All the Informations..";
         header("location:../View/AddCarInfo.php");
	}
	else{	
	$data['CarModel'] = $_POST['CarModel'];
	$data['CarID'] = $_POST['CarID'];
	$data['Date'] = $_POST['Date'];
	$data['Time'] = $_POST['Time'];
	if($_POST['Status']=='Unavailable')
	{
    $data['Status'] = 0;
	}
	else if($_POST['Status']=='Available'){
	$data['Status'] = 1;	
	}

  if (addData($data)) {
  	session_start();
  	$_SESSION['message'] = "Record has been added."; 
  header("location:../View/CarInfo.php");

  }
}
} else {
	echo 'You are not allowed to access this page.';
}


?>