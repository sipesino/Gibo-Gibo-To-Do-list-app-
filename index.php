<?php require 'db.php' ?>
<?php require 'loadTasks.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta http-equiv="refresh" content="60">
    <link rel="stylesheet" href="style.css" />
    <script src="https://kit.fontawesome.com/be44f73e1b.js" crossorigin="anonymous"></script>
    <script src="jquery-3.2.1.min.js"></script>
    <title>Gibo-Gibo</title>
</head>

<body>
    <main>
        <div class="container">
            <div>
                <?php echo loadTask('Due Today'); ?>
            </div>
            <div>
                <?php echo loadTask('Overdue'); ?>
            </div>
            <div>
                <?php echo loadTask('Upcoming'); ?>
            </div>
            <div>
                <?php echo loadTask('No Due'); ?>
            </div>
            <div>
                <?php echo loadTask('Finished'); ?>
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
                    <textarea name="description" id="description" cols="30" rows="10" placeholder="Description" required></textarea>
                    <div class="duedate">
                        <input type="checkbox" name="check" id="check" />
                        <label for="duedate">Due Date</label>
                        <input type="datetime-local" name="duedate" id="duedate" />
                    </div>
                    <input type="submit" value="Add" class="add" />
                    <input type="button" value="Cancel" class="cancel" />
                </form>
            </div>
        </div>
    </main>
    <script type="text/javascript" src="app.js"></script>
</body>

</html>