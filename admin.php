<?php
include "header.php";
?>

<form action="admin.php" method="post">
    <input type="text" placeholder="subject" name="subject">
    <textarea type="text" placeholder="message" name="message"></textarea>
    <input type="text" placeholder="your email" name="email">
    <input type="submit" value="submit" name="submit">
</form>
<?php
?>


<?php
include "footer.php";
?>