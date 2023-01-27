<?php


$url = "http://localhost:8888/Assignment6/api/readapi.php";




$json_tasks = file_get_contents($url);


// Decode JSON data into PHP array
$all_tasks = json_decode($json_tasks);



// All user data exists in 'data' object
$task_data = $all_tasks->data;

//print_r($task_data);


foreach ($task_data as $tasks) {
    $task = $tasks->task;
    echo "<div class='task$tasks->id task-box' > ";
    echo "<div class ='task'>";
        echo "<input type=\"checkbox\"  id='finished".$tasks->id. "' onclick = 'done($tasks->id)'> ";
        echo "<span id='task_".$tasks->id."' >$tasks->task  </span>";

    // echo "<span>$tasks->status  </span><br>";
    echo "</div>";
    echo "<div class=\"buttons\">";
    echo "<button id='edit".$tasks->id."' onclick=\"editTask('$task',$tasks->id)\" class=\"btn btn-edit value='edit' \" >Edit</button>";
    echo "<button id='delete".$tasks->id."' onclick=\"deleteTask($tasks->id)\" class = \"btn btn-delete \">Delete</button>";
    echo "</div>";
    echo "</div>";
}
