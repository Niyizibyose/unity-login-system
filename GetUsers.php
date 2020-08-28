<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mainapp";

//create connection

$conn = new mysqli ($servername , $username , $password , $dbname);

if ($conn ->connect_error){
    die ("Connection failed:". $conn -> connect_error);
}
echo "Connected successfully";

$sql = "SELECT user_name from users";

$result = $conn-> query($sql);

if ($result -> num_rows > 0){
    while ($row = $result -> fetch_assoc()){
        echo "Username: " . $row["user_name"]. "<br>";

    }

}else {
    echo "0 results";
}

$conn-> close();
?>