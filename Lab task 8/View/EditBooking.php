<?php
include('./DashBoard_Header.php');
include('./footer.php');
$V = $t = $i = $d = $tm = $s =$id= "";
include '../Controller/DataControl.php' ;

session_start();
if(isset($_GET['edit'])){
$V= $_GET['edit'];

}
else if(isset($_GET['delete'])){
$V= $_GET['delete'];
$booking->deleteUser($V);
$_SESSION['message'] = "Record has been deleted.";
header("location: Booking.php");
}
foreach ($booking->getUsers() as $Info) {
 $id = $Info['Id'];
if($id==$V){
   $t = $Info['Client_ID'];
   $i = $Info['Car_ID'];
   $s = $Info['Date'];
   $tm =$Info['Time']; 
   $s = $Info['Status'];
  }
}
if(isset ($_POST['Submit'])){

            $booking->updateUser($id,'Client_ID',$_POST['Client_ID']);
            $booking->updateUser($id,'Car_ID',$_POST['Car_ID']);
            $booking->updateUser($id,'Date',$_POST['Date']);
            $booking->updateUser($id,'Time',$_POST['Time']);
            $booking->updateUser($id,'Status',$_POST['Status']);
            $_SESSION['message'] = "Record has been edited.";
            header("location:Booking.php");
}

            
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
</head>
<body >
    
<div style="border: 1px solid white; width: 24%; height: 500px;margin-top: 100px; color: white; font-size: 20px; float: left; background: #ABB2B9;" >
                    <ul>
                        <li ><a href='Manager_DashBoard.php' style= "color:white;">Dashboard </a></li>
                        <li ><a href='CarInfo.php' style= "color:white;">Car Information  </a></li>
                        <li ><a href='Booking.php' style= "color:white;">Bookings  </a></li>
                        <li ><a href='PaymentStatus.php' style= "color:white;">Payment Status </a></li>
                        <li ><a href='LogOut.php' style= "color:white;">Log Out  </a></li>
                    </ul> 
                    </div>
         <div style="border: 1px solid white; width: 74%; height: 500px;margin-top: 100px;color: black; font-size: 20px; float: left;background: #F2FFF2; padding-left: 10px">
        <form method= "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <legend> <h3 class="main-heading">Edit Booking</h3> </legend>
        <label for="Client_ID">Customer ID  : </label>
        <input type="number" name="Client_ID" value = "<?php echo $t?>"  ><br><br>
        
        <label for="Car_ID">Car ID  : </label><input type="number" name="Car_ID" value = "<?php echo $i?>"  ><br><br>
        
        <?php
        $today = date("Y-m-d");
        $mindate = date("Y-m-d",strtotime($today.'+ 0 days'));
        $maxdate = date("Y-m-d",strtotime($today.'+ 9 days')) ;
        ?>

        <label for="Date">Date  : </label><input type="date" name="Date" max ="<?php echo $maxdate?>"  min = "<?php echo $mindate?>"><br><br>
         
       <label for="Time">Time  : </label><input type="Time" name="Time" value = "<?php echo $tm?>"  ><br><br>
        
        <label for="Status">Booking Status  : </label>        
        <input type="radio" name="Status" value="Confirmed" >Confirmed
        <input type="radio" name="Status" value="Not Confirmed" >Not Confirmed   <br><br>     

        <input type="submit" name="Submit" value="Submit">
      </form>
        </div>                  
</body>
</html>