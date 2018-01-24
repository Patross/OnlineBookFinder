     <?php
        session_start();
              include_once "includes/db.inc.php";
        $_SESSION['lastpage'] = $_SERVER["HTTP_HOST"].$_SERVER['PHP_SELF'];
    ?>