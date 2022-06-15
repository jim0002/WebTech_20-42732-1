<?php
$target_dir = "Uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if(isset($_POST["submit"]))                    //check if the file is a real image or fake image
{
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) 
  {
	 echo "File is an image - " . $check["mime"] . ".";
     $uploadOk = 1;
	 echo "<br><br>";
  } 
  else {
	 echo "File is not an image.";
     $uploadOk = 0;
	 echo "<br>";
  }
}

if(file_exists($target_file))               //check if the file already exists
{
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

if($_FILES["fileToUpload"]["size"] >40000000)           //check the file size
{
  echo "Sorry! Your file is too large.";
  $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" )          //check the file format
{
  echo "Sorry! Only JPG, JPEG & PNG files are allowed to upload.";
  $uploadOk = 0;
}

if($uploadOk == 0)
{	
  echo "Sorry, your file was not uploaded.";
} 
else 
{
   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
   {
       echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
   } 
   else 
   {
	   echo "Sorry. There was an error uploading your file.";
   }
}
?>