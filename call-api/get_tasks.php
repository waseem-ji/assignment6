<?php

error_reporting(0);
$url = "http://localhost/Assignment6/api/readapi.php";




$json_tasks = file_get_contents($url);


// Decode JSON data into PHP array
$all_tasks = json_decode($json_tasks);



// All user data exists in 'data' object
$task_data = $all_tasks->data;

//print_r($task_data);


foreach ($task_data as $tasks) {
    $task = $tasks->task;
    $status =  $tasks->status;
    if ($status == 1) {
        echo "<div class='task$tasks->id task-box' > ";
        echo "<div class ='task'>";
        echo "<input type=\"checkbox\"  id='finished" . $tasks->id . "' onclick = 'done($tasks->id)' value='$status' checked> ";
        echo "<span id='task_" . $tasks->id . "' style='text-decoration: line-through' >$tasks->task  </span>";

        // echo "<span>$tasks->status  </span><br>";
        echo "</div>";
        echo "<div class=\"buttons\">";
        echo "<button id='edit" . $tasks->id . "' onclick=\"editTask('$task',$tasks->id)\" class=\"btn btn-edit\" disabled >Edit</button>";
        echo "<button id='delete" . $tasks->id . "' onclick=\"deleteTask($tasks->id)\" class = \"btn btn-delete \"  >Delete</button>";
        echo "</div>";
        echo "</div>";
    } else {
        echo "<div class='task$tasks->id task-box' > ";
        echo "<div class ='task'>";
        echo "<input type=\"checkbox\"  id='finished" . $tasks->id . "' onclick = 'done($tasks->id)' value='$status'> ";
        echo "<span id='task_" . $tasks->id . "' >$tasks->task  </span>";

        // echo "<span>$tasks->status  </span><br>";
        echo "</div>";
        echo "<div class=\"buttons\">";
        echo "<button id='edit" . $tasks->id . "' onclick=\"editTask('$task',$tasks->id)\" class=\"btn btn-edit\"  >Edit</button>";
        echo "<button id='delete" . $tasks->id . "' onclick=\"deleteTask($tasks->id)\" class = \"btn btn-delete \">Delete</button>";
        echo "</div>";
        echo "</div>";
    }
}
