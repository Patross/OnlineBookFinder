<?php
include_once "db.inc.php";
session_start();
if(!isset($_POST['submit'])){
	header("Location: ../index.php");
}
else{
    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);

    // $query = $conn->query("SELECT * FROM onlinebookfinder.users WHERE username='$username' OR email='$username';");
    $data = $conn->prepare("SELECT * FROM onlinebookfinder.users WHERE username='$username' OR email='$username';");
    $data->execute();

    $result = $data->fetch(PDO::FETCH_ASSOC);
    if($count = $data->rowCount() == 1){
        if (password_verify($password,$result['password'])) {
            $_SESSION['u_id'] = $result['id'];
            $_SESSION['u_name'] = $result['username'];
            $_SESSION['u_first'] = $result['firstname'];
            $_SESSION['u_last'] = $result['lastname'];
            $_SESSION['u_email'] = $result['email'];
            header("Location: ../index.php?login=success");
        }
        else{
            header("Location: ../index.php?login=failed");
        }
    }
    else{
        header("Location: ../index.php?login?nomatch");
    }
}
