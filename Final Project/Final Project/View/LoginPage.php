<?php
include('./HomeHeader.php');
require_once '../Controller/ShowData.php';
$datas = checkLogfetchData($_POST['uname']);
$nameErr = $passErr = $l = "";

if(isset ($_POST['Submit'])){
  $n = $_POST['uname'];
  $p = $_POST['pass'];
  if(empty($n)){
    $nameErr = "Please Enter Your Name";
  }
  else{
    if(strlen($n)<2){
          $nameErr = "User Name should contains at least two characters";
       }
      else{
        if(!preg_match("/^[a-zA-Z0-9_]+([a-zA-Z0-9_]*[.-]?[a-zA-Z0-9_]*)*[a-zA-Z0-9_]+$/", $n)){
    $nameErr =" User Name can contain alpha numeric characters, period, dash or underscore only. Please renter user name.";
        }
       }
  }
  if(empty($p)){
    $passErr = "Please Enter Password";
  }
  
  else{
    if(!preg_match( "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $p)){
    $passErr =" Minimum eight characters, at least one letter, one number and one special character";
       }
         else{
             $c = "jb";
             $dept = "";
              if($datas['Username']==$n && $datas['Password']==$p){
               $c = "";
               $dept = $datas['Department'];
              
            }

            }            
            if(empty($c)){
              session_start();
             $_SESSION['uname']  = $n; 
             if(isset($_POST['remember'])){
              setcookie("uname", $n, time() +100);
              setcookie("pass", $p, time() +100);
             }
             if($dept=="Manager"){
            header("location:Manager_DashBoard.php");
          }
             }
        else{
          $l = "Invalid User Name Or Password!";
         }
        }
  }



  ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
      <div class="container" style="width:640px;">              
                           
    <form  method= "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <br><br>
    <fieldset>
    <legend> <b><h3> LOGIN </h3></b>
	  </legend>
        <label><span style="color: red"><?php echo $l ?></span></label><br><br>
        <label for="uname"> <b>User Name :</b> </label>
        <input list ="output" type="text" name="uname" id="Search" onkeyup="myFunction()" value="<?php if(isset($_COOKIE['uname'])){echo $_COOKIE['uname']; } ?>">
        <datalist id ="output">
          
        </datalist>
        <span style="color: red">*<br><?php echo $nameErr?><br></span><br>

        <label for="pass"> <b>Password :</b> </label>
        <input type="password" name="pass" id= "pass" onkeyup="myFunction()" value="<?php if(isset($_COOKIE['pass'])) {echo $_COOKIE['pass'];} ?>"><span style="color: red">*<br><?php echo $passErr?><br></span><br>    
        <span class="underline">____________________________________________________________________</span><br>
        
        <input type="checkbox" name="remember" value =1 class = "check"> <label for="remember"> Remember me</label><br>   
        <button name="Submit" id="btn" value="Submit" style="display:none;"> Submit </button>
        <a href="ForgotPassword.php">Forgot Password?</a>
        <script>
function myFunction() {
  var x = document.getElementById("Search").value;
  var y = document.getElementById("pass").value;
  
  if(x=="" || y==""){
  	document.getElementById("btn").style.display = "none";
  }
  else{
 	document.getElementById("btn").style.display = "block";
  }
  
}
</script>

        </fieldset>
    </form> 
</div>
 
<?php
include('./footer.php');
?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#Search").keypress(function(){
      $.ajax({
        type:'POST',
        url:'../Controller/Suggestion.php',
        data:{
          name:$("#Search").val(),
        },
        success:function(data){
          $("#output").html(data);
        }
      });
    });
  });
</script>
</body>
</html>

