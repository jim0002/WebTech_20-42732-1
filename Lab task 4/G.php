<!DOCTYPE html>
<html>
<?php
$uname = "";
$er = ""; $dp = ""; 
session_start();
if(isset( $_SESSION['username']))
{
	$uname = $_SESSION['username'];
}
if(empty($uname))
{
    header("location:C.php");
}
    $info = file_get_contents("data.json");
    $info = json_decode($info);
    foreach ($info as $Info) 
	{
       $un = $Info-> User_Name;
       if($un == $uname)
	   {
          $dp = $Info->Image ;
       }
    }
?>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <title> CHANGE PROFILE PICTURE</title>
    <style>
   .column {
	float: left;
    width: 28%;
    padding: 1%;
    height: 400px; 
	}
   .column2 { 
	float: left;
	width: 68%;
	padding: 1%;
	height: 400px; 
	}
	h3 {
	font-size: 25px;
	}
	h4 {
	font-size: 20px;
	}
	div {
    display: block;
	margin-bottom: auto;
	margin-left: auto;
	margin-right: auto;
	}
	</style>
</head>

<body>
<?php include '_headerL_as.php';?>  
<main> 
    <br> <br> <br>
<div class="column">
<h4><b> Account </b> <br>
<span class="underline"> ___________________________ </span> <br>
</h4>
<ul>
  <li><a href="E.php"> Dashboard </a></li> <br>
  <li><a href="F.php"> View profile </a></li> <br>
  <li><a href="F2.php"> Edit profile </a></li> <br>
  <li><a href="G.php"> Change Profile Picture </a></li> <br>
  <li><a href="H.php"> Change Password </a></li> <br>
  <li><a href="C2.php"> Logout </a></li> <br> 
</ul>  
</div>

<form method= "post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
<div class="column2">
<fieldset>
    <legend> <b><h3> PROFILE PICTURE</h3></b>
	</legend>
    <i class="fas fa-user-alt" style="font-size:65px;"></i> 
	<br> <br>
    <input type="file" name="fileToUpload" id="fileToUpload"> <br>
	<span class="underline"> ______________________________ </span> 
	<br> <br> 
	<label for="uname"> <?php echo $er?> </label> <br>
	<input type="submit" name="submit" value="Upload Image" > 
	<br> <br>
</fieldset>
</form>
</div>
</main>

<?php

$target_dir = "Uploads/";
$target_file = $target_dir .basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"]) && isset($_FILES["fileToUpload"])) 
{
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) 
  {
    $uploadOk = 1;
	if(file_exists($target_file))              
    {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    else
	{
     if ($_FILES["fileToUpload"]["size"] > 5000000) 
	 {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
     }
      else
	  {
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) 
		{
            echo "Sorry, only JPG, JPEG & PNG files are allowed.";
            $uploadOk = 0;
        }
        else
		{
          if ($uploadOk == 0) 
		  {
             echo "Sorry, your file was not uploaded.";
          } 
		  else 
		  {
             if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
			 {
                $dp = "PP/".htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
                require("user.class.php");
                $user = new User('data.json');
                $user-> updateUser($uname,'Image',$dp);
                header("location:F.php");
                $er =  "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
              } 
			  else 
			  {
                echo "Sorry, there was an error uploading your file.";
              }
          }
        }
      }
    }
  }
    else 
    {
      echo "File is not an image.";
      $uploadOk = 0;
    }
    
 }
?>


<?php include '_footer.php';?>
</body>
</html>