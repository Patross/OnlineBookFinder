<?php

if(isset($_POST['submit'])){
    $firstName = htmlentities(mysql_real_escape_string($_POST[]));
    $lastName = htmlentities(mysql_real_escape_string($_POST[]));
    $username = htmlentities(mysql_real_escape_string($_POST[]));
    $email = htmlentities(mysql_real_escape_string($_POST[]));
    $password =htmlentities( mysql_real_escape_string($_POST[]));
    $confirmPassword = htmlentities(mysql_real_escape_string($_POST[]));



    if (empty($firstName || empty($lastName) || empty($username) || empty($email) || empty($password) empty($confirmPassword) {
        header("Location: ../index.php?signup=empty");
    }
    else {
        //Everything filled out.
        if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
          //Email is valid too.
          if ($password == $confirmPassword) {
              //Passwords Match.

              if(1 === preg_match('~[0-9]~', $firstName) || 1===preg_match('~[0-9]~',$lastName)){
                  header("Location: ../index.php?signup=number");
              }
              else{
                  $query = mysqli_query()
              }
          }
          else{
              header("Location: ../index.php?signup=password");
          }

        }
        else{
            header("Location: ../index.php?signup=email");
        }
    }
}
else{
    header("Location: ../index.php?signup=error");
}