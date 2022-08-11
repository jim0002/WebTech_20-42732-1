

<!DOCTYPE html>
<html>
<head>
	<title>Add Course Schedule</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
</head>
<body>
<?php

include('./DashBoard_Header.php');
include('./footer.php');
 include "../Controller/AddData.php" ;           
?>

        <div style="border: 1px solid white; width: 24%; height: 500px;margin-top: 120px; color: white; font-size: 20px; float: left; background: #ABB2B9;" >
                    <ul>
                        <li ><a href='Manager_DashBoard.php' style= "color:white;">Dashboard </a></li>
                        <li ><a href='CarInfo.php' style= "color:white;">Course Schedule  </a></li>
                        <li ><a href='Booking.php' style= "color:white;">Bookings  </a></li>
                        <li ><a href='PaymentStatus.php' style= "color:white;">Payment Status </a></li>
                    </ul> 
                    </div>
         <div style="border: 1px solid white; width: 74%; height: 500px;margin-top: 100px;color: black; font-size: 20px; float: left;background: #F2FFF2; padding-left: 10px">
        <form method= "post" action="../Controller/AddData.php">
        <legend> <h3 class="main-heading">Adding Car Information</h3> </legend>
        <label for="CarModel">Car Model  : </label>
        <select name="CarModel">
          <option selected disabled >Select an option</option>
          <option value="Toyota Corolla">Toyota Corolla</option>
          <option value="Ferrari 360">Ferrari 360</option>
          <option value="Volkswagen Beetle">Volkswagen Beetle</option>
          <option value="Audi A8">Audi A8</option>
          <option value="Toyota Noah">Toyota Noah</option>
          <option value="Mitsubishi Pajero">Mitsubishi Pajero</option>
          <option value="Toyota Axio">Toyota Axion</option>
          </select><br><br>
        
        <label for="CarID">Car ID  : </label><input type="number" name="CarID" ><br><br>
        <?php
        $today = date("Y-m-d");
        $mindate = date("Y-m-d",strtotime($today.'+ 0 days'));
        $maxdate = date("Y-m-d",strtotime($today.'+ 9 days')) ;
        ?>
        <label for="Date">Date  : </label><input type="date" name="Date" max ="<?php echo $maxdate?>"  min = "<?php echo $mindate?>"><br><br>
         
       <label for="Time">Time  : </label><input type="Time" name="Time" min = "7:00" ><br><br>
        
        <label for="Status">Status  : </label>        
        <input type="radio" name="Status" value="Available" >Available
        <input type="radio" name="Status" value="Unavailable" >Unavailable     
        <h6 style="color: red;">  <?php 
          if(isset($_SESSION['Error']))
            {
              echo $_SESSION['Error'];
              unset($_SESSION['Error']);
          }
        ?></h6>
        <input type="submit" name="Submit" value="Submit">
      </form>
        </div>       
</body>
</html>