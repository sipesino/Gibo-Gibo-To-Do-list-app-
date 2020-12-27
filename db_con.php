<?php
$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "ToDoList";

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'connected!';
} catch (PDOException $e) {
    echo "Connection failed : " . $e->getMessage();
}
