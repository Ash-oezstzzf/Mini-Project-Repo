<?php

$servername = "localhost"; 
$port = "3308"; 
$username = "root"; 
$password = "root123"; 
$dbname = "test1"; 


$conn = new mysqli($servername, $username, $password, $dbname, $port);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $task = $_POST["task"];
    $deadline = $_POST["deadline"];
    $deadlinedate = $_POST["deadlinedate"];
    $remarks = $_POST["remarks"];

    $sql = "INSERT INTO details (task, deadline, deadlinedate, remarks) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $task, $deadline, $deadlinedate, $remarks);

    if ($stmt->execute() === TRUE) {
        echo "Data stored ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}


$conn->close();
?>
