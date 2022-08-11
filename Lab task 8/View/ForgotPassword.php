<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Forgot Password</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
</head>
<body>
<?php
include('./HomeHeader.php');
include('./footer.php');
$pErr = $l = "";
$p = "";
if(isset ($_POST['Submit'])){
	$p = $_POST['email'];

if(empty($p)){
		$pErr = "Please fill up all the informations!";
	}
	else{
		if(!preg_match(	"/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $p)){
		$pErr =" Invalid Email !";
	     }
	       else{
             $cu = "jb";
            $info = file_get_contents("data.json");
            $info = json_decode($info);
            foreach ($info as $Info) {
              $un = $Info->Email;
              if($un==$p){
               $cu = "";
              }
            }
                        
            if(empty($cu)){
            $l = "There is an account with this email. ";
             }
        else{
          $l = "Sorry...There is no account with this email!";
         }
        }
	}
}
?>


                    <div class="form-box">
                        <div class="form">
 
    <form  method= "post" action="<?php echo $_SERVER['PHP_SELF'];?>">

        <legend> <h1 class="main-heading">Forgot Password</h1> </legend>
        <label><span style="color: red"><?php echo $l ?></span></label><br><br>
        <label for="email"> <b>Email :</b> </label>
        <input type="text" name="email"><span style="color: red">*<?php echo $pErr?><br></span>  
        <span class="underline">______________________</span><br><br> 
        <button name="Submit" value="Submit"> Submit </button>
    </form> 
     </div>
 </div>
</body>
</html>