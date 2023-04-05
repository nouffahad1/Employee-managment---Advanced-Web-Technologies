<?php session_start(); include("connect.php");?>
<?php include("mgrCheck.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Welcome Employee</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styling.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
		<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="well">
				<div class="header">
					
					<h1>Welcome <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname'] ?>!
					<a style='text-decoration: none;' href="employee_signout.php" class="pull-right"> <input type='submit'value='Sign Out'>
                                                                           </a></h1>
					<p><b>Employee’s ID:</b> <?php echo $employee_ID = $_SESSION['emp_number']; ?></p>
					<p><b>Job Title:</b> <?php echo $_SESSION['job_title']; ?>
					<a style='text-decoration: none;' href="add new request.php" class="pull-right"> <input type='submit'value='+ Add Request'>
                                                                           </a></p>
					
					<hr>
					<h4>Requests</h4>
					<table class="table table-bordered">
						<tr>
							<th colspan="3" bgcolor="#4657F5"><span style="color:white">In progress</span></th>
						</tr>
						<?php
							 $query = "SELECT * FROM request where emp_id='$employee_ID' and status=1";
							$result = mysqli_query($connection, $query);
							$count = mysqli_num_rows($result);
							if($count==0) {
								echo "No Requests";
							} else {
								$i = 1;
								while($row = mysqli_fetch_array($result)) {
							?>
								<tr>
									<td>
									
									<a href="Request Information.php?request_id=<?php echo $row['id'] ?>">
										<strong><?php 
                                                                                
											echo $row['id'] . " - ";
											$service_id = $row['service_id'];
											$query1 = "SELECT * FROM service where id=$service_id";
											$result1 = mysqli_query($connection, $query1);
											$row1 = mysqli_fetch_array($result1);
											echo $row1['name'];
										?></strong>
									</a>
									</td>
									<td>
										<?php
										if( $row['status'] == 1) {
											echo 'In progress';
										} else if( $row['status'] == 2) {
											echo 'Approved';
										} elseif( $row['status'] == 3) {
											echo 'Declined';
										}
										?>
									</td>
									<td><a href="editRequest.php?request_id=<?php echo $row['id'] ?>">Edit</a></td>
								</tr>
							<?php
								}
							}
						?>
					</table>
					<hr>
					<table class="table table-bordered">
						<tr>
							<th colspan="3" bgcolor="#0510C2"><span style="color:white">Previous Requests</span></th>
						</tr>
						
						<tr bgcolor="#4657F5">
							<th><span style="color:white">Request</span></th>
							<th><span style="color:white">Status</span></th>
							<th><span style="color:white">Edit</span></th>
						</tr>
						<?php
							$query = "SELECT * FROM request where emp_id='$employee_ID' and status<>1";
							$result = mysqli_query($connection, $query);
							$count = mysqli_num_rows($result);
							if($count==0) {
								echo "No Requests";
							} else {
								$i = 1;
								while($row = mysqli_fetch_array($result)) {
							?>
								<tr>
									<td>
									
									<a href="Request Information.php?request_id=<?php echo $row['id'] ?>">
										<strong><?php 
											echo $row['id'] . " - ";
											$service_id = $row['service_id'];
											$query1 = "SELECT * FROM service where id=$service_id";
											$result1 = mysqli_query($connection, $query1);
											$row1 = mysqli_fetch_array($result1);
											echo $row1['name'];
										?></strong>
									</a>
									</td>
									<td>
										<?php
										if( $row['status'] == 1) {
											echo 'In progress';
										} else if( $row['status'] == 2) {
											echo 'Approved';
										} elseif( $row['status'] == 3) {
											echo 'Declined';
										}
										?>
									</td>
									<td><a href="editRequest.php?request_id=<?php echo $row['id'] ?>">Edit</a></td>
								</tr>
							<?php
								}
							}
						?>
					</table>
					</p>
				</div>
			</div>	
		</div>
		<div class="col-md-2"></div>
		</div>  
	</div>
	  

  </body>
</html>