<?php 
	$unameErr = $passErr = $err = "";
	require('../controllers/userInfo.php');
		$logCheck = checkLoginfetchInfo($_POST['username']);
	if(isset($_POST['submit']))
	{	
        $username = $_POST['username'];
		$password = $_POST['password'];
		if(empty($username))
		{
		   $unameErr = "[!] Please fill out your username ";
		}
		else 
		{  if(strlen($username)<2)
		   {
			  $unameErr = "Must contain at least two characters.";
		   }
		   else{if(!preg_match("/^[a-zA-Z0-9_]+([a-zA-Z0-9_]*[.-]?[a-zA-Z0-9_]*)*[a-zA-Z0-9_]+$/", $username))
		   {
			  $unameErr ="Can contain alpha numeric characters, period, dash or underscore only.";
		   }
		  }
		}
		
		if(empty($password))
		{
			$passErr = "[!] Please fill out your password";
		}
		else 
		{
		   if(!preg_match(	"/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $password))
		   {
			   $passErr ="Must contain minimum eight characters, at least one alphabic letter & one numeric number and at least one special character.";
		   }
		   else
		   {
             $match = "m";
              if($logCheck['username'] == $username && $logCheck['Password']==$password)
			  {
                $match = ""; 
			  }
		   }
		}
		   
		if($username != null && $password != null)
		{
            session_start();
            $_SESSION['username'] = $username; 
            if(isset($_POST['remember']))
			{
              setcookie("username", $username, time() +60*60*7);
              setcookie("password", $password, time() +60*60*7);
            }
            header("location:E.php");
			} 
			else
			{
				$err = 'Invalid User Name or Password!';
				unset($_COOKIE["username"]);
				unset($_COOKIE["password"]);
			}
		   }	
?>