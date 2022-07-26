<?php  
include '../Model/Model.php';

function loadData(){
return readData();

}
function addData($data){
	$final_data = storeData($data);
    if(file_put_contents('../data/data.json', $final_data))  
        {  
            header("location:../View/load.php");
        }  

}
function studentInfo($data){

$all_data = readData();
    foreach($all_data as $row)  {
        if ($row['name']==$data) {
            $d_data = array(
                'name' => $row['name'],
                'e-mail' => $row['e-mail'],
                'username' => $row['username'],
                'gender' => $row['gender'],
                'dob' => $row['dob'],
            );
        return $d_data;
        }
    }

}

?>