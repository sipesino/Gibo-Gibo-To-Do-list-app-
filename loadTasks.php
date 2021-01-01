<?php

$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "ToDoList";
$query = "";

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed : " . $e->getMessage();
}

function loadTask($type)
{
    global $conn;
    switch ($type) {
        case 'Due Today':
            $query = "SELECT * FROM Tasks WHERE DATE(duedate) = CURDATE() AND TIME(duedate) >= CURTIME() AND isFinished = 0";
            break;
        case 'Overdue':
            $query = "SELECT * FROM Tasks WHERE duedate < NOW() AND isFinished = 0";
            break;
        case 'Upcoming':
            $query = "SELECT * FROM Tasks WHERE DATE(duedate) > CURDATE() AND isFinished = 0";
            break;
        case 'No Due':
            $query = "SELECT * FROM Tasks WHERE DATE(duedate) IS NULL AND isFinished = 0";
            break;
        case 'Finished':
            $query = "SELECT * FROM Tasks WHERE isFinished = 1";
            break;
        default:
            return;
    }

    $res = $conn->query($query);

    if ($res) {
        if ($res->rowCount() > 0) {
            echo '<h4>' . $type . '</h4>
                  <ul>';
            while ($task = $res->fetch(PDO::FETCH_ASSOC)) {
                echo '<li class="task">
                    <div class="content">
                        <div class="desc">
                            <p>' . $task['description'] . '</p>';
                if (!$task['duedate'] == null) {
                    $date = strtotime($task['duedate']);
                    $mysqldate = date('M d, Y | g:i A', $date);
                    echo '<span>' . $mysqldate . '</span>';
                }
                echo '</div>
                    <div class="btns" id="' . $task['duedate'] . '">
                        <div class="finEdit" id="' . $task['taskNo'] . '">
                            <button class="finished" name="finished">
                                <i class="far fa-check-square"></i>
                            </button>
                            <button class="edit" name="edit" id="' . $task['description'] . '">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="delete" name="delete">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </li>
        </ul>';
            }
        }
    } else {
        echo "<script>console.log('Invalid query!' );</script>";
    }
}
