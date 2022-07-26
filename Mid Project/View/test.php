<!DOCTYPE html>  
 <html>  
      <head>  
        <title></title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
        <div class="container" style="width:500px;">              
                <div class="table-responsive"> 
                     <table class="table table-bordered">  
                          <tr>  
                               <th>Name</th> 
                               <th>E-mail</th>  
                               <th>User name</th>   
                               <th>Gender</th>   
                               <th>Date of birth</th>   
                          </tr>  
                          <?php   
                          //include '../Controller/DataController.php' ;

                          //$data = loadData();

                          $data = file_get_contents("data.json");  
                          $data = json_decode($data, true); 

                          foreach($data as $row)  
                          {  
                              ?>
                               <tr>
                               <td><a href="details.php?name=<?php echo $row['Name'] ?>"><?php echo $row['Name'] ?></a></td>
                               <td><?php echo $row['Email'] ?></td>
                               <td><?php echo $row['User_Name'] ?></td>
                               <td><?php echo $row['Gender'] ?></td>
                               <td><?php echo $row['Date_of_Birth'] ?></td>
                               </tr>
                               <?php 
                          }  
                          ?>  
                     </table> 
                     <a href="store.php" class="btn btn-primary">Add New</a> 
                   </div>
                 </div>
      </body>  
 </html>  