<?php


header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');
header('Access-Control-Allow-Method:DELETE');
header('Access-Control-Allow-Header:Content-Type,Access-Control-Allow-Header,Authorization,X-request-With');

include('function.php');

$request_method = $_SERVER["REQUEST_METHOD"];

if ($request_method == "DELETE") {

    
    $delete_task = deleteTask($_GET);
    echo $delete_task;

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
