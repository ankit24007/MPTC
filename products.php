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
                    <a href="adcat.php" class="list-group-item">Add Category</a>
                    <a href="adpro.php" class="list-group-item">Add Product</a>
                    <a href="category.php" class="list-group-item">Manage    Categories</a>
                    <a href="products.php" class="list-group-item">Manage Products</a>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-4 col-md-10">
                <?php
                if(isset($_POST['uppro'])){
                    
                    if (isset($_GET['prid']) && is_numeric($_GET['prid'])){
                    // get id value
                        $prid = $_GET['prid'];
                    }
                    $cid = filter_input(INPUT_POST, 'cid');
                    $pname = filter_input(INPUT_POST, 'pname');
                    $pcode = filter_input(INPUT_POST, 'pcode');
                    $colid = filter_input(INPUT_POST, 'colid');
                    $price = filter_input(INPUT_POST, 'price');
                    $ptax = filter_input(INPUT_POST, 'ptax');
                    $uname= $_SESSION['usname'];
                    date_default_timezone_set('Asia/Kolkata');
                    $timestamp = date('Y-m-d h:i:s');
                    if(empty($pname) || empty($price) || empty($ptax)){
            ?>
            
            <div class="alert alert-danger" role="alert">
                <div class='alert-icon'>
                            <i class='material-icons'>error_outline</i>
                        </div>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'><i class='material-icons'>clear</i></span>
                        </button>
                <span class="sr-only">Error:</span>
                Error! Category field are empty or wrong value. Please fill correct values.
            </div>
                  
       <?php
            // echo "<br />";     
           
            // exit();
            }else{
            $sql = "UPDATE product SET pname='$pname', cid='$cid', pcode='$pcode', "
                    . "pcolor='$colid', price='$price', ptax='$ptax', uby='$uname', "
                    . "udate='$timestamp' WHERE pid='$prid'";
            
            if ($conn->query($sql) === TRUE) {
        ?>
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <p><strong>Success!</strong> Record Updated successfully.</p> 
                </div>
                <?php
                } else{
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
                }
        
                if (isset($_GET['id']) && is_numeric($_GET['id'])){
                    // get id value
                    $id = $_GET['id'];

                    // delete the entry
                    $sql = 'DELETE FROM product WHERE pid='.$id;

                    if ($conn->query($sql) === TRUE) { 
                        ?>
                <div class="alert alert-success" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong>Success!</strong> Record Deleted successfully.
                                    </div>

                        <?php

                }   
                else {
                    echo "Error deleting record: " . $conn->error;
                    }
                }
             
// ***********************  pagination ***************************                
                $page = 0;
                if (isset($_GET["page"])) { 
                    $page  = $_GET["page"];
                        if($page==0){
                            $page = 1;
                        }

                    } else { $page=1; }; 
    
                    $start_from = ($page-1) * 10; 
                
                $sql = "SELECT pid, pname, cid, pcode, pcolor, price, ptax FROM product ORDER BY pid ASC LIMIT $start_from, 10";
                 $result = $conn->query($sql);
                        if ($result -> num_rows > 0) {
                            
                            
                            // count products for pagination    
                        $sqlb = "SELECT COUNT(pid) FROM product"; 
                        $resultb = $conn->query($sqlb);
                        $rowb = mysqli_fetch_row($resultb); 
                        $total_records = $rowb[0]; 
                        $total_pages = ceil($total_records / 10);  
                        $pagem = $page - 1;
                        $pagea = $page +1;
                            ?>
                <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h4>Products <span class="badge"><?php echo $total_records; ?></span></h4></div>
                    
  
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Model</th>
                                
                                <th>Tax</th>
                                <th>Price</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                <?php    
                
                        
                            
                            // output data of each row
                    
                        while($row = $result->fetch_assoc()) {
                            
                            // get name of category name by category ID
                            $sqlcat = "SELECT cname FROM category WHERE cid=".$row['cid'];
                            $resultcat = $conn->query($sqlcat);
                            if($resultcat -> num_rows > 0){
                                while($rowcat = $resultcat -> fetch_assoc()){
                                    $catn = $rowcat['cname']; 
                                }
                            }
                            
                            
                            echo "<tr>"
                                    . "<td class='text-center'>".$row['pid']. "</td><td>".$row['pname']. "</td><td> " 
                                    . $catn. "</td><td>" . $row['pcode']."</td><td>".
                                     $row['ptax']. "%</td><td>Rs." . $row['price']."</td>".
                                    "<td><a href='uppro.php?prid=" . $row['pid'] . "'><i class='material-icons'>mode_edit</i></a></td>".
                                    "<td>"?>
                        <form action="products.php?id=<?php echo $row['pid'] ?>" method="POST" onsubmit="return confirm('Are you sure you want to Delete it?');">
                            <button type="submit" class="btn btn-primary btn-raised btn-round btn-sm" data-toggle="tooltip" data-placement="top" title="Delete!"/><i class="material-icons">delete_forever</i></button>
                        </form>
                                    <?php   "</td></tr>";

                        }
                    }else {
                        echo "0 results";
                    }
                    ?>
                
                    </table>
                    
                    
                </div>
                
                 
                        <nav aria-label="...">
                            <ul class="pager">
                                <?php
                                
                                    if($page <= 1){
                                        echo "<li class='disabled'><a>Previous</a></li>";
                                    }else {
                                        echo "<li><a href='products.php?page=$pagem'>Previous</a></li>";
                                    }
                                if($page >= $total_pages){
                                    echo "<li class='disabled'><a>Next</a></li>";
                                }else{
                                    echo "<li><a href='products.php?page=$pagea'>Next</a></li>";
                                }
                                
                                        
                                ?>
                            </ul>
                        </nav>
                          
            </div>
        </div>
        
        <div class="row">
            
        </div>
    </div>

    
        </body>
<script>
$(document).ready(function(){
  
    $('.badge').tooltip({title: "Total Products", placement: "right"}); 
    $('.btn-tooltip').tooltip();
});
</script>
    <?php
        require 'footer.php';
        