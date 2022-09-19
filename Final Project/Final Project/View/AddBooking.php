

<!DOCTYPE html>
<html>
<head>
	<title>Add Booking</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
</head>
<body>
<?php
include('./DashBoard_Header.php');
include('./footer.php');

if(isset ($_POST['Submit'])){
 $data = array(
         "Client_ID" =>$_POST['Client_ID'],
         "Car_ID" =>$_POST['Car_ID'],
         "Date" =>$_POST['Date'],
         "Time" =>$_POST['Time'],
         "Status" =>$_POST['Status']
          );
            include '../Controller/DataControl.php' ;
            $booking->insertNewUser($data);
            header("location:Booking.php");
}
?>

        <div style="border: 1px solid white; width: 24%; height: 430px;margin-top: 150px; color: white; font-size: 20px; float: left; background: #ABB2B9;" >
                    <ul>
                        <li ><a href='Manager_DashBoard.php' style= "color:white;">Dashboard </a></li>
                        <li ><a href='CarInfo.php' style= "color:white;">Car Information  </a></li>
                        <li ><a href='Booking.php' style= "color:white;">Bookings  </a></li>
                        <li ><a href='PaymentStatus.php' style= "color:white;">Payment Status </a></li>
                        <li ><a href='LogOut.php' style= "color:white;">Log Out  </a></li>
                    </ul> 
                    </div>
         <div style="border: 1px solid white; width: 74%; height: 500px;margin-top: 150px;color: black; font-size: 20px; float: left;background: #F2FFF2; padding-left: 10px">
        <form method= "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <legend> <h3 class="main-heading">Adding Bookings</h3> </legend>
        <label for="Client_ID">Client ID  : </label>
        <input type="number" name="Client_ID"><br><br>
        
        <label for="Car_ID">Instructor ID  : </label><input type="number" name="Car_ID" ><br><br>
        
        <?php
        $today = date("Y-m-d");
        $mindate = date("Y-m-d",strtotime($today.'+ 0 days'));
        $maxdate = date("Y-m-d",strtotime($today.'+ 9 days')) ;
        ?>

        <label for="Date">Date  : </label><input type="date" name="Date" max ="<?php echo $maxdate?>"  min = "<?php echo $mindate?>"><br><br>
         
       <label for="Time">Time  : </label><input type="Time" name="Time"><br><br>
        
        <label for="Status">Status  : </label>        
        <input type="radio" name="Status" value="Confirmed" >Confirmed
        <input type="radio" name="Status" value="Not Confirmed" >Not Confirmed   <br><br>     

        <input type="submit" name="Submit" value="Submit">
      </form>
        </div>       
</body>
</html>