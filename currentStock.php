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
?>
<body>

    
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-2">
                <div class="list-group">
                    
                    <a href="adstock.php" class="list-group-item">Add Stock</a>
                    <a href="stockIssue.php" class="list-group-item">Issue Stock</a>
                    <a href="return-form.php" class="list-group-item">Return</a>
                    <a href="return-form.php" class="list-group-item">Replace</a>
                    <a href="return-form.php" class="list-group-item">Damages</a>
                    <a href="currentStock.php" class="list-group-item">Current Stock</a>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-4 col-md-10">
                
                <?php
                $sql = "SELECT product.pid, product.pname, product.price, current_stock.qty FROM current_stock INNER JOIN product ON current_stock.pid = product.pid";
                                $result = $conn->query($sql);
                            
                                if ($result->num_rows > 0) {
                ?>
                <div class="panel panel-default">
            <!-- Default panel contents -->
                    <div class="panel-heading"><h4>Current Stock</h4><h6><?php  
                        date_default_timezone_set('Asia/Calcutta'); 
                        echo date('d M Y ( h:i A )'); 
                        ?></h6>
                    </div>
  
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                
                                    while($row = $result->fetch_assoc()) {
                                        if($row['qty']< 21){
                                            echo "<tr><td class='text-center'>". $row['pid']. "</td><td> " . $row['pname']. "</td><td style='color:red'>" . $row['qty']."</td></tr>";
                                        } else {
                                            echo "<tr><td class='text-center'>". $row['pid']. "</td><td> " . $row['pname']. "</td><td>" . $row['qty']."</td></tr>";
                                        }
                                        
                                    }
                                } else {
                                    echo "0 results";
                                }

                            ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
            
        </div>
        
        
    </div>
    
<?php

require 'footer.php';
