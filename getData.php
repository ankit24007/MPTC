<?php
// This file sends customer bills data   to customer.php file

include 'db.php';
$q = $_GET['q'];

  $cuid="";
// get customer ID by customer name
        $sql = "SELECT cuid, cutin, cucontact, cuaddress FROM customer WHERE cuname= '".$q."'";
        $result = $conn->query($sql);
        if($result -> num_rows > 0){
                              
        while($row = $result -> fetch_assoc()){
             $cuid = $row['cuid'];
              $cutin = $row['cutin'];
               $cucontact = $row['cucontact'];
             $cuadd = $row['cuaddress'];
        }
    }
    
    // customer address
    echo "<div class='well well-sm'>";
    echo "<h4>Address: <small>".$cuadd. "</small></h4>";
    if($cucontact != 0){
        echo "<h4>Contact: <small>".$cucontact. "</small></h4>";
    }
    if($cutin != 0){
        echo "<h4>Tin No.: <small>".$cutin. "</small></h4>";
    }
    echo "</div>";
    // get customer's all bills by customer ID
        $sqla = "SELECT bdate, billno, bamt, bstatus, dueamt FROM bill WHERE cuid='".$cuid."' AND bstatus != '1' ORDER BY billno DESC";
        $resulta = $conn->query($sqla);
        $totala = 0;
        if($resulta -> num_rows > 0){
                              
        ?>
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Invoice No.</th>
                        <th>Amount</th>

                    </tr>
                </thead>
                    
                <tbody>
                    <tr>
                        <?php
                       
                        while($rowa = $resulta->fetch_assoc()) {
                            if($rowa['bstatus']== 2){
                                echo "<tr>"
                                    . "<td>".$rowa['bdate']."</td><td>" . $rowa['billno'].
                                    "</td><td>".$rowa['dueamt']. "</td></tr>";
                                 $totala += $rowa['dueamt'];
                            }else {
                                echo "<tr>"
                                    . "<td>".$rowa['bdate']."</td><td>" . $rowa['billno'].
                                    "</td><td>".$rowa['bamt']. "</td></tr>";
                                $totala += $rowa['bamt']; 
                            }
                            
                            
                            }
                        }   
    
?>
                    </tr>
                    <tr>
                        <td><strong>Total</strong></td>
                        <td></td>
                        <td style="color:blueviolet;"><strong><?php echo $totala; ?></strong></td>
                    </tr>
                </tbody>
                
            </table> 