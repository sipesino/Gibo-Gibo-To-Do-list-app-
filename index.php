<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://kit.fontawesome.com/be44f73e1b.js" crossorigin="anonymous"></script>
    <title>Gibo-Gibo</title>
</head>

<body>
    <header>
        <h1 id="title"><a href="#">gibo</a></h1>
        <p class="totalTasks">0</p>
        <h5>tasks</h5>
    </header>
    <main>
        <button class="addBtn">+</button>
        <div class="container">
            <div class="dueToday">
                <h4>Due Today</h4>
                <ul>
                    <li class="task">
                        <div class="content">
                            <div class="desc">
                                <p>aksdjhaskjdhaksjdhkajshdk</p>
                            </div>
                            <div class="btns">
                                <button id="finished">
                                    <i class="far fa-check-square"></i>
                                </button>
                                <button id="delete">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="Overdue">
                <h4>Overdue</h4>
                <ul></ul>
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
        <div class="bg-modal">
            <div class="modal-content">
                <h4>Add Task</h4>
                <form method="POST" action="db.php">
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