<!DOCTYPE html>
<html>
    <?php
$name =""; 
session_start();
if(isset( $_SESSION['uname'])){$name = $_SESSION['uname'];
}

if(empty($name)){
header("location:LoginPage.php");
}
?>


<head>
	<title>Manager DashBoard</title>
    
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
    height: 200px; 
    }
    h3 {
    font-size: 25px;
    }
    h4 {
    font-size: 20px;
    }
    ul {
    line-height: 1.7;
    }
    div {
    display: block;
    margin-bottom: auto;
    margin-left: auto;
    margin-right: auto;
    }
    legend {
    margin-left: 35%;
    }
    table {
    width: 75%;
    margin-top: 140px;
    border-collapse: collapse;
    float: right;
    }
    th {
    background-color: #A1F1A1;
    padding: 1.5%;
    text-align: left;
    font-size: 20px;
    }
    td {
    background-color: #F2FFF2;
    padding: 1.5%;
    color: black;
    font-size: 15px;
    }
    </style> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
</head>
<body>
<?php

include('./DashBoard_Header.php');
include('./footer.php');
?>

        <div style="border: 1px solid white; width: 24%; height: 390px;margin-top: 73px; color: white; font-size: 20px; float: left; background: #ABB2B9;" >
                    <ul>
                        <li ><a href='Manager_DashBoard.php' style= "color:white;">Dashboard </a></li>
                        <li ><a href='CarInfo.php' style= "color:white;">Car Information  </a></li>
                        <li ><a href='Booking.php' style= "color:white;">Bookings  </a></li>
                        <li ><a href='PaymentStatus.php' style= "color:white;">Payment Status </a></li>
                        <li ><a href='LogOut.php' style= "color:white;">Change Password  </a></li>
                    </ul> 
                    </div>
                    <br><br><br><br><br><br><br><br>       
<div class="column2">

<h1> <b> WELCOME TO SMART CITY , </b>

<?php echo $name?>!

</h1>

<br>

</div>
         
                                  

        
</body>
</html>