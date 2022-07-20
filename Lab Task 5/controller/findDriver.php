<?php

require_once '../model/model.php';

if (isset($_POST['findDriver'])) {
	
		echo $_POST['user_name'];

    try {
    	
    	$allSearchedDriver = searchDriver($_POST['user_name']);
    	require_once '../view/showSearchedDriver.php';

    } catch (Exception $ex) {
    	echo $ex->getMessage();
    }
}

