<?php
// This file sends customer address  to adbill.php file

include 'db.php';
$q = $_GET['q'];

  $address="";
// get name of category name by category ID
        $sql = "SELECT cuaddress FROM customer WHERE cuname= '".$q."'";
        $result = $conn->query($sql);
        if($result -> num_rows > 0){
                              
        while($row = $result -> fetch_assoc()){
             $address = $row['cuaddress'];
        }
    }
?>
<div class="well well-lg"><h4>Address: <small> <?php echo $address; ?></small> </h4></div> 