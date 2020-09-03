<?php

$servername = "localhost";
$username ="root";
$password = "";
$dbname = "mainapp";

//variables submmitted by user
$loginUser = $_POST["loginUser"];
$loginPass = $_POST["loginPass"];

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error){
    die ("Connection failed: ". $conn->connect_error);
}

$sql = "SELECT password, user_id from users where user_name ='".$loginUser."'";
$result = $conn-> query($sql);
if ($result->num_rows > 0){
    //output data of each row
    while ($row = $result-> fetch_assoc()){
        if ($row["password"] == $loginPass){
            echo $row["user_id"];
        }else {
            echo "Wrong credentials";
        }
    }
}else {
    echo "user does not exist";
}



?>