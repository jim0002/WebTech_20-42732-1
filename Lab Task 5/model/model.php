<?php 

require_once 'db_connect.php';


function showAllDriver(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `driver_info` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showDriver($id){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `driver_info` where ID = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function searchDriver($user_name){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `driver_info` WHERE Username LIKE '%$user_name%'";

    
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function addDriver($data){
	$conn = db_conn();
    $selectQuery = "INSERT into driver_info (Name, Username, Age, Phone, image)
VALUES (:name, :username, :age, :phone, :image)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':name' => $data['name'],
        	':username' => $data['username'],
            ':age' => $data['age'],
            ':phone' => $data['phone'],
        	':image' => $data['image']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


function updateDriver($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE driver_info set Name = ?, Username = ?, Age = ?, phone = ? where ID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['name'], $data['username'], $data['age'], $data['phone'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteDriver($id){
	$conn = db_conn();
    $selectQuery = "DELETE FROM `driver_info` WHERE `ID` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}