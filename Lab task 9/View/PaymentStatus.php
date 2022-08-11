

<!DOCTYPE html>
<html>
<head>
	<title>Payment Status</title>

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
	height: 1665px; 
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
	margin-top: 5px;
	border-collapse: collapse;
	float: right;
	}
	th {
	background-color: #ABB2B9;
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
</head>
<body>
<?php
include('./DashBoard_Header.php');
include('./footer.php');
?>

<div style="width: 99%; height: 40px;margin-top: 90px; float: left; color: blue; font-size: 20px; text-align: right;">
	<?php 
          if(isset($_SESSION['message']))
          	{
          		echo $_SESSION['message'];
	            unset($_SESSION['message']);
	        }
	      ?>
	  </div>
	}
	

	<div style="border: 1px solid white; width: 24%; height: 430px;margin-top: 4px; color: white; font-size: 20px; float: left; background: #ABB2B9;" >
                    <ul>
					<li ><a href='Manager_DashBoard.php' style= "color:white;">Dashboard </a></li>
                        <li ><a href='CarInfo.php' style= "color:white;">Car Information  </a></li>
                        <li ><a href='Booking.php' style= "color:white;">Bookings </a></li>
                        <li ><a href='PaymentStatus.php' style= "color:white;">Payment Status </a></li>
                        <li ><a href='LogOut.php' style= "color:white;">Log Out  </a></li>
                    </ul> 
                    </div>

              <table>  
                          <tr>   
                               <th>Customer ID</th> 
                               <th>Car ID</th>     
                               <th>Payment Status</th>
                               <th>Delete</th>

                          </tr>  
                          <?php   
                          include '../Controller/DataControl.php' ;

                          foreach($payment->getUsers()  as $row)  
                          {  
                               echo '<tr>
                               <td>'.$row['Client_ID'].'</td>
                               <td>'.$row['Car_ID'].'</td>
                               <td>'.$row['Status'].'</td>
                               <td><a href="AddPayment.php?delete='.$row['Id'].'">Delete</a></td>
                               </tr>';  

                          }  
                          ?> 
                     </table>

        <a href="AddPayment.php" style="float:right; padding-right: 30px; padding-top: 20px">Add New</a>     

</body>
</html>