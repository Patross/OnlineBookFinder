<?php
include_once "db.inc.php";
session_start();
if(isset($_POST['submit'])){
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $confirmPassword = htmlspecialchars($_POST['confirmPassword']);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    //GOOGLE RE-CAPTCHA
    if(isset($_POST['g-recaptcha-response'])){
          $captcha = $_POST['g-recaptcha-response'];
    }
    if(!$captcha){
        header("Location: ../register.php?signup=captcha");
        exit;
    }
    $secretKey = "6LelckQUAAAAAPfy6brcZLrD-pwwTS3nbadqm6fL";
    $ip = $_SERVER['REMOTE_ADDR'];
    $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    ); 
    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip,
    false, stream_context_create($arrContextOptions));

    $responseKeys = json_decode($response,true);
    if(intval($responseKeys["success"]) !== 1) {
        echo '<h2>You are spammer. Your ip has been blocked. if you believe this is an error, contact the webmaster.';
       die(); exit();
    } 
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
               elseif (strtolower($username)=="admin") {
                   header("Location: ../register.php?signup=admin");
               }
            else{
                //HASH PASSWORD
                $passwordHashed = password_hash($password,PASSWORD_DEFAULT);


                //CHECK IF USERNAME EXISTS ALREADY
                $query = $conn->query("SELECT * FROM $dbName.users WHERE username='$username' OR email='$email';");
                // $query = $conn->query("SELECT * FROM onlinebookfinder.users WHERE username='$username' OR email='$email';");
                if($query->rowCount() == 1)
                {
                    header("Location: ../register.php?signup=taken");
                }
                else
                {
                    $query = $conn->query("INSERT INTO $dbName.users(firstname,lastname,username,email,password) VALUES('$firstname','$lastname','$username','$email','$passwordHashed');");
                    // $query = $conn->query("INSERT INTO onlinebookfinder.users(firstname,lastname,username,email,password) VALUES('$firstname','$lastname','$username','$email','$passwordHashed');");
                    
                    //Login the user
                    $query = $conn->query("SELECT * FROM $dbName.users WHERE username='$username' OR email='$username';");
                    // $query = $conn->query("SELECT * FROM onlinebookfinder.users WHERE username='$username' OR email='$username';");
                    $result = $query->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['u_id'] = $result['id'];
                    $_SESSION['u_name'] = $result['username'];
                    $_SESSION['u_first'] = $result['firstname'];
                    $_SESSION['u_last'] = $result['lastname'];
                    $_SESSION['u_email'] = $result['email'];


                    $to      = $result["email"];
                    $subject = "Thank you for registering with us!";
                    $message = "Thank you for creating an account with online bookfinder.\n
If you have any question, please contact us using the contact form included on the website. ";
                    $headers = "From: no-reply@onlinebookfinder.com";
                    mail($to, $subject, $message,$headers);

                    header("Location: ../index.php?signup=success");
                }
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