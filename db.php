<?php
$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "ToDoList";

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<script>console.log('Connected Successfully' );</script>";
} catch (PDOException $e) {
    echo "<script>console.log('Connection failed : " . $e->getMessage() . ')';
}
