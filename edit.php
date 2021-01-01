<?php
require 'db.php';

if (!$conn) {
    echo 'Cannot connect to server.';
    exit;
}

$description = $_POST['description'];
$id = $_POST['id'];
$query = "";

if (isset($_POST['check'])) {
    $duedate = $_POST['duedate'];
    $datetime = new DateTime($duedate);
    $deadline = $datetime->format('Y-m-d H:i:s');
    $query = "UPDATE Tasks SET description = '$description', duedate = '$deadline' WHERE taskNo = $id";
} else {
    $query = "UPDATE Tasks SET description = '$description' WHERE taskNo = $id";
}

if ($conn->query($query)) {
    echo "<script>console.log('Row Updated' );</script>";
} else {
    echo "<script>console.log('Not Updated' );</script>";
}

header("refresh:0; url=index.php?mess=success");
