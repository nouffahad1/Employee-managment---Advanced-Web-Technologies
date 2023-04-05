
<?php
    $request_id = $_GET['id'];

    include("connect.php");
    $query = "update request set status=2 where id=$request_id";
    $result = mysqli_query($connection, $query);

    if($result) {
        
        $msg = "This request is approved";
        echo ($msg);
    }
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=manager home page.php">'; 
?>
