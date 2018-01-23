<?php
if(isset($_SESSION["lastpage"])){
    header("Location: ".$_SESSION["lastpage"]);
}
else{
    header("location: ../index.php");
}
$dbHostname = "tcp:onlinebookfinder.database.windows.net";
$dbUsername = "onlinebookfinder";
$dbPassword = "Password1233";
$dbName = "onlinebookfinder";

$conn = mysqli_connect($dbHostname,$dbUsername,$dbPassword,$dbName);