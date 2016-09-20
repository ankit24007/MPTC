<?php
// This file sends Bill id to adpay.php file

include 'db.php';
$q = $_GET['q'];

 $price=0; 
// get name of category name by category ID
        $sql = "SELECT price FROM product WHERE pname= '".$q."'";
        $result = $conn->query($sql);
        if($result -> num_rows > 0){
                              
        while($row = $result -> fetch_assoc()){
             $price = $row['price'];
        }
    }
    ?>

    <input type='text' value='<?php echo $price; ?>' id='pri' name='rate[]' onkeyup='pamt(this.value)' />
                    
                    
    
  