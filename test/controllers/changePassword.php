<?php  
require('../models/model.php');
function changePass($username, $data)
{
    return  updatePassword($username, $data);
}
?>