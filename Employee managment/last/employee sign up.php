<?php session_start(); ?>

 <?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Employees Sign Up</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styling.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
		<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="well text-center">
				<div class="header">
					
					<div class="row">
						<div class="col-md-2">
							<a href="index.html">
								<img src="images/logo1.png" style="height: 130px; width: 130px; margin:auto">
							</a>
						</div>
						<div class="col-md-10">
							<ul>
							  <li><a href="index.php">Home</a></li>
							  <li><a href="employee sign up.php" class="active">Employee Sign Up</a></li>
							  <li><a href="employee sign in.php">Employee Login</a></li>
							  <li><a href="manager sign in.php">Manager Login</a></li>
							</ul>
						</div>
					</div>
					<hr>
					<div class="well text-center">
						<img src="images/logo1.png" style="height: 130px; width: 130px;">
						
						<h1>Employees Sign Up</h1>
						<hr>
						<p>
						<?php 
							include("connect.php");
							if(isset($_POST['Sign-up'])) {
								$firstname = test_input($_POST['firstname']);
								$lastname = test_input($_POST['lastname']);
								$job_title = test_input($_POST['job_title']);
								$emp_number = test_input($_POST['emp_number']);
								$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

								$sql = "SELECT * FROM employee WHERE emp_number='$emp_number'";
								$result = mysqli_query($connection, $sql);
								$count = mysqli_num_rows($result);
								if($count ==1) {
									echo '<div class="alert alert-danger" role="alert">The employee idenification number is already found into database</div>';
										echo '<META HTTP-EQUIV="Refresh" Content="2; URL=employee sign up.php">'; 
								} else {
									$sql = "INSERT INTO employee VALUES(NULL,'$emp_number','$firstname', '$lastname', '$job_title', '$password')";

									$result = mysqli_query($connection, $sql);
									if($result) {
										$_SESSION['firstname'] = $firstname;
										$_SESSION['lastname'] = $lastname;
										$_SESSION['employee_ID'] = $emp_number;
                                                                                $_SESSION['emp_number'] =  $emp_number;
										$_SESSION['job_title'] = $job_title;

										echo '<div class="alert alert-success" role="alert">Sign up Successfully</div>';
										echo '<META HTTP-EQUIV="Refresh" Content="2; URL=employee home page.php">'; 
									}
								}


							}	
						?>
						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>First Name</label>
										<input type="text" class="form-control" name="firstname" pattern="[a-zA-Z]*" title="Letters Only" placeholder="Letters Only"  required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Last Name</label>
										<input type="text" class="form-control" name="lastname" pattern="[a-zA-Z]*" title="Letters Only" placeholder="Letters Only" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Job Title</label>
										<input type="text" class="form-control" name="job_title"  title="Letters Only" placeholder="Letters Only" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Employee Number</label>
										<input type="text" class="form-control" name="emp_number" pattern="[0-9]{3,15}" title="enter 3-15 digits Only" placeholder="enter 3-15 digits Only" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Password</label>
										<input type="password" class="form-control" name="password" pattern="[0-9]{3,15}" title="enter 3-15 digits Only" placeholder="enter 3-15 digits Only" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input type="submit" class="btn btn-primary" value="Sign Up" name="Sign-up">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
                            <footer style="background-color: #549AD3; height:1cm">
	<p style="font-weight: bold; text-align: center; color: white;">© 2022 All Rights Reserved, EMH®</p>
	</footer>
			</div>	
		</div>
		<div class="col-md-2"></div>
		</div>  
	</div>
	  

  </body>
</html>