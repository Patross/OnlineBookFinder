<?php
include_once "db.inc.php";

if(isset($_POST['submit'])){
    $firstname = htmlentities($_POST['firstname']);
    $lastname = htmlentities($_POST['lastname']);
    $username = htmlentities($_POST['username']);
    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['password']);
    $confirmPassword = htmlentities($_POST['confirmPassword']);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

if (empty($firstname || empty($lastname) || empty($username) || empty($email) || empty($password) || empty($confirmPassword))) {
        header("Location: ../register.php?signup=empty");
    }       
    else {
        //Everything filled out.
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          //Email is valid too.
          $email = strtolower($email);
          if ($password == $confirmPassword) {
            //Passwords Match.
            if(1 === preg_match('~[0-9]~', $firstname) || 1===preg_match('~[0-9]~',$lastname)){
                header("Location: ../register.php?signup=invalidchar");
            }
            //   elseif (strtolower($username)=="admin") {
            //       header("Location: ../register.php?signup=admin");
            //   }
            else{

                //HASH PASSWORD
                $passwordHashed = password_hash($password,PASSWORD_DEFAULT);
                // $query = $conn->query("INSERT INTO id4484729_onlinebookfinder.users(firstname,lastname,username,email,password) VALUES('$firstname','$lastname','$username','$email','$passwordHashed');");
              $query = $conn->query("INSERT INTO onlinebookfinder.users(firstname,lastname,username,email,password) VALUES('$firstname','$lastname','$username','$email','$passwordHashed');");
                    header("Location: ../index.php?signup=success");
            }
          }
          else{
              header("Location: ../register.php?signup=password");
          }

        }
        else{
            header("Location: ../register.php?signup=email");
        }
    }
}
else{
    header("Location: ../register.php");
}
?>