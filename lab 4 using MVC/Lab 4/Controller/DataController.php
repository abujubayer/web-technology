<?php  
include '../Model/Model.php';

function loadData(){
    return readData();

}
function addData($data){
	$final_data = storeData($data);
    if(file_put_contents('../data/data.json', $final_data))  
        {  
            header("location:../View/view_profile.php");
        }  

}
function userInfo($data){

$all_data = readData();
    foreach($all_data as $item)  {
        if ($item['username']==$data) {
            $d_data = array(
                'username' => $item['username'],
                'name' => $item['name'],
                'email' => $item['email'],
                'gender' => $item['gender'],
                'dob' => $item['dob'],
            );
        return $d_data;
        
        
        }
    }

}

function check_email($data){
    $read = readData();
    foreach($read as $item){
        if ($item['email'] === $data){
            $e_data =array(
                'email' => $item['email'],
                'username'=> $item['username'],
                'pass' => $item['password'],
            );
            return $e_data;
        }
    }
}

?>