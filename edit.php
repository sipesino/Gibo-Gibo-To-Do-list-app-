<?php
require 'db.php';

$id = $_POST['id'];
$description = $_POST['description'];
$duedate = $_POST['duedate'];

$query = "UPDATE Tasks SET description = $description, duedate = $duedate WHERE taskNo = $id";

if ($conn->query($query)) {
    header("refresh:0; url=index.php?mess=success");
    exit;
} else {
    echo "<script>console.log('Invalid query.' );</script>";
}
