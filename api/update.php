<?php


header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');
header('Access-Control-Allow-Method:PUT');
header('Access-Control-Allow-Header:Content-Type,Access-Control-Allow-Header,Authorization,X-request-With');

include('function.php');

$request_method = $_SERVER["REQUEST_METHOD"];

if ($request_method == "PUT") {

    $inputData = json_decode(file_get_contents('php://input'),true);
    // if (empty($inputData)) {
    //     // echo $_POST['name'];
    //     $updated_task = updateTask($_POST,$_GET);
    // }
    // else {

    $updated_task = updateTask($inputData,$_GET);
    // }

    echo $updated_task;

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
