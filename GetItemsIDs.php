<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mainapp";

$conn = new mysqli ($servername, $username, $password , $dbname);

if($conn-> connect_error){
    die ("Connection failed:" .$conn-> connect_error);
}

$sql = "SELECT itemID from useritems where userID =1";
$result = $conn->query($sql);

if ($result->num_rows > 0){
    $rows = array();
    while ($row = $result->fetch_assoc()){
        $rows[] = $row;
    }
    echo json_encode($rows);
}else {
    echo "0 results";
}
$conn -> close();
?>