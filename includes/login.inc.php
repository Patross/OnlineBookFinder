<?php
include_once "db.inc.php";
session_start();
if(!isset($_POST['submit'])){
	header("Location: ../index.php");
}
else{
    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);

    $query = $conn->query("SELECT * FROM users WHERE username='$username' OR email='$username'");
    $result = $conn->fetch($query);

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