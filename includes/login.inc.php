<?php
include_once "db.inc.php";
session_start();
if(!isset($_POST['submit'])){
	header('Location: ../'.basename($_SERVER["PHP_SELF"]));
}
else{
    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);

    //  $query = $conn->query("SELECT * FROM onlinebookfinder.users WHERE username='$username' OR email='$username';");
   $query = $conn->query("SELECT * FROM $dbName.users WHERE username='$username' OR email='$username';");

    $result = $query->fetch(PDO::FETCH_ASSOC);
    if($count = $query->rowCount() == 1){
        if (password_verify($password,$result['password'])) {
            $_SESSION['u_id'] = $result['id'];
            $_SESSION['u_name'] = $result['username'];
            $_SESSION['u_first'] = $result['firstname'];
            $_SESSION['u_last'] = $result['lastname'];
            $_SESSION['u_email'] = $result['email'];

            if(basename($_SESSION["lastpage"])=="register.php"){
                header("Location: ../index.php?login=success");
            }
            else{
            header('Location: ../'.basename($_SESSION["lastpage"]).'?login=success');
            }
        }
        else{
            header('Location: ../'.basename($_SESSION["lastpage"]).'?login=password');
        }
    }
    else{
        header('Location: ../'.basename($_SESSION["lastpage"]).'?login=nomatch');
    }
}
