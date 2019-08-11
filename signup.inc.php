<?php 
if (isset($_POST['signup-submit'])) {

	require 'dbh.inc.php';

	$name = $_POST['name'];
	$rollNo = $_POST['rno'];
	$email = $_POST['mail'];
	$branch = $_POST['branch'];
	$year = $_POST['year'];
	$gender = $_POST['gender'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];

	// ERROR HANDLERS
	if (empty($name) || empty($rollNo) || empty($email) || empty($branch) || empty($year) || empty($gender) || empty($password) || empty($passwordRepeat)) {
		header("Location: ../signup.php?error=emptyfields&rno=".$rollNo."&mail=".$email);
		exit();		# Empty field(s) error handler
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[0-9]*$/", $rollNo)) {
		header("Location: ../signup.php?error=invalidmail&rno=");
		exit();      # invalid email and rno error handler
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: ../signup.php?error=invalidmail&rno=".$rollNo);
		exit();      # invalid email error handler
	}

	else if (!preg_match("/^[0-9]*$/", $rollNo)){
		header("Location: ../signup.php?error=invaliduid&mail=".$email);
		exit();       # invalid rno error handler
	}
	else if ($password !== $passwordRepeat) {
		header("Location: ../signup.php?error=passwordcheck&rno=".$rollNo."&mail=".$email);  # password and repeat password not same error handler
	}
	else {
		$sql = "SELECT studentRollNo FROM festregistrations WHERE studentRollNo=?";    # checks if rno already exists
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../signup.php?error=sqlerror"); 	
			exit();
			# code...
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $rollNo, );    #s=string i=integer b=blob
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if($resultCheck > 0){
				header("Location: ../signup.php?error=rnotaken&mail=".$email);
				exit(); 
			}
			else{
				$sql = "INSERT INTO festregistrations (studentName, studentRollNo, studentEmailID, studentBranch, studentYear, studentPassword, gender) VALUES (?, ?, ?, ?, ?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {							
					header("Location: ../signup.php?error=sqlerror");		#error in inserting in sql check col name
					exit();					
				}
				else{
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);


					mysqli_stmt_bind_param($stmt, "sssssss", $name, $rollNo, $email, $branch, $year, $hashedPwd, $gender);
					mysqli_stmt_execute($stmt);
					header("Location: ../signup.php?signup=success");
					exit();
				}
			}
		}

	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{
	header("Location: ../signup.php");
}




