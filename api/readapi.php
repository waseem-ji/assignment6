<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');
header('Access-Control-Allow-Method:GET');
header('Access-Control-Allow-Header:Content-Type,Access-Control-Allow-Header,Authorization,X-request-With');

include('function.php');

$request_method = $_SERVER["REQUEST_METHOD"];

if ($request_method == "GET") {
    if (isset($_GET['id']))
    {
        $single_task = getSingleTask($_GET);
        echo $single_task;
    }
    else {
        $all_tasks = getTasks();
        echo $all_tasks;
        return $all_tasks;


        // NOt working
        // // Decode JSON data into PHP array
        // $decoded_tasks = json_decode($all_tasks);

        // // All user data exists in 'data' object
        //  $task_data = $decoded_tasks->data;


        // foreach ($task_data as $tasks) {
        //     $task = $tasks->task;
        //     echo "<div class='task$tasks->id'> ";
        //     echo "<span>$tasks->task  </span>";
        //     echo "<span>$tasks->status  </span><br>";
        //     echo "<button id=\"edit\" onclick=\"editTask('$task',$tasks->id)\">Edit</button>";
        //     echo "<button id=\"delete\" onclick=\"deleteTask($tasks->id)\">Delete</button>";
        //     echo "</div>";
        // }


    }
    
}
else {
    $data = [
        'status' => 405,
        'message' => $request_method . " Request Method not allowed",

    ];
    header("HTTP/1.0 405 Method not allowed");
    echo json_encode($data);
}

?>