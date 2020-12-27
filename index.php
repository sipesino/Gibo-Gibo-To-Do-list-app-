<?php require 'db.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta http-equiv="refresh" content="60">
    <link rel="stylesheet" href="style.css" />
    <script src="https://kit.fontawesome.com/be44f73e1b.js" crossorigin="anonymous"></script>
    <title>Gibo-Gibo</title>
</head>

<body>
    <main>
        <div class="container">
            <div class="dueToday">
                <h4>Due Today</h4>
                <?php $dueToday = $conn->query("SELECT * FROM Tasks WHERE DATE(duedate) = CURDATE() AND TIME(duedate) >= CURTIME() "); ?>
                <?php if ($dueToday->rowCount() <= 0) { ?>
                    <div>
                        <p class="empty">Empty</p>
                    </div>
                <?php } ?>
                <ul>
                    <?php while ($task = $dueToday->fetch(PDO::FETCH_ASSOC)) { ?>
                        <li class="task">
                            <div class="content">
                                <div class="desc">
                                    <?php echo '<p>' . $task['description'] . '</p>' ?>
                                    <?php
                                    if (!$task['duedate'] == null) {
                                        $date = strtotime($task['duedate']);
                                        $mysqldate = date('M d, Y | g:i A', $date);
                                        echo '<span>' . $mysqldate . '</span>';
                                    }
                                    ?>
                                </div>
                                <div class="btns">
                                    <div class="finEdit">
                                        <button id="finished">
                                            <i class="far fa-check-square"></i>
                                        </button>
                                        <button id="edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </div>
                                    <div class="del">
                                        <button id="delete">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="Overdue">
                <h4>Overdue</h4>
                <ul>
                    <?php $overdue = $conn->query("SELECT * FROM Tasks WHERE duedate < CURDATE() AND isFinished = 0"); ?>
                    <?php while ($task = $overdue->fetch(PDO::FETCH_ASSOC)) { ?>
                        <li class="task">
                            <div class="content">
                                <div class="desc">
                                    <?php echo '<p>' . $task['description'] . '</p>' ?>
                                    <?php
                                    if (!$task['duedate'] == null) {
                                        $date = strtotime($task['duedate']);
                                        $mysqldate = date('M d, Y | g:i A', $date);
                                        echo '<span>' . $mysqldate . '</span>';
                                    }
                                    ?>
                                </div>
                                <div class="btns">
                                    <div class="finEdit">
                                        <button id="finished">
                                            <i class="far fa-check-square"></i>
                                        </button>
                                        <button id="edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </div>
                                    <div class="del">
                                        <button id="delete">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="Upcoming">
                <h4>Upcoming</h4>
                <ul></ul>
            </div>
            <div class="noDue">
                <h4>No Due</h4>
                <ul></ul>
            </div>
        </div>
        <div class="header">
            <?php $tasks = $conn->query("SELECT * FROM Tasks"); ?>
            <h1 id="title"><a href="#">gibo</a></h1>
            <p class="totalTasks"><?php echo $tasks->rowCount() ?></p>
            <h5>tasks</h5>
            <button class="addBtn">+</button>
        </div>
        <div class="bg-modal">
            <div class="modal-content">
                <h4>Add Task</h4>
                <form method="POST" action="newTask.php" autocomplete="off">
                    <div class="duedate">
                        <input type="checkbox" name="check" id="check" />
                        <label for="duedate">Due Date</label>
                        <input type="datetime-local" name="duedate" id="duedate" />
                    </div>
                    <textarea name="description" id="description" cols="30" rows="10" placeholder="Description" required></textarea>
                    <input type="submit" value="Add" class="add" />
                    <input type="button" value="Cancel" class="cancel" />
                </form>
            </div>
        </div>
    </main>
    <script src="./app.js"></script>
</body>

</html>