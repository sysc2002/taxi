<?php
$servername = "localhost";
$username = "testtest12345";
$password = "testtest12345";
$dbname = "test34654";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM test";
$result = $conn->query($sql);

if($result){

    while($row = $result->fetch_assoc()){
        echo "id is ".$row['id']."<br>";
    }
}

//echo "Connected successfully";



?>