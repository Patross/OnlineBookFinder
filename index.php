    <?php 
        session_start();
        $_SESSION['lastpage'] = $_SERVER['PHP_SELF'];
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
        ?>
<?php

include "includes/logout.inc.php";

?>
    </body>
</html>