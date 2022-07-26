<?php
  require_once 'db_Connect.php';  

function showAllUsers()
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `carmanager` ';
    try 
    {
    $stmt = $conn->query($selectQuery);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showUserInfo($id)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `carmanager` where username = ?";
    try {
    $stmt = $conn->prepare($selectQuery);
    $stmt->execute([$id]);
    } 
    catch (PDOException $e) 
    {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function regUser($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into carmanager (name, email, username, password, gender, date_of_birth) 
    VALUES (:name, :email, :username, :password, :gender, :date_of_birth)";
    try {
    $stmt = $conn->prepare($selectQuery);
    $stmt->execute
     ([
       ':name' => $data['name'],
       ':email' => $data['email'],
       ':username' => $data['username'],
       ':password' => $data['password'],
       ':gender' => $data['gender'],
       ':date_of_birth'=> $data['date_of_birth'],
     ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}

function updateUser($id, $data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE carmanager set name = ?, email = ?, gender = ?, date_of_birth = ?, image = ? 
    where username = ?";
    try {
    $stmt = $conn->prepare($selectQuery);
    $stmt->execute
    ([
        $data['name'], $data['email'], $data['gender'],$data['date_of_birth'], $data['image'], $id
    ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    } 
    $conn = null;
    return true;
}

function updatePassword($id, $data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE carmanager set password = ? where username = ?";
    try {
    $stmt = $conn->prepare($selectQuery);
    $stmt->execute([$data['password'], $id]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}

function login($username)
{
    $conn = db_conn();
    $selectQuery = "SELECT username FROM `carmanager` where username = ? ";
    try {
    $stmt = $conn->prepare($selectQuery);
    $stmt->execute([$username]);
    } 
    catch (PDOException $e) 
    {
        echo $e->getMessage();
    }
    return true;
}
?>
  


     