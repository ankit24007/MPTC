<?php
session_start();

include 'db.php';
require 'header.php';
function loginchecker(){
    if(empty($_SESSION['usname'])){
        header('Location: login.php');
    }
}
loginchecker();
require 'navbar.php';
// require 'stockfun.php';
?>
<body>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-2">
                <div class="list-group">
                    <a href="adpay.php" class="list-group-item">Add Payment</a>
                    <a href="payments.php" class="list-group-item">Manage Payments</a>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-8 col-md-10">
                <?php  
                // ***********************  pagination ***************************                
                $page = 0;
                if (isset($_GET["page"])) { 
                    $page  = $_GET["page"];
                        if($page==0){
                            $page = 1;
                        }

                    } else { $page=1; }; 
    
                    $start_from = ($page-1) * 10;
                
                $sql = "SELECT pyid, date, cuid, billno, pytype, amt FROM payment order by pyid desc LIMIT $start_from, 10";
                 $result = $conn->query($sql);
                        if ($result -> num_rows > 0) {
                            
                             
                        $sqlb = "SELECT COUNT(pyid) FROM payment"; 
                        $resultb = $conn->query($sqlb);
                        $rowb = mysqli_fetch_row($resultb); 
                        $total_records = $rowb[0]; 
                        $total_pages = ceil($total_records / 10);  
                        $pagem = $page - 1;
                        $pagea = $page +1;
                          
                            
                            
                            ?>
                <div class="panel panel-default">
            <!-- Default panel contents -->
                    <div class="panel-heading"><h4>Payments <span class="badge"><?php echo $total_records; ?></span></h4></div>
                    
  
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                
                                <th class="text-center">Date</th>
                                <th>Customer</th>
                                
                                <th>Type</th>
                                <th>Reference No.</th>
                                <th>Amount</th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                
                        <?php
                            
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                            
                            // get name of category name by category ID
                            $sqlcat = "SELECT cuname FROM customer WHERE cuid=".$row['cuid'];
                            $resultcat = $conn->query($sqlcat);
                            if($resultcat -> num_rows > 0){
                                while($rowcat = $resultcat -> fetch_assoc()){
                                    $catn = $rowcat['cuname']; 
                                }
                            }
                            
                            // get payment type by  pytype
                            $sqlpty = "SELECT type, refnum FROM paytype WHERE id=".$row['pytype'];
                            $resultpty = $conn->query($sqlpty);
                            if($resultpty -> num_rows > 0){
                                while($rowpty = $resultpty -> fetch_assoc()){
                                    $pty = $rowpty['type'];
                                    $ref = $rowpty['refnum'];
                                }
                            }
                            
                           
                            echo "<tr>"
                                    . "<td class='text-center'>".$row['date']. "</td><td> " 
                                    . $catn. "</td><td>".$pty. "</td><td>". $ref."</td><td>Rs.". $row['amt']."</td></tr>";

                        }
                    }else {
                        echo "0 results";
                    }
                    ?>
                
                    </table>
                </div>
               
                        <nav aria-label="">
                            <ul class="pager">
                                <?php
                                
                                    if($page <= 1){
                                        echo "<li class='disabled'><a>Previous</a></li>";
                                    }else {
                                        echo "<li><a href='bills.php?page=$pagem'>Previous</a></li>";
                                    }
                                if($page >= $total_pages){
                                    echo "<li class='disabled'><a>Next</a></li>";
                                }else{
                                    echo "<li><a href='payments.php?page=$pagea'>Next</a></li>";
                                }
                                
                                        
                                ?>
                            </ul>
                        </nav>
            </div>
        </div>
    </div>
</body>
<script>
$(document).ready(function(){
  
    $('.badge').tooltip({title: "Total Records", placement: "right"}); 
});
</script>
    <?php
        require 'footer.php';