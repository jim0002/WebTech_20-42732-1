<?php
  require_once 'DB_Connect.php';  


function showAllData(){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `carinfo` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showData($id){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `carinfo` where ID = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function searchData($CarModel){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `carinfo` WHERE CarModel LIKE '%$CarModel%'";

    
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function addData($data){
    $conn = db_conn();
    $selectQuery = "INSERT into carinfo (CarModel, CarID, Date, Time, Status) VALUES (:CarModel, :CarID, :Date, :Time, :Status)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':CarModel' => $data['CarModel'],
            ':CarID' => $data['CarID'],
            ':Date' => $data['Date'],
            ':Time' => $data['Time'],
            ':Status' => $data['Status']
        ]);

    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


function updateData($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE carinfo set CarModel = ?, CarID = ?, Date = ?, Time = ?, Status = ?  where ID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['CarModel'], $data['CarID'], $data['Date'],$data['Time'],$data['Status '], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteData($id){
    $conn = db_conn();
    $selectQuery = "DELETE FROM `carinfo` WHERE `ID` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}

  function LoginCheck($username){
    $conn = db_conn();
    $selectQuery = "SELECT Username, Password, Department FROM `logininfo` where Username = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$username]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function loginSuggestion($username){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `logininfo` WHERE Username LIKE '%$username%'";

    
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
?>
  


     