<?php
include_once "header.php";
?>


<div>
<form id="register" action="includes/signup.inc.php" method="post">

	<input type="text" name="username"  placeholder="username"></br></br>
		<input type="text" name="firstname" placeholder="first name"></br></br>
	<input type="text" name="lastname" placeholder="last name"></br></br>
	<input type="text" name="email" placeholder="email"></br></br>  
	<input type="password" name="password" placeholder="password"></br></br>
		<input type="password" name="confirmPassword" placeholder="confirm password"></br></br> 

	<div class="g-recaptcha" data-sitekey="6LelckQUAAAAAOEkeZHXgD2Gb_LSAHDpMbS3s1Qf"
	style="transform:scale(0.7);transform-origin:0 0;"></div>
	<button type="submit" name="submit" >submit</button>
</form>
</div>


<?php
    include_once "footer.php";
?>