<?php
include_once "header.php";
?>


<div>
<form action="includes/signup.inc.php" method="post">

	<input type="text" name="username"  placeholder="username"></br></br>
		<input type="text" name="firstname" placeholder="first name"></br></br>
	<input type="text" name="lastname" placeholder="last name"></br></br>
	<input type="text" name="email" placeholder="email"></br></br>  
	<input type="password" name="password" placeholder="password"></br></br>
		<input type="password" name="confirmPassword" placeholder="confirm password"></br></br> 
	<button type="submit" name="submit" >submit</button>

</form>
</div>


<?php
    include_once "footer.php";
?>