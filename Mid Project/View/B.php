<?php  

include '../Controller/DataController.php';
 $message = '';  
 $error = '';  
 if(isset($_POST["submit"]))  
 {  
      
           if(file_exists('../data/data.json'))  
           {  
                $extra = array(  
                     'name'               =>     $_POST['name'],  
                     'email'          =>     $_POST["email"],  
                     'un'     =>     $_POST["un"],  
                     //'gender'     =>     $_POST["gender"],  
                     //'dob'     =>     $_POST["dob"]  
                ); 
                addData($extra);
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
 }  
 ?> 
<!DOCTYPE html>
<html>
<head>
  <title>REGISTRATION</title>
  <style>
  h3 {
  font-size: 25px;
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
<?php include '_header_R.php';?>  
<main> 
    <br> <br> <br> <br>            
<?php
$nameErr = $emailErr = $unameErr = $passErr = $cpassErr = $genderErr = $dobErr = $er = "";
$name = $email = $uname = $psword = $cpass = $gender = $dob = "";
$confirm = "";
if(isset ($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $uname = $_POST['un'];
    $psword = $_POST['pass'];
    $cpass = $_POST['Cpass'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];

    $flag = false;
    if(empty($name))
    {
        $flag = true;
       $nameErr = "User Name is required.";
    }
    else 
    {  if(strlen($name)<2)
       {
        $flag = true;
          $nameErr = "Must contain at least two characters.";
       }
       if(!preg_match("/^[a-zA-Z0-9_]+([a-zA-Z0-9_]*[.-]?[a-zA-Z0-9_]*)*[a-zA-Z0-9_]+$/", $uname))
       {
        $flag = true;
          $nameErr ="Can contain Alpha Numeric characters, Period, Dash or Underscore only.";
       }
    }

    if (empty($email)) {
        $flag = true;
        $emailErr = "E-mail is required.";
      } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $flag = true;
          $emailErr = "Invalid E-mail format.";
        }
      }

    if(empty($uname))
    {
        $flag = true;
       $unameErr = "User Name is required.";
    } else 
    {  if(strlen($uname)<2)
       {
        $flag = true;
          $unameErr = "Must contain at least two characters.";
       }
       if(!preg_match("/^[a-zA-Z0-9_]+([a-zA-Z0-9_]*[.-]?[a-zA-Z0-9_]*)*[a-zA-Z0-9_]+$/", $uname))
       {
        $flag = true;
          $unameErr ="Can contain Alpha Numeric characters, Period, Dash or Underscore only.";
       }
    }

    if(empty($psword))
    {
        $flag = true;
        $passErr = "Password is required.";
    } else 
    {
       if(!preg_match(  "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $psword))
       {
        $flag = true;
         $passErr ="Must contain minimum eight characters; at least one Alphabic letter, one Numeric number and at least one Special character.";
       }
    }

    if(empty($cpass))
    {
        $flag = true;
        $cpassErr = "Password confirm is required.";
    } else
    {
        if($cpass != $psword)
        {
            $flag = true;
            $cpassErr = "Password must match.";
        }
    }

    if (empty($gender)) {
        $flag = true;
        $genderErr = "Gender is required.";
      } 
    
    if (empty($dob)) {
        $flag = true;
        $dobErr = "Date of Birth is required";
      } 
    if(!$flag)
    {
        $data = array 
        (
          "Name" =>$_POST['name'],
          "E-mail" =>$_POST['email'],
          "User_Name" =>$_POST['un'],
          "Password" =>$_POST['pass'],
          "Gender" =>$_POST['gender'],
          "Date_of_Birth" =>$_POST['dob'],
          "Image" => "images/images.png"
        );
           require("user.class.php");
           $user = new User('data.json');
           $user-> insertNewUser($data);
           $confirm = "Your account has been created successfully. Please go to login page.";
    }
}
else if(isset ($_POST['Reset']))
{
        $_POST['name'] = "";
        $_POST['email'] = "";
        $_POST['un'] = "";
        $_POST['pass'] = "";
        $_POST['Cpass'] = "";
        $_POST['gender'] = "";
        $_POST['dob'] = "";  
}
?>  

<div class="container" style="width:640px;">  
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">       
<fieldset>
    <legend> <b><h3> REGISTRATION </h3></b>
    </legend>  
    <label for="name"> Name: </label>  
    <input type="text" name="name" value="<?php echo $name;?>">
    <span style="color: #FF0000">*<?php echo $nameErr ?></span>
    <br>

    <span class="underline"> ___________________________________________________________________________ </span> <br><br>   
    <label for="email"> E-mail: </label>
    <input type="text" name="email" value="<?php echo $email;?>">
    <span style="color: #FF0000">*<?php echo $emailErr ?></span>
    <br>

    <span class="underline"> ___________________________________________________________________________ </span> <br><br>   
    <label for="username"> User Name: </label>
    <input type="text" name="un" value="<?php echo $uname;?>">
    <span style="color: #FF0000">*<?php echo $unameErr?></span>
    <br>

    <span class="underline"> ___________________________________________________________________________ </span> <br><br>   
    <label for="pass"> Password: </label>
    <input type="password" name="pass" value="<?php echo $psword;?>">
    <span style="color: #FF0000">*<?php echo $passErr?></span>
    <br>

    <span class="underline"> ___________________________________________________________________________ </span> <br><br>   
    <label for="Cpass"> Confirm Password: </label>
    <input type="password" name="Cpass" value="<?php echo $cpass;?>">
    <span style="color: #FF0000">*<?php echo $cpassErr?></span>
    <br>

    <span class="underline"> ___________________________________________________________________________ </span> <br><br>   
    <fieldset>
    <legend> Gender </legend>
    <input type="radio" name="gender"
        <?php if (isset($gender) && $gender=="female") echo "checked";?>
        value="female">Female
        <input type="radio" name="gender"
        <?php if (isset($gender) && $gender=="male") echo "checked";?>
        value="male">Male
        <input type="radio" name="gender"
        <?php if (isset($gender) && $gender=="other") echo "checked";?>
        value="other">Other
        <span style="color: #FF0000">*<?php echo $genderErr?></span>
    <br>
    </fieldset>
    
    <span class="underline"> ___________________________________________________________________________ </span> <br><br>   
    <fieldset>
    <legend> Date of Birth </legend>
    <input type="date" id="date" name="dob" value="<?php echo $dob;?>"> 
    <span style="color: #FF0000">*<?php echo $dobErr ?></span>
    </fieldset> 

    <span class="underline"> ___________________________________________________________________________ </span> <br><br>   
    <input type="submit" name="submit" value="Submit">
    <input type="reset" name="reset" value="Reset"> 
    <br> <br> 
</fieldset> 
</form> <br> 
<?php
echo $confirm;
?>  
</div> 
<br> <br> <br> <br> <br>
</main>
<?php include '_footer.php';?>
</body>
</html>