<?php
require 'db.php';
$id = $_POST['id'];

$query = "SELECT isFinished FROM Tasks WHERE taskNo = $id LIMIT 1";


$result = $conn->query($query);
$c;
if ($result) {
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $c = $row["isFinished"];
            if ($c == 0) {
                $query = "UPDATE Tasks SET isFinished = 1 WHERE taskNo = $id";
            } else {
                $query = "UPDATE Tasks SET isFinished = 0 WHERE taskNo = $id";
            }
            if ($conn->query($query)) {
                header("refresh:0; url=index.php?mess=success");
                exit;
            } else {
                echo "<script>console.log('Invalid query.' );</script>";
                exit;
            }
        }
    }
}
