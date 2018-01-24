<?php
// if(isset($_SESSION["lastpage"])){
//     header("Location: ".$_SESSION["lastpage"]);
// }
// else{
//     header("location: ../index.php");
// }
// $dbHostname = "onlinebookfinder.mysql.database.windows.net";
// $dbUsername = "onlinebookfinder";
// $dbPassword = "Password1233";
// $dbName = "onlinebookfinder";

// $conn = mysqli_connect(gethostname(),$dbUsername,$dbPassword,$dbName);

try {
    $conn = new PDO("sqlsrv:server = tcp:onlinebookfinder.database.windows.net,1433; Database = onlinebookfinder", "onlinebookfinder", "{Password1233}");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}