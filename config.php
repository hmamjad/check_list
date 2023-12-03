<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "check_list";

$con = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if(!$con){
    die("Connection Fail");
}



// $sql = "INSERT INTO student(name,roll,address) VALUES('Kamal','103','Dhaka')";
// $result = mysqli_query($con,$sql); // if you refresh url data will insert again

// if($result){
//     echo "New Record Inserted successfully!";
// }else{
//     echo "Unable Insert Data";
// }

?>







