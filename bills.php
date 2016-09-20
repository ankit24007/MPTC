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
                    
                    <a href="adbill.php" class="list-group-item">Add Invoice</a>
                    <a href="bills.php" class="list-group-item">Invoice Stats</a>
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
                   
                    
                    // select data for show in tables
                $sql = "SELECT bdate, billno, total_items, cuid, dueamt, bamt, bstatus FROM bill order by billno desc LIMIT $start_from, 10";
                 $result = $conn->query($sql);
                        if ($result -> num_rows > 0) {
                        
                        // count bills for pagination    
                        $sqlb = "SELECT COUNT(billno) FROM bill"; 
                        $resultb = $conn->query($sqlb);
                        $rowb = mysqli_fetch_row($resultb); 
                        $total_records = $rowb[0]; 
                        $total_pages = ceil($total_records / 10);  
                        $pagem = $page - 1;
                        $pagea = $page +1;
                        
                            
                            ?>
                <div class="panel panel-default">
            <!-- Default panel contents -->
                    <div class="panel-heading"><h4>Invoice <span class="badge"><?php echo $total_records; ?></span></h4></div>
                    
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">Date</th>
                                <th>Bill No.</th>
                                <th>Customer</th>
                                <th>Status</th>
                                <th>Due Amount</th>
                                <th>Total Amount</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                <?php    
                 // output data of each row
                    while($row = $result->fetch_assoc()) {
                            
                        // change date format
                        $dt = $row['bdate'];
                            $ndt = date("d-m-Y", strtotime($dt));
                            
                            // get name of customer by customer ID
                            $sqlcus = "SELECT cuname FROM customer WHERE cuid=".$row['cuid'];
                            $resultcus = $conn->query($sqlcus);
                            if($resultcus -> num_rows > 0){
                                while($rowcus = $resultcus -> fetch_assoc()){
                                    $cusn = $rowcus['cuname']; 
                                }
                            }
                            
                            // bill status cheque
                            if($row['bstatus']== 0){
                                echo "<tr'>"
                                    . "<td class='text-center'>".$ndt. "</td><td>".$row['billno']. 
                                    "</td><td>" . $cusn."</td><td>Pending</td><td>Rs." . $row['dueamt']."</td><td>Rs." . 
                                    $row['bamt']."</td></tr>";
                            }else if($row['bstatus']== 2){
                                echo "<tr style='color:orange;'>"
                                    . "<td class='text-center'>".$ndt. "</td><td>".$row['billno']. 
                                    "</td><td>" . $cusn."</td><td>Partially paid</td><td>Rs." . $row['dueamt']."</td><td>Rs." . 
                                    $row['bamt']."</td></tr>";
                            } else{
                                echo "<tr style='color:greenyellow;'>"
                                    . "<td class='text-center'><strong>".$ndt. "</strong></td><td><strong>".$row['billno']. 
                                    "</strong></td><td><strong>" . $cusn."</strong></td><td><strong>Paid</strong></td><td><strong>Rs." . $row['dueamt']."</strong></td><td><strong>Rs." . 
                                    $row['bamt']."</strong></td></tr>";
                            }
                            //rgb(140, 220, 60)
                            

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
                                    echo "<li><a href='bills.php?page=$pagea'>Next</a></li>";
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
  
    $('.badge').tooltip({title: "Total Invoice", placement: "right"}); 
});
</script>

    <?php
        require 'footer.php';
        