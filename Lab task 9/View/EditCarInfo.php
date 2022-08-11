<?php
include('./DashBoard_Header.php');
include('./footer.php');
require_once '../Controller/ShowData.php';
$data = fetchData($_GET['id']);     
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
    
<div style="border: 1px solid white; width: 24%; height: 430px;margin-top: 140px; color: white; font-size: 20px; float: left; background: #ABB2B9;" >
                    <ul>
                        <li ><a href='Manager_DashBoard.php' style= "color:white;">Dashboard </a></li>
                        <li ><a href='CarInfo.php' style= "color:white;">Car Information  </a></li>
                        <li ><a href='Booking.php' style= "color:white;">Bookings  </a></li>
                        <li ><a href='PaymentStatus.php' style= "color:white;">Payment Status </a></li>
                        <li ><a href='LogOut.php' style= "color:white;">Log Out  </a></li>
                    </ul> 
                    </div>
         <div style="border: 1px solid white; width: 74%; height: 430px;margin-top: 120px;color: black; font-size: 20px; float: left;background: #F2FFF2; padding-left: 10px">
        <form method= "post" action="../Controller/EditData.php">
        <legend> <h3 class="main-heading">Edit Car Information</h3> </legend>
        <label for="CarModel">Car Model  : </label>
        <select name="CarModel" >
          <option selected disabled >Select an option</option>
          <option value="Toyota Corolla" <?php if($data['CarModel']=="Toyota Corolla"){echo "selected";}?>>Toyota Corolla</option>
          <option value="Ferrari 360" <?php if($data['CarModel']=="Ferrari 360"){echo "selected";}?>>Ferrari 360</option>
          <option value="Volkswagen Beetle" <?php if($data['CarModel']=="Volkswagen Beetle"){echo "selected";}?>>Volkswagen Beetle</option>
          <option value="Audi A8" <?php if($data['CarModel']=="Audi A8"){echo "selected";}?>>Audi A8</option>
          <option value="Toyota Noah" <?php if($data['CarModel']=="Toyota Noah"){echo "selected";}?>>Toyota Noah</option>
          <option value="Mitsubishi Pajero" <?php if($data['CarModel']=="Mitsubishi Pajero"){echo "selected";}?>>Mitsubishi Pajero</option>
          <option value="Toyota Axio" <?php if($data['CarModel']=="Toyota Axio"){echo "selected";}?>>Toyota Axio</option>
          
          </select><br><br>
        
        <label for="CarID">Car ID  : </label><input type="number" name="CarID" value = "<?php echo $data['CarID']?>"  ><br><br>
        
        <?php
        $today = date("Y-m-d");
        $mindate = date("Y-m-d",strtotime($today.'+ 0 days'));
        $maxdate = date("Y-m-d",strtotime($today.'+ 9 days')) ;
        ?>
        <label for="Date">Date  : </label><input type="date" name="Date" max ="<?php echo $maxdate?>"  min = "<?php echo $mindate?>" value = "<?php echo $data['Date']?>"><br><br>
         
       <label for="Time">Time  : </label><input type="Time" name="Time" value = "<?php echo $data['Time']?>"><br><br>
        
        <label for="Status">Status  : </label>        
        <input type="radio" name="Status" value="Available" <?php if($data['Status']==1){echo "checked";}?>>Available
        <input type="radio" name="Status" value="Unavailable" <?php if($data['Status']==0){echo "checked";}?>>Unavailable 
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">   
        <input type="submit" name="Submit" value="Submit" onclick="return confirm('Are you sure want to update this ?')">
      </form>
        </div>                  
</body>
</html>