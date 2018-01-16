<?php
include_once "db.inc.php";
if(!isset($_POST['submit'])){

}
else{
    $username = $_POST[];
    $password = $_POST[];

    $query = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' OR email='$username'");
    $result = mysqli_fetch_assoc($query);

    if (password_verify($password,$result['password'])) {
        $_SESSION['currentuser'] = $result['id'];
    }
}