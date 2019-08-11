<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<header>
		<nav>
			<a href="#">
				<img src="" alt="logo">
			</a>
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
			<div>
				<?php 
					if (isset($_SESSION['userId'])) {
						echo '<form action="includes/logout.inc.php" method="post">
					<button type="submit" name="logout-submit">Logout</button>
				</form>';			
					}
					else{
					echo '<form action="includes/login.inc.php" method="post">
					<input type="text" name="mailuid" placeholder="Username/Email...">
					<input type="password" name="pwd" placeholder="Password...">
					<button type="submit" name="login-submit">Login</button>
				</form>
				<a href="signup.php">Signup</a>';
					}
				 ?>
			</div>
		</nav>
	</header>

</body>
</html>