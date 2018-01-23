     <?php
        session_start();
        if(basename($_SERVER["PHP_SELF"]) == "header.php"){
            header("Location: index.php");
        }
        $_SESSION['lastpage'] = $_SERVER["HTTP_HOST"].$_SERVER['PHP_SELF'];
    ?>