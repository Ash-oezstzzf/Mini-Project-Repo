<?php

$servername = "localhost"; 
$port = "3308"; 
$username = "root"; 
$password = "root123"; 
$dbname = "database"; 


$conn = new mysqli($servername, $username, $password, $dbname, $port);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $cardnumber = $_POST["cardnumber"];
    $contactnumber = $_POST["contactnumber"];
    $pin = $_POST["pin"];
    $date = $_POST["date"];

    $sql = "INSERT INTO register (cardnumber, contactnumber, pin, date) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $cardnumber, $contactnumber, $pin, $date);

    if ($stmt->execute() === TRUE) {
        echo "Welcome To UT Bank";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}


$conn->close();
?>
