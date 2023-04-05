<?php session_start(); 
$userType = "emp";
if(isset($_SESSION['employee_ID'])) {
	$employee_ID = $_SESSION['employee_ID'];
	$userType = "emp";
} else {
	$manager_ID = $_SESSION['manager_id'];
	$userType = "manager";
}
?>
<?php include("mgrCheck.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Request Details</title>
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

					<?php
					$request_id = $_GET['request_id'];
					$req_status = 1;
					/*
						request status values
						1. under proccessing
						2. approved
						3. declined
					*/
					include("connect.php");
					$query = "";
					if($userType == "emp") {
						$query = "SELECT * FROM request where emp_id='$employee_ID' and id=$request_id";
					} else {
						$query = "SELECT * FROM request where id=$request_id";
					}
						 
						$result = mysqli_query($connection, $query);
						$count = mysqli_num_rows($result);
						if($count==0) {
							echo "No Found Request";
						} else {
							$i = 1;
							$row = mysqli_fetch_array($result);
							$req_status = $row['status'];
							$employee_ID = $row['emp_id'];
						?>
					
						<h1><?php 
							$service_id = $row['service_id'];
							$query1 = "SELECT * FROM service where id=$service_id";
							$result1 = mysqli_query($connection, $query1);
							$row1 = mysqli_fetch_array($result1);
							echo $row1['name'];
						?>
						<?php
						if( $row['status'] == 1) {
							echo '<span class="label label-info">In progress</span>';
						} else if( $row['status'] == 2) {
							echo '<span class="label label-success">Approved</span>';
						} elseif( $row['status'] == 3) {
							echo '<span class="label label-danger">Declined</span>';
						}
						?>
                                                    
                                   
					<?php if (isset($_SESSION['manager_id'])){
						
                                                        echo"<a style='text-decoration: none;'href='manager home page.php'>";
                                                                    echo"<input type='submit'value='BACK' class='pull-right'>
                                                                           </a>";
						}
                                                if(isset($_SESSION['employee_ID'])) {
                                                     echo"<a style='text-decoration: none;'href='employee home page.php'>";
                                                                    echo"<input type='submit'value='BACK' class='pull-right'>
                                                                           </a>";
                                                    
                                                }
                                                ?>
                                                    
						</h1>
                                   
						<b><?php 
							 $query2 = "SELECT * FROM employee where emp_number=$employee_ID";
							$result2 = mysqli_query($connection, $query2);
							@$row2 = mysqli_fetch_array($result2);
                                                        
                                                        if(isset($_SESSION['manager_id'])){
                                                            echo@$row2['first_name']." ".@$row2['last_name'];
                                                        echo"<br/><br/>";
                                                        
                                                        }
						?></b>
                                    
						<?php
							if(isset($_SESSION['employee_ID'])) {
                                                            echo $_SESSION['firstname'] . " " . $_SESSION['lastname'];
						?>
						<a href="editRequest.php?request_id=<?php echo $row['id'] ?>">Edit</a> 
						<?php
							} else {
                                                            
								if($req_status == 1) {
						?>
							<a style='text-decoration: none;' href="Approve.php?id=<?php echo $row['id'] ?>">
                                                            <input type='submit'value='Approve'>
                                                            </a> 
							<a style='text-decoration: none;' href="Decline.php?id=<?php echo $row['id'] ?>">
                                                          <input type='submit'value='Decline'></a>
							<?php
								} elseif($req_status == 2){
							?>
							<a style='text-decoration: none;' href="Decline.php?id=<?php echo $row['id'] ?>">
                                                          <input type='submit'value='Decline'></a>
							<?php
								} elseif($req_status == 3){
							?>
							<a style='text-decoration: none;' href="Approve.php?id=<?php echo $row['id'] ?>">
                                                            <input type='submit'value='Approve'>
                                                            </a> 
						<?php
								}
							} 
						?>
						<hr>
					
					<h4>Request Description</h4>
					<?php echo $row['request_description'] ?>
					<h4>Request Attachments</h4>
					<strong>Attachment 1</strong><br>
					<?php 
					if((substr_count($row['file_type1'], 'image') > 0) and !is_null($row['file_type1'])) {
						
						?>
						<img src="<?php echo $row['attachment1'] ?>" style="width: 45%; height: 300px;">
						<?php
					} else if( !is_null($row['file_type1'])) {
						?>
						<a href="<?php echo $row['attachment1'] ?>" class="btn btn-default"
						 >Download</a>
						<?php
					}
					?>
					<hr>
					<strong>Attachment 2</strong><br>
					<?php 
					if((substr_count($row['file_type2'], 'image') > 0) and !is_null($row['file_type2'])) {
						
						?>
						<img src="<?php echo $row['attachment2'] ?>" style="width: 45%; height: 300px;">
						<?php
					} else if( !is_null($row['file_type2'])) {
						?>
						<a href="<?php echo $row['attachment2'] ?>" class="btn btn-default"
						   >Download</a>
						<?php
					}
					?>
					
					
							
							<?php
								
							}
						?>
					
				</div>
			</div>	
		</div>
		<div class="col-md-2"></div>
		</div>  
	</div>
	  

  </body>
</html>