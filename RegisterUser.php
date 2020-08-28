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

$sql = "SELECT user_name from users where user_name ='".$loginUser."'";
$result = $conn-> query($sql);
if ($result->num_rows > 0){
    //output data of each row

    echo "Username is already taken";
}
else{
echo "Username does not exist";
    $sql = "INSERT INTO users (user_name , password) VALUES ('".$loginUser."', '".$loginPass."')";

    if ($conn->query($sql) === TRUE){
        echo "Ner records saved successfully";
    }else {
        echo "Error:" .$sql. "<br>" .$conn->error;
    }
}
$conn-> close();


?>