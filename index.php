<?php
include_once "header.php";
include_once "includes/db.inc.php";
?>
 <html>
    <head>
    <title>Online Book-Finder</title>
        <link rel="stylesheet" href="Styles/styles.css">
    </head>

    <body>
        <div id="header">Welcome to Online Book Finder!</div>

        <?php
        if (isset($_SESSION['u_name'])){
            echo "<b><span style=color:black>logged in as ".$_SESSION['u_name']."</span></b>";
            }
            echo gethostbyaddr();
            echo "\n";
            echo gethostname();
        ?>
<?php

if(isset($_SESSION['u_name'])){
    include "includes/logout.inc.php";
}

?>
    </body>
</html>
