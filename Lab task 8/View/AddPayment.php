

<!DOCTYPE html>
<html>
<head>
  <title>Add Payment</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
</head>
<body>
<?php
include('./DashBoard_Header.php');
include('./footer.php');
include '../Controller/DataControl.php' ;
$V ="";
if(isset($_GET['delete'])){
$V= $_GET['delete'];
$payment->deleteUser($V);
$_SESSION['message'] = "Record has been deleted.";
header("location:PaymentStatus.php");
}

if(isset ($_POST['Submit'])){
 $data = array(
         "Client_ID" =>$_POST['Client_ID'],
         "Car_ID" =>$_POST['Car_ID'],
         "Status" =>$_POST['Status']
          );
          
            $payment->insertNewUser($data);
            $_SESSION['message'] = "Record has been inserted.";
            header("location:PaymentStatus.php");
}
?>

        <div style="border: 1px solid white; width: 24%; height: 400px;margin-top: 120px; color: white; font-size: 20px; float: left; background: #ABB2B9;" >
                    <ul>
                        <li ><a href='Manager_DashBoard.php' style= "color:white;">Dashboard </a></li>
                        <li ><a href='CarInfo.php' style= "color:white;">Car Information  </a></li>
                        <li ><a href='Booking.php' style= "color:white;">Bookings  </a></li>
                        <li ><a href='PaymentStatus.php' style= "color:white;">Payment Status </a></li>
                        <li ><a href='LogOut.php' style= "color:white;">Log Out  </a></li>
                    </ul> 
                    </div>
         <div style="border: 1px solid white; width: 74%; height: 500px;margin-top: 120px;color: black; font-size: 25px; float: left;background: #F2FFF2; padding-left: 10px">
        <form method= "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <legend> <h3 class="main-heading">Add Payment Status</h3> </legend>
        <label for="Client_ID">Client ID  : </label>
        <input type="number" name="Client_ID"><br><br>
        
        <label for="Car_ID">Car ID  : </label><input type="number" name="Car_ID" ><br><br>
        
        <label for="Status">Status  : </label>        
        <input type="radio" name="Status" value="Paid" >Paid
        <input type="radio" name="Status" value="Not Paid" >Not Paid   <br><br>     

        <input type="submit" name="Submit" value="Submit">
      </form>
        </div>       
</body>
</html>