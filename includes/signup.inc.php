<?php

if(isset($_POST['submit'])){
    $firstName = $_POST[];
    $lastName = $_POST[];
    $username = $_POST[];
    $email = $_POST[];
    $password = $_POST[];
    $confirmPassword = $_POST[];
    if (empty($firstName || empty($lastName) || empty($username) || empty($email) || empty($password) empty($confirmPassword) {
        header("Location: index.php?signup=empty");
    }
    else {
        //Everything filled out.
        
    }
}
else{
    header("Location: index.php?signup=error");
}