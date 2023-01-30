<?php
require "../dbcon.php";
function getTasks()
{
    global $conn;
    $sql = "SELECT * FROM tasks";
    $queryRun = mysqli_query($conn, $sql);

    if ($queryRun) {
        if (mysqli_num_rows($queryRun) > 0) {
            $all_tasks = mysqli_fetch_all($queryRun, MYSQLI_ASSOC);
            $data = [
                'status' => 200,
                'message' => " Retrieved all tasks !",
                'data' => $all_tasks,

            ];
            header("HTTP/1.0 200 Retrieved all tasks !");
            return json_encode($data);
        } else {
            $data = [
                'status' => 404,
                'message' => " No tasks found.",

            ];
            header("HTTP/1.0 404 No tasks found.");
            return json_encode($data);
        }
    } else {
        $data = [
            'status' => 500,
            'message' => " Internal Server Error",

        ];
        header("HTTP/1.0 500 Internal Server Error");
        return json_encode($data);
    }
}

// Error function 
function error422($message)
{
    $data = [
        'status' => 422,
        'message' => "$message",

    ];
    header("HTTP/1.0 422 Unprocessable Entry " . $message);
    echo json_encode($data);
    exit();
}
// Input tasks to database through API
function inputTask($inputData)
{

    global $conn;

    $task = mysqli_real_escape_string($conn, $inputData['task']);
    // $status = mysqli_real_escape_string($conn,$inputData['status']);

    if (empty(trim($task))) {

        return error422("Please enter a tasks");
    }
    // elseif (empty(trim($status))) {

    //     return erro  r422("Please enter a correct status format");

    // }
    else {
        $sql = "INSERT INTO tasks(task) VALUES ('$task')";
        $query_result = mysqli_query($conn, $sql);

        if ($query_result) {
            $data = [
                'status' => 201,
                'message' => " task added succesfully",

            ];
            header("HTTP/1.0 201 Created");
            return json_encode($data);
        } else {
            $data = [
                'status' => 500,
                'message' => " Internal Server Error",

            ];
            header("HTTP/1.0 500 Internal Server Error");
            return json_encode($data);
        }
    }
}

function markTaskAsCompleted($taskIDfromGET) {
    global $conn;
    if (!isset($taskIDfromGET['id'])) {
        return error422("task id not found in url");
    } elseif ($taskIDfromGET['id'] == null) {
        return error422("Enter customer id");
    }

    $taskID = mysqli_real_escape_string($conn, $taskIDfromGET['id']);

    // -------------------------------------------

    $field = 'status';
    
    $result = mysqli_query($conn,"SELECT $field FROM `tasks` WHERE `id` = '$taskID' ");
    $row = mysqli_fetch_array($result);
    $current_status = $row[$field];

    // -------------------------------------------


    // -------------------------------------------
    if ($current_status == 0 ){
        $sql = "UPDATE tasks SET status=1 WHERE id='$taskID' LIMIT 1 ";
        $query_result = mysqli_query($conn, $sql);
    }
    else {
        $sql = "UPDATE tasks SET status=0 WHERE id='$taskID' LIMIT 1 ";
        $query_result = mysqli_query($conn, $sql);
    }
    // -------------------------------------------

}

// Input tasks to database through API
function updateTask($inputData, $taskParam)
{

    global $conn;

    if (!isset($taskParam['id'])) {
        return error422("Customer id not found in url");
    } elseif ($taskParam['id'] == null) {
        return error422("Please enter an id");
    }
    $task_id = mysqli_real_escape_string($conn, $taskParam['id']);
    $task = mysqli_real_escape_string($conn, $inputData['task']);
    // $status = mysqli_real_escape_string($conn,$inputData['status']);

    if (empty(trim($task))) {

        return error422("Please enter a tasks");
    }
    // elseif (empty(trim($status))) {
    //     $status = 0;
    //     // return error422("Please enter a correct status format");

    // }
    else {
        $sql = "UPDATE tasks SET task='$task' WHERE id='$task_id' LIMIT 1 ";
        $query_result = mysqli_query($conn, $sql);

        if ($query_result) {
            $data = [
                'status' => 200,
                'message' => " task updated succesfully",

            ];
            header("HTTP/1.0 200 OK");
            return json_encode($data);
        } else {
            $data = [
                'status' => 500,
                'message' => " Internal Server Error",

            ];
            header("HTTP/1.0 500 Internal Server Error");
            return json_encode($data);
        }
    }
}

// Function to delete Task

function deleteTask($taskParam)
{
    global $conn;

    if (!isset($taskParam['id'])) {
        return error422("task id not found in url");
    } elseif ($taskParam['id'] == null) {
        return error422("Enter task id");
    }

    $task_id = mysqli_real_escape_string($conn, $taskParam['id']);

    $sql = "DELETE FROM tasks WHERE id = '$task_id'";
    $query_result = mysqli_query($conn, $sql);

    if ($query_result) {
        $data = [
            'status' => 200,
            'message' => " Task Deleted Successfully ",

        ];
        header("HTTP/1.0 200 OK");
        return json_encode($data);
    } else {
        $data = [
            'status' => 404,
            'message' => " No task found",

        ];
        header("HTTP/1.0 404 Not Found");
        return json_encode($data);
    }
}
