<?php
require_once ('../models/model.php');

$confirm = "";
if(isset ($_POST['submit']))
{
 $data = array 
        (
          "name" =>$_POST['name'],
          "email" =>$_POST['email'],
          "username" =>$_POST['un'],
          "password" =>$_POST['pass'],
          "gender" =>$_POST['gender'],
          "date_of_birth" =>$_POST['dob'],
          "image" => "images/images.png"
        );
        if(regUser($data)) 
		{
  	      $confirm = "Your account has been created. Please go to login page.";
		  session_start();
        }
}
else if(isset ($_POST['Reset']))
{
        $_POST['name'] = "";
        $_POST['email'] = "";
        $_POST['un'] = "";
        $_POST['pass'] = "";
        $_POST['gender'] = "";
        $_POST['dob'] = "";  
}
?>	
