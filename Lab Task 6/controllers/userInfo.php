<?php 
require('../models/model.php');

function fetchAllUser()
{
	return showAllUsers();
}
function fetchUser($id)
{
	return showUserInfo($id);
}

function checkLoginfetchInfo($username)
{
    return login($username);
}

?>