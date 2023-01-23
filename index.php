<?php
$servername = "localhost";
$username = "root";
$password = "waseemji4217";
$database = "todoApp";

$conn = new mysqli($servername, $username, $password, $database);
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
//   } 
//   echo "Connected successfully";
$task = "";
$status = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST["task"];
    if (isset($_POST["status"])) {
        $status = $_POST["status"];
    }

    echo "entered task is $task";
    echo "current status is $status";

    $sql = "INSERT INTO tasks SET task='$task', status='$status' ";
    $query_result = $conn->query($sql);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo</title>
</head>

<body>
    <h1>ToDo app</h1>
    <p>What would you like to do &nbsp; ToDaY ?</p>
    <?php
    $sql_getTasks = "SELECT * FROM tasks ;";
    $tasks = $conn->query($sql_getTasks);
    if (!$tasks) {
        die("Invalid query: " . $conn->error);
    }
    while ($row = $tasks->fetch_assoc()) {
        echo "$row[id] &nbsp";
        echo "$row[task] &nbsp";
        echo "$row[status] &nbsp";
        echo "<br>";
    }
    ?>

    <button>Add</button>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="task"> Enter Taks</label>
        <input type="text" id="task" name="task">
        <input type="checkbox" value="1" name="status"> Completed

        <input type="submit" value="ADD TAsk">

    </form>
</body>

</html>