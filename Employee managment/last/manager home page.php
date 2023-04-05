<?php session_start();  include("connect.php");?>
<?php include("mgrCheck.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Welcome Manager</title>
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
                                    $query47 = "SELECT * FROM manager";
						$result47 = mysqli_query($connection, $query47);
						while($row47 = mysqli_fetch_array($result47)){
                                                        $nn=$row47['first_name'];
                                                        $ll=$row47['last_name'];
                                                }
                                    ?>
                                    
                                
					
					<h1>Welcome <?php echo $_SESSION['username'].": ".$nn." ".$ll;
                                        
                                        ?>!
					<a style='text-decoration: none;' href="employee_signout.php" class="pull-right"> <input type='submit'value='Sign Out'>
                                                                           </a></h1>
					
					<hr>
					<h4>Requests</h4>
                    <div id="load_request"></div>
					<script src="js/jquery.min.js"></script>
					<script>
                    $(document).ready(function(){
                         setInterval(function(){
                          $('#load_request').load("fetchRequests.php").fadeIn("slow");
                         }, 500);

                    });
                    </script>
				</div>
			</div>	
		</div>
		<div class="col-md-2"></div>
		</div>  
	</div>
	  

  </body>
</html>