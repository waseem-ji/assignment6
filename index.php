<?php
require 'dbcon.php';
$task = "";
$status = 0;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="js/script.js"> </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>

<body >
    <div class="container">
        <div class="titlebar">
            <h1>ToDo APP</h1>
            <p>What would you like to do &nbsp; ToDaY ?</p>
        </div>
        <?php
        // $sql_getTasks = "SELECT * FROM tasks ;";
        // $tasks = $conn->query($sql_getTasks);
        // if (!$tasks) {
        //     die("Invalid query: " . $conn->error);
        // }
        // while ($row = $tasks->fetch_assoc()) {
        //     echo "$row[id] &nbsp";
        //     echo "$row[task] &nbsp";
        //     echo "$row[status] &nbsp";
        //     echo "<br>";
        // }
        ?>
        <div id="current_tasks">
           
        </div>
        <div class="container">
            <div class="input">
                <!-- <label for="task" class="label-task"> Enter Taks</label> -->
                <input type="text" id="task" class = "task-input" name="task" placeholder="enter task">
                <!-- <input type="checkbox"  name="status" id="status"> Completed -->
        
                <button id= "addtask" class="add-btn add-btn--primary add-btn--inside" onclick="addTask()"> Add Task</button>
            </div>

            <!-- <input type="submit" value="ADD TAsk" onclick="addTask()"> Call add  task api! -->

        </div>
        <!-- Show current tasks -->
        <!-- <form action="#" method="post"> -->
    <!-- ajax form -->
        <!-- </form> -->

    </div>

</body>

</html>

