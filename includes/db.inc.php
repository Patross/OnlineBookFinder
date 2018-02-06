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
$dbHostname = $_SESSION["dbHostname"] = "localhost";
// $dbUsername = $_SESSION["dbUsername"] = "id4484729_onlinebookfinder";
// $dbPassword = $_SESSION["dbPassword"] = "onlinebookfinder";
// $dbName = $_SESSION["dbName"] = "id4484729_onlinebookfinder";

$dbUsername = $_SESSION["dbUsername"] = "root";
$dbPassword = $_SESSION["dbPassword"] = "";
$dbName = $_SESSION["dbName"]= "onlinebookfinder";
// $conn = mysqli_connect(gethostname(),$dbUsername,$dbPassword,$dbName);

try {
    // $conn = new PDO("sqlsrv:server = tcp:onlinebookfinder.database.windows.net,1433; Database = onlinebookfinder", "onlinebookfinder", "{Password1233}",array(PDO::MYSQL_ATTR_FOUND_ROWS => true));
    $conn = new PDO("mysql:server = $dbHostname; Database = $dbName", "$dbUsername", "$dbPassword");
    //  $conn = new PDO("mysql:server = localhost; Database = onlinebookfinder","root","");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}