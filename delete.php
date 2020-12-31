<?php
require 'db.php';
$id = $_POST['id'];

$query = "DELETE FROM Tasks WHERE taskNo = $id";

if ($conn->query($query)) {
    header("refresh:0; url=index.php?mess=success");
    exit;
} else {
    echo "<script>console.log('Invalid query.' );</script>";
}
