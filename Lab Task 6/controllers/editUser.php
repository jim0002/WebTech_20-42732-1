<?php  
require_once ('../models/model.php');

if (isset($_POST['Submit'])) 
{
	$data['name'] = $_POST['name'];
	$data['email'] = $_POST['email'];
	$data['gender'] = $_POST['gender'];
	$data['date_of_birth'] = $_POST['dob'];

  if(updateUser($_POST['id'], $data)) 
  {
    header('location:../views/F.php');
  }
}
?>