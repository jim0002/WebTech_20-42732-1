<?php 

require_once '../model/model.php';

if (deleteDriver($_GET['id'])) {
    header('Location: ../view/showAllDriver.php');
}

 ?>