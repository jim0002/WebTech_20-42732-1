
<!DOCTYPE html>
<html>
  <body>
<?php 
    include "nav.php";

?>
    <!-- [SEARCH FORM] -->
    <form method="post" action="../controller/findDriver.php">
      <h1>SEARCH FOR USERS</h1>
      <input type="text" name="user_name" />
      <input type="submit" name="findDriver" value="Search"/>
    </form>


 
  </body>
</html>