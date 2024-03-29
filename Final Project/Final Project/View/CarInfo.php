<?php                           
 require_once '../Controller/ShowData.php';
 $datas = fetchAllData();
 $st ='';
?>                           

<!DOCTYPE html>
<html>
<head>
	<title>Course Schedule</title>
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
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<?php
include('./DashBoard_Header.php');
include('./footer.php');
?>
<div style="width: 36.5%; height: 40px;margin-top: 90px; float: left; color: blue; font-size: 20px; text-align: right;">
      <input type="text" name="Search" placeholder= "Search" id="Search">
	  </div>
<div style="width: 50%; height: 40px;margin-top: 90px; float: right; color: blue; font-size: 20px; text-align: right;">
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

              <table>  <thead>
                          <tr>   
                               <th>Car Model</th> 
                               <th>Car ID</th>  
                               <th>Date</th>   
                               <th>Time</th>   
                               <th>Status</th>
                               <th>Edit</th>
                               <th>Delete</th>

                          </tr>
                          </thead>
                          <tbody id="output">
                         <?php foreach ($datas as $i => $data): ?>
			               <tr>
				           <td><?php echo $data['CarModel'] ?></td>
				           <td><?php echo $data['CarID'] ?></td>
				           <td><?php echo $data['Date'] ?></td>
				           <td><?php echo $data['Time'] ?></td>
				           <?php
				           if($data['Status'] =='1'){
				           	$st = "Available";
				           }
				           else{
				           	$st = "Unavailable";
				           }
				           ?>
				           <td><?php echo $st?></td>
                           <td><a href="EditCarInfo.php?id=<?php echo $data['ID'] ?>">Edit</a></td>
                           <td><a href="../Controller/DeleteData.php?id=<?php echo $data['ID'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
			               </tr>
		                 <?php endforeach; ?>  

                         </tbody>  
                            
                     </table>

        <a href="AddCarInfo.php" style=" width: 72%; float:right; padding-right: 30px; padding-top: 20px;margin-bottom: 200px; text-align: right;">Add New</a>     
<script type="text/javascript">
  $(document).ready(function(){
    $("#Search").keypress(function(){
      $.ajax({
        type:'POST',
        url:'../Controller/SearchData.php',
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