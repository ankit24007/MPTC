

<?php
// This file sends Bill id to adpay.php file

include 'db.php';
$q = $_GET['q'];
$cui=0;
$sqlcu = "SELECT cuid FROM customer WHERE cuname= '".$q."'";
        $resultcu = $conn->query($sqlcu);
        if($resultcu -> num_rows > 0){
            while($rowcu = $resultcu -> fetch_assoc()){
                $cui = $rowcu['cuid'];
            }
        }

// get name of category name by category ID
        $sql = "SELECT bdate, billno, bamt, dueamt FROM bill WHERE cuid= '".$cui."' AND bstatus = 0";
        $result = $conn->query($sql);
        if($result -> num_rows > 0){
                                
            $tdamt=0;
            $id=1;
        while($row = $result -> fetch_assoc()){
            echo "<tr><td>".$row['bdate']."</td><td>".$row['billno']."</td><td>".$row['bamt']."</td><td>".$row['dueamt']."</td><td><input type='text' id='gp".$id."'name='getpay[]' ></td></tr>";
             echo"<input type='hidden' value=".$row['billno']." name='bnid[]'>";
            $tdamt += $row['dueamt'];
            $id++;
        }
        
        echo "<tr><td></td><td></td><td>Total Due Amount</td><td>".$tdamt."</td><td></td></tr>";
    }else {
            echo "No Bills Pending.";
        }
                    
                    
  