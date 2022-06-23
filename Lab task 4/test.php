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
                          include '../Controller/DataController.php' ;

                          $data = loadData();

                          foreach($data as $row)  
                          {  
                              ?>
                               <tr>
                               <td><a href="details.php?name=<?php echo $row['name'] ?>"><?php echo $row['name'] ?></a></td>
                               <td><?php echo $row['e-mail'] ?></td>
                               <td><?php echo $row['username'] ?></td>
                               <td><?php echo $row['gender'] ?></td>
                               <td><?php echo $row['dob'] ?></td>
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