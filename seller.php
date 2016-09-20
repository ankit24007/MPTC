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
                    
                    <a href="adseller.php" class="list-group-item">Add Seller</a>
                    <a href="seller.php" class="list-group-item">Manage Seller</a>
                </div>
                
            </div>
            
            <div class="col-xs-12 col-sm-4 col-md-10">
                <?php
                if(isset($_POST['upsel'])){
                    
                    if (isset($_GET['slid']) && is_numeric($_GET['slid'])){
                    // get id value
                        $slid = $_GET['slid'];
                    }
                    
                    $sname = filter_input(INPUT_POST, 'sname');
                    $scontact = filter_input(INPUT_POST, 'scontact');
                    $sdetails = filter_input(INPUT_POST, 'sdetails');
                   
                    $uname= $_SESSION['usname'];
                    date_default_timezone_set('Asia/Kolkata');
                    $timestamp = date('Y-m-d h:i:s');
                    if(empty($sname)){
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
            $sql = "UPDATE seller SET sname='$sname', scontact='$scontact', sdetails='$sdetails', "
                    . "uby='$uname', udate='$timestamp' WHERE sid='$slid'";
            
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
                    $sql = 'DELETE FROM seller WHERE sid='.$id;

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
             
                $sql = "SELECT sid, sname, scontact, sdetails FROM seller ORDER BY sid asc LIMIT $start_from, 10";
                 $result = $conn->query($sql);
                        if ($result -> num_rows > 0) {
                            
                            
                            // count seller rows for pagination    
                        $sqlb = "SELECT COUNT(sid) FROM seller"; 
                        $resultb = $conn->query($sqlb);
                        $rowb = mysqli_fetch_row($resultb); 
                        $total_records = $rowb[0]; 
                        $total_pages = ceil($total_records / 10);  
                        $pagem = $page - 1;
                        $pagea = $page +1;
                        
                        
                            ?>
                <div class="panel panel-default">
            <!-- Default panel contents -->
                    <div class="panel-heading"><h4>Seller <span class="badge"><?php echo $total_records; ?></span></h4></div>
                    
  
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Description</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                <?php    
                
                        
                            
                            // output data of each row
                    
                        while($row = $result->fetch_assoc()) {
                            
                            
                            echo "<tr>"
                                    . "<td class='text-center'>".$row['sid']. "</td><td>".$row['sname']. "</td><td>" . $row['scontact']."</td><td>".$row['sdetails']. "</td>".
                                    "<td><a href='upseller.php?slid=" . $row['sid'] . "'><i class='material-icons'>mode_edit</i></a></td>".
                                    "<td><a href='seller.php?id=" . $row['sid'] . "'><i class='material-icons'>clear</i></a></td></tr>";

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
    </div>

    
        </body>
<script>
$(document).ready(function(){
  
    $('.badge').tooltip({title: "Total Seller", placement: "right"}); 
});
</script>
    <?php
        require 'footer.php';
        