<?php
require 'db.php';

if (!$conn) {
    echo 'Cannot connect to server.';
    exit;
}

$description = $_POST['description'];

if (isset($_POST['check'])) {
    $duedate = $_POST['duedate'];
    $datetime = new DateTime($duedate);
    $deadline = $datetime->format('Y-m-d H-i-s');
    $query = "INSERT INTO Tasks (description, duedate) VALUES ('$description', '$deadline')";
} else {
    $query = "INSERT INTO Tasks (description) VALUES ('$description')";
}

if ($conn->query($query)) {
    echo "<script>console.log('Inserted' );</script>";
} else {
    echo "<script>console.log('Not Inserted' );</script>";
}

header("refresh:0; url=index.php?mess=success");
