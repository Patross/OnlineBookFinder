<?php
 session_start();
 include_once "includes/db.inc.php";
 $_SESSION["lastpage"] = basename($_SERVER["PHP_SELF"]);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- <meta name="description" content=""> -->
        <!-- <meta name="keywords" content=""> -->
        <!-- <meta name="author" content=""> -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Online Book Finder</title>
        <link rel="icon" href="img/LogoV2.ico">
        <link rel="stylesheet" href="Styles/nav.css">
        <link rel="stylesheet" href="Styles/styles.css">
        <link rel="stylesheet" href="Styles/footer.css">

        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
        <header>
            <nav id="main-wrapper">
                <div id="main-navigation">
                    <ul>
                      	<li id="logo">
                          <img src="img/LogoV2.svg" alt="Book finder logo">
                        </li>
                        <li>
                            <?php
                            if (isset($_SESSION['u_name'])){
                                echo "<b><span style=color:black>Hello, ".$_SESSION['u_name']."</span></b>";
                            }
                            ?>
                        </li>
                        <li>
                        <?php
                        if(!isset($_SESSION["u_name"]))
                        {
                            echo '
                            <form action="includes/login.inc.php" method="POST">
                                <input class="login-input" type="text" name="username" placeholder="Username">
                                <input class="login-input" type="password" name="password" placeholder="Password">
                                <button type="submit" name="submit" id="loginbtb">Login</button>
                            </form>
                                ';
                        }
                        else
                        {
                            echo'
                            <form action="includes/logout.inc.php" method="post">
                                <button type="submit" name="submit" id="loginbtb">Logout</button>
                            </form>
                            ';
                        }
                        ?>
                    </li>
                    <?php
                    if(isset($_SESSION["u_name"])){
                        //links available to normal users except registration, since at this point they're logged in
                        echo '<li><a href="index.php">Home</a></li>';

                            if(($_SESSION["u_name"] == "Admin")){
                                //normal + admin only links
                                echo '<li><a href="admin.php">Admin</a></li>';
                        }
                    }
                    else{
                        //every link except admin
                        echo '<li><a href="index.php">Home</a></li>
                              <li><a href="register.php">Register</a></li>
                              ';
                    }
                    ?>
                    </ul>
                </div>
            </nav>
        </header>