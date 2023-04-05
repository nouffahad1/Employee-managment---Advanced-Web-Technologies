<?php session_start(); ?>
<?php include("mgrCheck.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Add New Request</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styling.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
		<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="well text-center">
				<div class="header">
					<a href="#">
						<img src="images/new request.png" style="height: 100px; width: 100px;">
						
					</a>
					<h1>Add New Request</h1>
					<hr>
					<p>
					<?php 
						include("connect.php");
						if(isset($_POST['addRequest'])) {
                                                    
							$uploadOk1 = 0;
							$uploadOk2 = 0;
							
							$service_id = $_POST['service_id'];
							$emp_id = $_POST['emp_id'];
							$request_description = $_POST['request_description'];
							
							
							$target_dir = "Attachments/";
							
							if ($_FILES['Attachment1']['size'] == 0) {
								$uploadOk1 = NULL;
							} else {
							  $file_name1 = $_FILES['Attachment1']['name'];
							  $file_type1 = $_FILES['Attachment1']['type'];
							  $target1 = $target_dir . "-" .  $file_name1;
							  echo $uploadOk1 = move_uploaded_file($_FILES["Attachment1"]["tmp_name"], $target1);
						   }
						
						   if ($_FILES['Attachment2']['size'] == 0) {
								$uploadOk2 = NULL;
							} else {
							  $file_name2 = $_FILES['Attachment2']['name'];
							  $file_type2 = $_FILES['Attachment2']['type'];
							  $target2 = $target_dir . "-" .  $file_name2;
							  $uploadOk2 =move_uploaded_file($_FILES["Attachment2"]["tmp_name"], $target2);
						   }
							
							
							if($uploadOk1 And $uploadOk2) {
								//echo "both<br>";
								$sql = "INSERT INTO request VALUES(NULL, '$emp_id', $service_id, '$request_description', '$target1', '$file_type1', '$target2', '$file_type2', 1)";
							} else if($uploadOk1 and !$uploadOk2) {
								//echo "upload 1";
								$sql = "INSERT INTO request VALUES(NULL, '$emp_id', $service_id,  '$request_description', '$target1', '$file_type1', NULL, NULL, 1)";
							} else if(!$uploadOk1 and $uploadOk2) {
								//echo "upload 2";
								$sql = "INSERT INTO request VALUES(NULL,'$emp_id',  $service_id, '$request_description', NULL, NULL,'$target2', '$file_type2', 1)";
							} else if(!$uploadOk1 and !$uploadOk2) {
								//echo "None";
								$sql = "INSERT INTO request VALUES(NULL, '$emp_id', $service_id, '$request_description', NULL, NULL,NULL, NULL, 1)";
							}
							
							$result = mysqli_query($connection, $sql);
							if($result) {
								
                                                                 $q = "select max(id) as new_id from request";
                                                                 $r = mysqli_query($connection, $q);
                                                                 $row = mysqli_fetch_array($r);
                                                                 $new_id = $row['new_id'];
                                                            
								echo '<div class="alert alert-success" role="alert">Your Request Sent Successfully</div>';
								echo '<META HTTP-EQUIV="Refresh" Content="1; URL=Request Information.php?request_id=' . $new_id . '">'; 
							}
						}	
					?>
					<form method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Employee Name</label>
									<input type="text" name="emp_name" value="<?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?>" readonly class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Service Type</label>
									<select class="form-control" name="service_id">
									<?php
										$sql = "SELECT * FROM service";
										$result = mysqli_query($connection, $sql);
										while($row = mysqli_fetch_array($result)) {
									?>
										<option value="<?php echo $row['id'] ?>">
											<?php echo $row['name'] ?>
										</option>
									<?php
										}
									?>
									</select>
								</div>
							</div>
							<input type="hidden" name="emp_id" value="<?php echo $_SESSION['employee_ID']; ?>">
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Request Description</label>
									<textarea class="form-control" name="request_description" rows="5" required></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Attachment One</label>
									<input type="file" class="form-control" name="Attachment1" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Attachment Two</label>
									<input type="file" class="form-control" name="Attachment2" >
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="submit" class="btn btn-primary" value="Send Request" name="addRequest">
								</div>
							</div>
						</div>
					</form>
					
				</div>
			</div>	
		</div>
		<div class="col-md-3"></div>
		</div>  
	</div>
	  

  </body>
</html>