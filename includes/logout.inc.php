
<?php
echo
'
    <form action='.$_SERVER["PHP_SELF"].' method="post">
    <button type="submit" name="submit">Logout</button>
    </form>
';
?>

<?php
if(isset($_POST['submit']))
{
    session_start();
    session_unset();
    session_destroy();
    header("Location: ".$_SERVER['PHP_SELF']);
}


?>