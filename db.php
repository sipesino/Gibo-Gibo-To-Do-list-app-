<?php
$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "ToDoList";

try {
    $conn = new PDO("mysql:host = $serverName;db_name = $dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'connected!';
} catch (PDOException $e) {
    echo "Connection failed : " . $e->getMessage();
}


if (!$conn) {
    echo 'Cannot connect to server.';
    exit;
}

$description = mysqli_real_escape_string($conn, $_POST['description']);

if (isset($_POST['check'])) {
    $duedate = $_POST['duedate'];
    $datetime = new DateTime($duedate);
    $deadline = $datetime->format('Y-m-d H-i-s');
    $query = "INSERT INTO Tasks (description, duedate) VALUES ('$description', '$deadline')";
} else {
    $query = "INSERT INTO Tasks (description) VALUES ('$description')";
}

if (!mysqli_query($conn, $query)) {
    echo "<script>console.log('Not Inserted' );</script>";
} else {
    echo "<script>console.log('Inserted' );</script>";
}

mysqli_close($conn);

header("refresh:0; url=index.html");
