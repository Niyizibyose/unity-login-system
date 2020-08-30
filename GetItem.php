<?php

$servername = "localhost";
$username ="root";
$password = "";
$dbname = "mainapp";

//variables submmitted by user
//$loginUser = $_POST["loginUser"];
//$loginPass = $_POST["loginPass"];
$itemID = $_POST["itemID"];
//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error){
    die ("Connection failed: ". $conn->connect_error);
}

$sql = "SELECT name, description, price from items where ID = '".$itemID ."'";
$result = $conn-> query($sql);

if ($result->num_rows > 0){
    $rows = array();
    while ($row = $result->fetch_assoc()){
        $rows[] = $row;
    }
    echo json_encode($rows);
}else {
    echo "0 results";
}
$conn-> close();
?>