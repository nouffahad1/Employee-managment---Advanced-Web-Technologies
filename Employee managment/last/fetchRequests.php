
<?php
include("connect.php");
    $query0 = "SELECT * FROM service";
    $result0 = mysqli_query($connection, $query0);
    while($row0 = mysqli_fetch_array($result0)) {
?>
    <table class="table table-bordered">
        <tr>
            <th colspan="3" bgcolor="#0510C2"><span style="color:white"><?php echo $row0['name'] ?></span></th>
        </tr>
        <?php
        $service_id = $row0['id'];
         $query = "SELECT * FROM request where service_id=$service_id ORDER BY status ASC";
        $result = mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);
        if($count<>0) {
        ?>
        <tr bgcolor="#4657F5">
            <th width="50%"><span style="color:white">Request</span></th>
            <th><span style="color:white">Status</span></th>
            <th><span style="color:white">Options</span></th>
        </tr>
        <?php
            $i = 0;
            while($row = mysqli_fetch_array($result)) {
                ++$i;
        ?>
            <tr 
                <?php if( $row['status'] == 1) { 
                    echo " style='background-color:#aeecb0' ";
                }?>
            >
                <td>
<script>
function getDescription(id) {
  var id = id;
  $.ajax({
    url:"new.php",
 method:"POST",
   data:{id:id},
    success:function(data)
    {
    var newData = data;
        alert(newData);
   }
  });
  //alert("ID : " + id);
}  
function ApproveRequest(id) {
    var id = id;
    ///alert("ID : " + id);
    $.ajax({
        url:"ApproveRequest.php",
        method:"POST",
        data:{id:id},
        success:function(data)
        {
            var newData = data;
            //alert(newData);
        }
    });
}
function DeclineRequest(id) {
    var id = id;
    ///alert("ID : " + id);
    $.ajax({
        url:"DeclineRequest.php",
        method:"POST",
        data:{id:id},
        success:function(data)
        {
            var newData = data;
            //alert(newData);
        }
    });
}
</script>
                <a href="Request Information.php?request_id=<?php echo $row['id'] ?>"  onmouseover="" title="<?php echo $row['request_description'] ?>">
                    <strong><?php 
                        echo $row['id'] . " - ";
                         $emp_id = $row['emp_id'];

                         $query10 = "SELECT * FROM employee where emp_number=$emp_id";
                        $result10 = mysqli_query($connection, $query10);
                        $row10 = @mysqli_fetch_array($result10);
                        echo $row10['first_name'] . " " . $row10['last_name'];

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
                <td>
                    <?php
                    if( $row['status'] == 1) {
                    ?>
                        <button id="approveBtn" value="<?php echo $row['id'] ?>" onclick="ApproveRequest(<?php echo $row['id'] ?>)">Approve</button>
                         | 
                        <button id="declineBtn" value="<?php echo $row['id'] ?>" onclick="DeclineRequest(<?php echo $row['id'] ?>)"s>Decline</button>
                    
                    <?php
                    } else if( $row['status'] == 2) {
                    ?>
                         <button id="declineBtn" value="<?php echo $row['id'] ?>" onclick="DeclineRequest(<?php echo $row['id'] ?>)">Decline</button>
                    <?php
                    } elseif( $row['status'] == 3) {
                    ?>
                       <button id="approveBtn" value="<?php echo $row['id'] ?>" onclick="ApproveRequest(<?php echo $row['id'] ?>)">Approve</button>
                    <?php
                    }
                    ?>
                </td>
            </tr>

        <?php
            }
        }
        ?>
    </table><br>
<?php
    }
?>