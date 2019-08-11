<?php 
require "header.php"; ?>

<main>
	<h1>SignUp</h1>
	<!-- <?php 
		if (isset($_GET['error'])) {
			if ($_GET['error'] == "emptyfields") {
				echo '<p class="signuperror">Fill in all fields!</p>';
			}
			else if ($_GET['error'] == "invalidmail&uid") {
				echo '<p class="signuperror">Invalid username and e-mail!</p>';
			}
			else if ($_GET['error'] == "invaliduid") {
				echo '<p class="signuperror">Invalid username !</p>';
			}
			else if ($_GET['error'] == "invalidmail") {
				echo '<p class="signuperror">Invalid e-mail!</p>';
			}
			else if ($_GET['error'] == "passwordcheck") {
				echo '<p class="signuperror">Your passwords do not match!</p>';
			}
			else if ($_GET['error'] == "usertaken") {
				echo '<p class="signuperror">Username is already taken!</p>';
			}
		}
		 else if ($_GET['signup'] == "success") {
			 echo '<p class="signupsuccess">SignUp Successfully!</p>';
		// }
	 ?> -->
	<form action="includes/signup.inc.php" method="post">
		<input type="text" name="name" placeholder="Full Name">
		<input type="text" name="rno" placeholder="Roll No">
		<input type="text" name="mail" placeholder="E-mail">
		<input list="branch" name="branch" placeholder="Branch">
		  <datalist id="branch">
		    <option value="Comps">
		    <option value="IT">
		    <option value="EXTC">
		    <option value="Electrical">
		    <option value="Mechanical">
		  </datalist>
		  <input list="year" name="year" placeholder="Year">
		  <datalist id="year">
		    <option value="1">
		    <option value="2">
		    <option value="3">
		    <option value="4">
		  </datalist>
		  <input list="gender" name="gender" placeholder="Gender">
		  <datalist id="gender">
		    <option value="Male">
		    <option value="Female">
		    <option value="Other">
		  </datalist>
		<input type="password" name="pwd" placeholder="Password">
		<input type="password" name="pwd-repeat" placeholder="Repeat Password">
		<button type="submit" name="signup-submit">SignUp</button>		
	</form>
</main>

<?php 
require "footer.php"; ?>
