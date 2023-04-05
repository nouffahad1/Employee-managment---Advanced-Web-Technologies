<?php session_start(); ?>
<?php include("mgrCheck.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Edit Request</title>
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
						<img src="images/new request.png" style="height: 100px; width: 100px;">
						
					<h1>Edit Request</h1>
					<hr>
					<p>
					<?php 
						$request_id = $_GET['request_id'];
						include("connect.php");
						if(isset($_POST['editRequest'])) {
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
							  $uploadOk1 = move_uploaded_file($_FILES["Attachment1"]["tmp_name"], $target1);
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
								//echo "both";
								
								$sql = "UPDATE request SET  service_id=$service_id, emp_id='$emp_id', request_description='$request_description', attachment1='$target1', file_type1='$file_type1', attachment2='$target2', file_type2='$file_type2' WHERE id = $request_id";
							} else if($uploadOk1 and !$uploadOk2) {
								//echo "upload 1";
								
								$sql = "UPDATE request SET  service_id=$service_id, emp_id='$emp_id', request_description='$request_description', attachment1='$target1', file_type1='$file_type1', attachment2=NULL, file_type2=NULL WHERE id = $request_id";
								
							} else if(!$uploadOk1 and $uploadOk2) {
								//echo "upload 2";
								
								$sql = "UPDATE request SET  service_id=$service_id, emp_id='$emp_id', request_description='$request_description', attachment1=NULL, file_type1=NULL, attachment2='$target2', file_type2='$file_type2' WHERE id = $request_id";
								
							} else if(!$uploadOk1 and !$uploadOk2) {
								//echo "None";
								$sql = "UPDATE request SET  service_id=$service_id, emp_id='$emp_id', request_description='$request_description', attachment1=NULL, file_type1=NULL, attachment2=NULL, file_type2=NULL WHERE id = $request_id";
								
							}
							
							$result = mysqli_query($connection, $sql);
							if($result) {
								
								echo '<div class="alert alert-success" role="alert">Your Request Updated Successfully</div>';
								echo '<META HTTP-EQUIV="Refresh" Content="1; URL=Request Information.php?request_id=' . $request_id . '">'; 
							}
						}	
					?>
						
					<?php
						
						$query0 = "SELECT * FROM request where id=$request_id";
						$result0 = mysqli_query($connection, $query0);
						$row0 = mysqli_fetch_array($result0);
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
											if($row['id'] == $row0['service_id']) {
									?>
										<option value="<?php echo $row['id'] ?>"  selected>
											<?php echo $row['name'] ?>
										</option>
									<?php			
											} else {
									?>
										<option value="<?php echo $row['id'] ?>" >
											<?php echo $row['name'] ?>
										</option>
									<?php
											}
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
									<textarea class="form-control" name="request_description" rows="5" required><?php echo $row0['request_description'] ?></textarea>
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
                                              <h4>Request Attachments</h4>
					<strong>Attachment 1</strong><br>
					<?php 
					if((substr_count($row0['file_type1'], 'image') > 0) and !is_null($row0['file_type1'])) {
						
						?>
						<img src="<?php echo $row0['attachment1'] ?>" style="width: 45%; height: 300px;">
						<?php
					} else if( !is_null($row0['file_type1'])) {
						?>
						<a href="<?php echo $row0['attachment1'] ?>" class="btn btn-default"
						 >Download</a>
						<?php
					}
					?>
					<hr>
					<strong>Attachment 2</strong><br>
					<?php 
					if((substr_count($row0['file_type2'], 'image') > 0) and !is_null($row0['file_type2'])) {
						
						?>
						<img src="<?php echo $row0['attachment2'] ?>" style="width: 45%; height: 300px;">
						<?php
					} else if( !is_null($row0['file_type2'])) {
						?>
						<a href="<?php echo $row0['attachment2'] ?>" class="btn btn-default"
						   >Download</a>
						<?php
					}
					?>
					
					
                                            </div>
                                                     <div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="submit" class="btn btn-primary" value="Update Request" name="editRequest">
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